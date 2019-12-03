<?php

namespace App\Console\Commands;

use App\Models\Word;
use Illuminate\Console\Command;
use Bluora\Yandex\Facades\YandexTranslateFacade;

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
        $output = new Symfony\Component\Console\Output\ConsoleOutput();

        if (\file_exists(\storage_path('app/last_translated_phrase_id'))) {
            $id = file_get_contents(\storage_path('app/last_translated_phrase_id'));
        }

        if (empty($id)) {
            $id = 1;
        }

        $words = Word::where('id', '>', $id)->where('locale', 'ru')->limit(100)->get();

        $words->each(function(Word $word) use ($output){
            $translate = YandexTranslateFacade::translate($word->text, 'ru', 'en');
              try {
                    Word::create([
                    'text' => $translate,
                    'locale' => 'en'
                ]);
             } catch (QueryException $ex) {
                    $output->writeln("<error>Дубликат " . $word->text .  '-> ' .  $translate . '</error>');
                }
        });

        \file_put_contents(\storage_path('app/last_translated_phrase_id'), $words->last()->id);
    }
}
