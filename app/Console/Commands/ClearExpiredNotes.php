<?php

namespace App\Console\Commands;

use App\Services\NoteService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Console\Output\ConsoleOutput;

class ClearExpiredNotes extends Command
{
    /**
     * @var NoteService
     */
    private $noteService;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notes:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Очистка просроченных записей';

    public function __construct(NoteService $noteService)
    {
        parent::__construct();
        $this->noteService = $noteService;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $output = new ConsoleOutput();

        $count = $this->noteService->clearExpired();

        $output->writeln("<info>Удалено $count записей</info>");
        Log::info("Удалено $count записей");

    }
}
