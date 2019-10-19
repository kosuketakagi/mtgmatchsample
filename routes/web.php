<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function() {
    Route::get('recruit/create', 'Admin\RecruitController@add')->middleware('auth');
    Route::post('recruit/create', 'Admin\RecruitController@create')->middleware('auth');
    Route::get('recruit/edit', 'Admin\RecruitController@edit')->middleware('auth');
    Route::post('recruit/edit', 'Admin\RecruitController@update')->middleware('auth');
    Route::get('recruit/delete', 'Admin\RecruitController@delete')->middleware('auth');
    Route::get('join', 'Admin\RecruitController@join')->middleware('auth');
    Route::get('mypage', 'IndexController@mypage')->middleware('auth');
    //Route::post('mypage', 'AllviewController@mypage')->middleware('auth');
});

Route::get('index', 'IndexController@index');
Route::get('detail', 'IndexController@detail');


Route::get('/login/{social}', 'Auth\LoginController@socialLogin')->where('social', 'facebook|twitter');
//コールバック用
Route::get('/login/{social}/callback', 'Auth\LoginController@handleProviderCallback')->where('social', 'facebook|twitter');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
