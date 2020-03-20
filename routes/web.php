<?php


Route::get('/lang/{lang}','LanguageController@index')->name('dashboard_changelang');
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

