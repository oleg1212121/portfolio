<?php

namespace App\Console\Commands;

use App\Models\Word;
use Illuminate\Console\Command;

class CreateDictionaryFromDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dictionary:create-txt';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create txt file from database';

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
        $filename = 'data.txt';
        $text = '';

        $dictionary = Word::all();

        foreach ($dictionary as $item) {
            $text .= $item->word . ' -- ' . $item->translate . ' -- ' . $item->rating . PHP_EOL;
        }

        $f_hdl = fopen('public/'.$filename, 'w');
        fwrite($f_hdl, $text);
        fclose($f_hdl);

    }
}
