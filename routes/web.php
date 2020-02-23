<?php

Route::resource('users', 'MainPageController', ['users'])->only(['index','show']);
Route::resource('articles', 'ArticleController', ['articles'])->only(['index', 'show']);
Route::resource('jobs', 'JobController', ['jobs'])->only(['index']);

Route::group(['middleware' => 'auth'], function(){
    Route::resource('users', 'MainPageController', ['users'])->only(['edit','update','destroy'])->middleware('self');
    Route::get('users/{user}/edit', 'MainPageController@edit')->name('users.edit');
    Route::put('users/{user}', 'MainPageController@update')->name('users.update');
    Route::delete('users/{user}', 'MainPageController@destroy')->name('users.destroy');
});

Route::get('/', function (){
    return redirect()->route('users.index');
});

Auth::routes();




//Route::resource('services', 'ServiceController', ['services'])->only(['index']);
//Route::post('services/get-hash', 'ServiceController@getHash');
//Route::post('services/calculator', 'ServiceController@calculator');
