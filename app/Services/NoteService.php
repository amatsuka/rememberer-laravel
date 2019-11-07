<?php
namespace App\Services;

use App\Models\Note;

class NoteService {

    /**
     * @var NoteCodeService
     */
    private $noteCodeService;

    public function __construct(NoteCodeService $noteCodeService)
    {
        $this->noteCodeService = $noteCodeService;
    }

    public function store(array $attributes) : Note {
        $note = new Note($attributes);

        if ($attributes['password']) {
            $note = $this->encryptNote($note, $attributes['password']);
        }

        $note->code = $this->noteCodeService->generateCode();
        $note->save();

        return $note;
    }

    public function findByCode(string $code) : ?Note
    {
        return Note::whereCode($code)->wherePasswordHash(null)->first();
    }

    public function findByCodeIgnorePassword(string $code) : ?Note
    {
        return Note::whereCode($code)->first();
    }

    public function findByCodeAndPassword(string $code, string $password) : ?Note
    {
        $note = Note::whereCode($code)->wherePasswordHash(md5($password))->first();
        return $this->decryptNote($note, $password);
    }

    private function encryptNote(Note $note, string $password) : Note {
        $encrypter = new \Illuminate\Encryption\Encrypter($password . \str_repeat("0", 16 - \strlen($password)));

        $note->text = $encrypter->encrypt($note->text);
        $note->password_hash = md5($password);

        return $note;
    }

    private function decryptNote(Note $note, string $password) : Note
    {
        $password = $password . \str_repeat("0", 16 - \strlen($password));
        $encrypter = new \Illuminate\Encryption\Encrypter($password);
        $note->text = $encrypter->decrypt($note->text);

        return $note;
    }
}
