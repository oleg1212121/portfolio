<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * @var array Массив значений для фильтра новостей.
     */
    protected $periods = [
        5 => 'Новости за последние 5 дней',
        10 => 'Новости за последние 10 дней',
        15 => 'Новости за последние 15 дней',
    ];

    /**
     * @var array Массив значений для настройки фильтрации на странице списка новостей.
     */
    protected $options = [
        "period" => 5,
        "category" => 0,
    ];

    /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::pluck('name', 'id');
        $types = Type::pluck('name', 'id');
        $periods = $this->periods;
        $options = $this->checkOptions($request->all());
        $articles = Article::whereBetween('created_at', [Carbon::now()->subDay($options['period']), Carbon::now()])
            ->when( $options['category'] > 0, function($query) use ($options){
                return $query->where('category_id', $options['category']);
            })->with('category', 'type')->get()->chunk(3);

        return view('articles.articles_list', compact('articles', 'types', 'categories', 'periods', 'options'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $types = Type::pluck('name', 'id');
        return view('articles.articles_create', compact('categories', 'types'));
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
        $data['user_id'] = 1;
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
        $article = $article->load('category', 'type');
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
        $article = $article->load('category', 'type');
        $categories = Category::pluck('name', 'id');
        $types = Type::pluck('name', 'id');
        return view('articles.articles_edit', compact('categories', 'types', 'article'));
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
