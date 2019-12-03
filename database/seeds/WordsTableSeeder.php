<?php

use App\Models\Word;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;

class WordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $output = new Symfony\Component\Console\Output\ConsoleOutput();

        $filesInFolder = \File::files(base_path() . '/../json');

        foreach ($filesInFolder as $file ) {
            $output->writeln("<info>Обработка " . $file->getBasename() . '</info>');
            $json = json_decode($file->getContents(), true);

            $words = array_map(function ($a) {
                return mb_strtolower($a['left_word']) . " " . mb_strtolower($a['right_word']);
            }, $json['res']);

            $words = array_unique($words);

            try {
            foreach ($words as $word) {
                Word::create([
                    'text' => $word,
                    'locale' => 'ru'
                ]);
            }
        } catch (QueryException $ex) {
                $output->writeln("<error>Дубликат " . $word . '</error>');
        }
            $output->writeln("<info>Обработан " . $file->getBasename() . '</info>');
        }
    }
}
