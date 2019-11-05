<?php
namespace App\Services;

use App\Models\Note;
use Illuminate\Support\Facades\Config;

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
        return Note::whereCode($code)->wherePasswordHash(null);
    }

    public function findByCodeAndPassword(string $code, string $password) : ?Note
    {
        $note = Note::whereCode($code)->wherePasswordHash(md5(password));

        return $this->decryptNote($note, $password);
    }

    private function encryptNote(Note $note, string $password) : Note {
        $encrypter = new \Illuminate\Encryption\Encrypter($password, Config::get('app.cipher'));
        $note->text = $encrypter->encrypt($note->text);
        $note->password_hash = md5($password);

        return $note;
    }

    private function decryptNote(Note $note, string $password) : Note
    {
        $encrypter = new \Illuminate\Encryption\Encrypter($password, Config::get('app.cipher'));
        $note->text = $encrypter->decrypt($note->text);

        return $note;
    }
}
