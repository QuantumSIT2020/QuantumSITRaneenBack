<?php


Route::get('/lang/{lang}','LanguageController@index')->name('dashboard_changelang');

Route::get('/', 'Frontend\HomeController@index')->name('home');
Route::get('/home', 'Frontend\HomeController@index')->name('home');


//Blogs
Route::get('/blogs', 'Frontend\BlogsController@index')->name('frontend_blogs');
Route::get('/blogs/{id}', 'Frontend\BlogsController@show')->name('frontend_show_blogs');
Route::post('/blogs/comment/{id}', 'Frontend\BlogsController@addComment')->name('frontend_comment_blogs');

//Products as arrange 1 2 3
Route::get('/main-category', 'Frontend\ProductsController@mainCategory')->name('frontend_maincategory');
Route::get('/main-category/{id}', 'Frontend\ProductsController@childCategory')->name('frontend_childcategory');
Route::get('/child-category/{id}', 'Frontend\ProductsController@subCategory')->name('frontend_subcategory');
Route::get('/sub-category/{id}', 'Frontend\ProductsController@brandProducts')->name('frontend_brandcategory');


Route::get('/prod/{id}', 'Frontend\BlogsController@show')->name('frontend_show_blogs');
Route::post('/prod/comment/{id}', 'Frontend\BlogsController@addComment')->name('frontend_comment_blogs');

Auth::routes();


