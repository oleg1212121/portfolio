<?php

namespace App\Console\Commands;

use App\Http\CustomServices\TranslatorService;
use App\Models\Word;
use Illuminate\Console\Command;

class FixEmptyTranslate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dictionary:fix-translate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fixing "translate" column from "words" table (with yandex-translator api)';

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
        $words = Word::where('translate', '')->pluck('word')->toArray();
        $answers = TranslatorService::getYandexApiTranslate($words);

        foreach ($words as $key => $item) {
            $item->update([
                'translate' => $answers[$key] ?? ''
            ]);
        }
    }
}
