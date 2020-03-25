<?php


Route::get('/lang/{lang}','LanguageController@index')->name('dashboard_changelang');

Route::get('/', 'Frontend\HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'Frontend\HomeController@index')->name('home');

