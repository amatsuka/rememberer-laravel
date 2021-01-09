<?php
namespace App\Services;

use App\Models\Note;
use Illuminate\Encryption\Encrypter;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Exceptions\EmptyCodeException;
use App\Exceptions\NoteNotStoredException;

class NoteService {

    /**
     * @var NoteCodeService
     */
    private $noteCodeService;

    public function __construct(NoteCodeService $noteCodeService)
    {
        $this->noteCodeService = $noteCodeService;
    }

    /**
     * @return Note
     */
    public function store(array $attributes) : Note {

        if (strlen($attributes['text']) == 0) {
              throw new NoteNotStoredException(__('messages.text_is_empty'));
        }

        $attributes['text'] = json_encode(['text' => $attributes['text'], 'lang' => $attributes['lang']]);

        if (isset($attributes['parent_code']) && $attributes['parent_code'] != null) {
            $note = $this->findByCodeIgnorePassword($attributes['parent_code']);

            if ($note != null) {
                $attributes['parent_id'] = $note->id;
                $attributes['parent_code'] = $note->t_code;

                if ($note->password_hash && (md5($attributes['password']) != $note->password_hash)) {
                    throw new NoteNotStoredException(__('messages.parent_password_mismatch'));
                }

             } else {
                throw new NoteNotStoredException(__('messages.parent_note_not_found'));
            }
        }

        $note = new Note($attributes);

        if ($attributes['password']) {
            $note = $this->encryptNote($note, $attributes['password']);
        }

        do {
            try {
            $code = $this->noteCodeService->generateCode();
            } catch (EmptyCodeException $ex) {
                throw new NoteNotStoredException($ex);
            }
        } while ($this->findByCodeIgnorePassword($code) != null);


        $note->code = $code;
        $note->t_code = Str::slug($code);
        $note->save();

        return $note;
    }

    public function findByCode(string $code) : ?Note
    {
        return Note::where(function ($query) use ($code) {
            $query->where('code', $code)->orWhere('t_code', $code);
        })->wherePasswordHash(null)->first();
    }

    public function findByCodeIgnorePassword(string $code) : ?Note
    {
        return Note::where(function ($query) use ($code) {
            $query->where('code', $code)->orWhere('t_code', $code);
        })->first();
    }

    public function findByCodeAndPassword(string $code, ?string $password) : ?Note
    {
        if ($password == null) {
            return null;
        }

        $note = Note::where(function ($query) use ($code) {
            $query->where('code', $code)->orWhere('t_code', $code);
        })->wherePasswordHash(md5($password))->first();

        if ($note == null) {
            return null;
        }

        return $this->decryptNote($note, $password);
    }

    public function findById(int $id) {
            return Note::whereId($id)->first();
    }

    public function clearExpired() {
        return Note::where('created_at', '<', Carbon::now()->subDays(2))->delete();
    }

    private function encryptNote(Note $note, string $password) : Note {
        $encrypter = new Encrypter($password . \str_repeat("0", 16 - \strlen($password)));

        $note->text = $encrypter->encrypt($note->text);
        $note->password_hash = md5($password);

        return $note;
    }

    private function decryptNote(Note $note, string $password) : Note
    {
        $password = $password . \str_repeat("0", 16 - \strlen($password));
        $encrypter = new Encrypter($password);
        $note->text = $encrypter->decrypt($note->text);

        return $note;
    }

    public function findAllParents(int $parentId, string $password): Collection
    {
        $result = new Collection();

        do {
            if ($parentId == null) break;

            $note = $this->findById($parentId);
            if ($note != null) {
                $note = $password ? $this->decryptNote($note, $password) : $note;
                $result->add($note);
                $parentId = $note->parent_id;
            }
        } while($note != null);

        return $result->sortBy("created_at");
    }
}
