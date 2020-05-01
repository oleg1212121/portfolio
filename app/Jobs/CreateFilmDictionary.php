<?php

namespace App\Jobs;

use App\Http\CustomServices\TranslatorService;
use App\Models\Film;
use App\Models\Word;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class CreateFilmDictionary implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 5;
    public $timeout = 240;

    protected $film;

    /**
     * Create a new job instance.
     *
     * @param Film $film
     * @return void
     */
    public function __construct(Film $film)
    {
        $this->film = $film;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $text = mb_strtolower(Storage::get($this->film->file));
        $text = preg_replace('~[0-9\?\>\-\=]~', '', $text);
        $arr = array_values(array_unique(str_word_count($text, 1)));

        $indexes = [];
        foreach ($arr as $item) {
            $word = Word::firstOrCreate([
                'word' => $item
            ],[
                'translate' => TranslatorService::getYandexDictionaryTranslate($item),
                'rating' => 6000,
                'status' => 9
            ]);
            array_push($indexes, $word->id);
        }
     
        $this->film->words()->sync($indexes);



    }
}
