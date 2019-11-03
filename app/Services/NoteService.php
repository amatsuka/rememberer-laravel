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

    }

    public function findByCode(string $code) : ?Note
    { }

    public function findByCodeAndPassword(string $code, string $password) : ?Note
    {

    }

    private function encryptNote(Note $note, string $password) : Note {

    }

    private function decryptNote(Note $note, string $password) : Note
    { }
}
