<?php


Route::group(['middleware' => 'auth','prefix' => 'admin'], function() {
    Route::get('recruit/create', 'Admin\RecruitController@add');
    Route::post('recruit/create', 'Admin\RecruitController@create');
    Route::get('recruit/edit', 'Admin\RecruitController@edit');
    Route::post('recruit/update', 'Admin\RecruitController@update');
    Route::post('recruit/delete', 'Admin\RecruitController@delete');
    Route::post('recruit/deletecomment', 'Admin\RecruitController@deleteComment');
    Route::get('join', 'Admin\RecruitController@join');
    Route::get('recruit/mypage', 'IndexController@mypage');
    Route::get('recruit/detail', 'IndexController@mydetail');
    Route::post('recruit/detail', 'Admin\RecruitController@comment');
    Route::get('recruit/request', 'Admin\RecruitController@requestIndex');
    Route::post('recruit/request', 'Admin\RecruitController@approval');

});

Route::get('index', 'IndexController@index');
Route::get('detail', 'IndexController@detail');
Route::get('/home', 'IndexController@topIndex');
Route::get('/about','IndexController@about');



Route::get('/login/{social}', 'Auth\LoginController@socialLogin')->where('social', 'facebook|twitter');
//コールバック用
Route::get('/login/{social}/callback', 'Auth\LoginController@handleProviderCallback')->where('social', 'facebook|twitter');
Route::get("auth/twitter/logout","Auth\LoginController@Logout");



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
