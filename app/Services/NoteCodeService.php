<?php
namespace App\Services;

use App\Models\Word;
use Illuminate\Support\Facades\App;
use App\Exceptions\EmptyCodeException;

class NoteCodeService
{
    public function generateCode($wordCount = 2) : string
    {
        $locale = App::getLocale();
        $words = [];

        for ($i = 1; $i <= $wordCount; $i++) {
            if ($word = Word::whereLocale($locale)->whereNumber($i)->inRandomOrder()->first())
                $words[] = $word['text'];
        }

        if (count($words) != $wordCount) {
            throw new EmptyCodeException();
        }

        return implode(' ', $words);
    }
}

