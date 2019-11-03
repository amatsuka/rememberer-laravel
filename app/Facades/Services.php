<?php
namespace App\Facades;

class Services
{
    /**
     * @return \App\Services\NoteService
     */
    public static function noteService()
    {
        return app(NoteService::class);
    }

    /**
     * @return \App\Services\NoteCodeService
     */
    public static function noteCodeService()
    {
        return app(NoteCodeService::class);
    }
}

