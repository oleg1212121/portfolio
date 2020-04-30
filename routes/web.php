<?php
Route::group(['middleware' => 'statistic'], function(){

    Route::resource('users', 'MainPageController', ['users'])->only(['index','show']);
    Route::resource('articles', 'ArticleController', ['articles'])->only(['index', 'show']);
    Route::resource('jobs', 'JobController', ['jobs'])->only(['index']);

    Route::resource('statistics', 'StatisticController', ['statistics'])->only(['index']);

    Route::group(['middleware' => 'auth'], function(){
        Route::resource('articles', 'ArticleController', ['articles'])->only(['create', 'store', 'edit', 'update', 'destroy']);
        Route::resource('users', 'MainPageController', ['users'])->only(['edit','update','destroy'])->middleware('self');
        Route::resource('words', 'WordController', ['words'])->only(['index']);
        Route::resource('films', 'FilmController', ['films']);
        Route::post('/mark_word/{word}', 'WordController@learn');
        Route::post('/translate_word/{word}', 'WordController@correctionTranslate');
        Route::post('/update_word/{word}', 'WordController@update');
        Route::post('/delete_word/{word}', 'WordController@destroy');
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    });

    Route::get('/', function (){
        return redirect()->route('users.index');
    });
    Auth::routes();
});





//Route::resource('services', 'ServiceController', ['services'])->only(['index']);
//Route::post('services/get-hash', 'ServiceController@getHash');
//Route::post('services/calculator', 'ServiceController@calculator');
