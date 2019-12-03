<?php

namespace App\Console\Commands;

use App\Models\Word;
use Illuminate\Console\Command;
use Illuminate\Database\QueryException;
use Bluora\Yandex\Facades\YandexTranslateFacade;
use Symfony\Component\Console\Output\ConsoleOutput;

class TranslateWordsChunk extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'words:translatechunk';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Переводит часть фраз';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $output = new ConsoleOutput();

        if (\file_exists(\storage_path('app/last_translated_phrase_id'))) {
            $id = file_get_contents(\storage_path('app/last_translated_phrase_id'));
        }

        if (empty($id)) {
            $id = 1;
        }

        $words = Word::where('id', '>', $id)->where('locale', 'ru')->limit(2000)->get();

        $pack  = $words->map(function(Word $word) {
            return $word->text;
        });

        $translate = YandexTranslateFacade::translate($pack->join('. '), 'ru', 'en');

        $resultPack = explode('. ', $translate);

        foreach ($resultPack as $resultPhrase) {
            try {
                Word::create([
                    'text' => strtolower($resultPhrase),
                    'locale' => 'en'
                ]);
            } catch (QueryException $ex) {
                $output->writeln("<error>Дубликат " .  strtolower($resultPhrase) . '</error>');
            }
        }


        \file_put_contents(\storage_path('app/last_translated_phrase_id'), $words->last()->id);
    }
}
