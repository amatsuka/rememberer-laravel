<?php

use App\Models\Word;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::unprepared('delete from words');

        DB::unprepared(file_get_contents(database_path('sql/words-russian-adjectives.sql')));
        DB::unprepared(file_get_contents(database_path('sql/words-russian-nouns.sql')));

        $results = DB::select(DB::raw("SELECT DISTINCT word FROM adjectives"));

        foreach ($results as $word) {
            Word::create([
                'text' => $word->word,
                'number' => 1,
                'locale' => 'ru'
            ]);
        }

        $results = DB::select(DB::raw("SELECT DISTINCT word FROM nouns"));

        foreach ($results as $word) {
            Word::create([
                'text' => $word->word,
                'number' => 2,
                'locale' => 'ru'
            ]);
        }

        DB::unprepared('drop table adjectives');
        DB::unprepared('drop table nouns');
    }
}
