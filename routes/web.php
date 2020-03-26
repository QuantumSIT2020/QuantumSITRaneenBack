<?php


Route::get('/lang/{lang}','LanguageController@index')->name('dashboard_changelang');

Route::get('/', 'Frontend\HomeController@index')->name('home');
Route::get('/home', 'Frontend\HomeController@index')->name('home');


//Blogs
Route::get('/blogs', 'Frontend\BlogsController@index')->name('frontend_blogs');
Route::get('/blogs/{id}', 'Frontend\BlogsController@show')->name('frontend_show_blogs');
Route::post('/blogs/comment/{id}', 'Frontend\BlogsController@addComment')->name('frontend_comment_blogs');
Route::get('/news', 'Frontend\BlogsController@news')->name('frontend_news');
Route::get('/news/{id}', 'Frontend\BlogsController@showNews')->name('frontend_show_news');

//Products as arrange 1 2 3 4
Route::get('/main-category', 'Frontend\ProductsController@mainCategory')->name('frontend_maincategory');
Route::get('/main-category/{id}', 'Frontend\ProductsController@childCategory')->name('frontend_childcategory');
Route::get('/child-category/{id}', 'Frontend\ProductsController@subCategory')->name('frontend_subcategory');
Route::get('/sub-category/{id}', 'Frontend\ProductsController@brandProducts')->name('frontend_brandcategory');

//Pages
Route::get('/pages/{id}','Frontend\PagesController@index')->name('frontend_pages');

//Auth
Route::get('/user/login','Frontend\AuthController@login')->name('frontend_login');
Route::get('/user/register','Frontend\AuthController@register')->name('frontend_register');
Route::post('/user/register','Frontend\AuthController@registerPost')->name('frontend_register_post');
Route::get('/user/forget','Frontend\AuthController@forget')->name('frontend_forget');

Auth::routes();


