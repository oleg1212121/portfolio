<?php

namespace App\Http\Controllers;

use App\Http\CustomServices\TranslatorService;
use App\Models\Film;
use App\Models\Word;
use Illuminate\Http\Request;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $statuses = array_values($request->input('statuses', []));
        $words = Word::whereIn('status', $statuses)->orderBy('rating')->orderBy('status', 'desc')->orderBy('id')->get();

        return view('words.index', compact('words','statuses'));
    }

    public function learn(Request $request,Word $word)
    {
        $arg = (int) $request->input('argument', 0);
        $status = ($sum = $word->status + $arg) <= 0 ? 0 : $sum ;
        $word->update(['status' => $status]);
        return response('all good', 200);
    }

    public function correctionTranslate(Word $word)
    {
        $res = TranslatorService::getYandexDictionaryTranslate($word->word);
        if($res == ''){
            $res = TranslatorService::getYandexApiTranslate([$word->word])[0] ?? '';
            if($res == ''){
                $res = $word->translate;
            }else{
                $res = '1. '.$res;
            }
        }

        $word->update(['translate' => $res]);
        return response()->json([
            'answer' => $res
        ]);
    }

    public function parseSubtitles(string $path = '')
    {
        $text = mb_strtolower(file_get_contents($path));
        $text = preg_replace('~[0-9\?\>\=]~', ' ', $text);
        $arr = array_unique(str_word_count($text, 1, "АаБбВвГгДдЕеЁёЖжЗзИиЙйКкЛлМмНнОоПпРрСсТтУуФфХхЦцЧчШшЩщЪъЫыЬьЭэЮюЯя"));
        $words = Word::whereIn('word', array_values($arr))->pluck('id');

        $film = Film::first();
        $film->words()->sync($words);
    }

//    /**
//     * Show the form for creating a new resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function create()
//    {
//        //
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return \Illuminate\Http\Response
//     */
//    public function store(Request $request)
//    {
//        //
//    }
//
//    /**
//     * Display the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function show($id)
//    {
//        //
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function edit($id)
//    {
//        //
//    }
//
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Word  $word
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Word $word)
    {
        $data = $request->only('translate');

        $word->update($data);

        return response()->json([
            'answer' => $data['translate']
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Word  $word
     * @return \Illuminate\Http\Response
     */
    public function destroy(Word  $word)
    {
        $word->delete();

        return response('All good', 200);
    }
}
