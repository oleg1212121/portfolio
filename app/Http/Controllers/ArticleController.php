<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $options = $this->checkOptions($request->all());
        $articles = Article::whereDate('created_at', '>=', $options['start_date'])
            ->whereDate('created_at', '<=', $options['end_date'])
            ->orderBy('created_at', $options['sort'])
            ->get();

        return view('articles.articles_list', compact('articles', 'options'));
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
        /**
         * Проверка опций из реквеста, задание значений по умолчанию (для исключения ошибок ввода)
         * todo: потом переделать под ajax
         */
        return [
            'start_date' => ($x = \DateTime::createFromFormat('Y-m-d', ($data['start_date'] ?? ''))) ? $x->format('Y-m-d')
                : (date('Y-m-d', time() - (25 * 24 * 60 * 60))),
            'end_date' => ($y = \DateTime::createFromFormat('Y-m-d', ($data['end_date'] ?? ''))) ? $y->format('Y-m-d')
                : (date('Y-m-d')),
            'sort' => ($data['sort'] ?? '') == 'asc' ? 'asc' : 'desc',
        ];
    }
}
