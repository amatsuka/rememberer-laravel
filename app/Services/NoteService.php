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

    }

    private function decryptNote(Note $note, string $password) : Note
    {

    }
}
