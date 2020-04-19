<?php

namespace App\Http\Controllers;

use App\Http\CustomServices\TranslatorService;
use App\Models\Film;
use App\Models\Word;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $words = Word::where('status', '!=', '0')->where('rating', '<', 301)->orderBy('rating')->orderBy('id')->get();

        return view('words.index', compact('words'));
    }

    public function learn(Word $word)
    {
        $word->update(['status' => 0]);
        return response('all good', 200);
    }

    public function correctionTranslate(Word $word)
    {
        $res = TranslatorService::getYandexDictionaryTranslate($word->word);;
        if($res != ''){
            $word->update(['translate' => $res]);
        }else{
            $res = $word->translate;
        }
        return response()->json([
            'answer' => $res
        ]);
    }

    public function parseSubtitles(string $path = '')
    {
        $text = mb_strtolower(file_get_contents($path));
        $text = preg_replace('~[0-9\?\>\=]~', '', $text);
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
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function update(Request $request, $id)
//    {
//        //
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy($id)
//    {
//        //
//    }
}
