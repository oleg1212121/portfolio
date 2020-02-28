<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * @var array Массив значений для фильтра новостей.
     */
    protected $periods = [
        5 => 'Заметки за последние 5 дней',
        10 => 'Заметки за последние 10 дней',
        15 => 'Заметки за последние 15 дней',
    ];

    /**
     * @var array Массив значений для настройки фильтрации на странице списка новостей.
     */
    protected $options = [
        "period" => 5,
    ];

    /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $periods = $this->periods;
        $options = $this->checkOptions($request->all());
        $articles = Article::whereBetween('created_at', [Carbon::now()->subDay($options['period']), Carbon::now()])
            ->orderBy('created_at','desc')
            ->get();

        return view('articles.articles_list', compact('articles', 'periods', 'options'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.articles_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->id();
        Article::create($data);
        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.articles_show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('articles.articles_edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ArticleRequest   $request
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $data = $request->all();
        $article->update($data);
        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }

    /**
     * Изменение настроек для фильтрации
     *
     * @param array $data
     * @return array
     */
    protected function checkOptions(array $data = [])
    {
        $options = $this->options;
        foreach ($data as $key => $item) {
            $options[$key] = (int) $item;
        }
        return $options;
    }
}
