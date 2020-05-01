<?php

namespace App\Http\Controllers;

use App\Jobs\CreateFilmDictionary;
use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = Film::pluck('title', 'id');

        return view('films.index', compact('films'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('films.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = $request->file('file')->store('films');
        $title = $request->title;

        $film = Film::create([
            'title' => $title,
            'file' => $path
        ]);

        CreateFilmDictionary::dispatch($film);

        return redirect()->route('films.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Request $request
     * @param  Film $film
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Film $film)
    {
        $statuses = array_values($request->input('statuses', []));

        $film = $film->load(['words' => function ($q) use ($statuses) {
            $q->when(count($statuses) > 0, function ($i) use ($statuses) {
                return $i->whereIn('status', $statuses)->orderBy('status', 'desc');
            }, function ($i) {
                return $i->where('status', '>', 9)->orderBy('status', 'desc');
            });

        }]);
        return view('films.show', compact('film', 'statuses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Film $film
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {
        $film->delete();
        return redirect()->route('films.index');
    }
}
