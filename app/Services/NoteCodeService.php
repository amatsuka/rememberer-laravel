<?php
namespace App\Services;

use App\Models\Word;
use Illuminate\Support\Facades\App;
use App\Exceptions\EmptyCodeException;

class NoteCodeService
{
    public function generateCode() : string
    {
        $locale = App::getLocale();

        if ($word = Word::whereLocale($locale)->inRandomOrder()->first()) {
            return $word->text;
        }

        throw new EmptyCodeException();
    }
}

