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


//faq


Route::get('/faq','Frontend\FaqController@index')->name('faq');
Route::get('/faq/create','Frontend\FaqController@create')->name('create_faq');
Route::post('/faq/create','Frontend\FaqController@store')->name('store_faq');
Route::get('/faq/edit/{id}','Frontend\FaqController@edit')->name('edit_faq');
Route::post('/faq/update/{id}','Frontend\FaqController@update')->name('update_faq');
Route::get('/faq/show/{id}','Frontend\FaqController@show')->name('show_faq');
Route::get('/faq/delete/{id}','Frontend\FaqController@destroy')->name('delete_faq');
Route::get('/faq/search','Frontend\FaqController@searchPages')->name('search_faq');
Route::get('/faq/viewfaq','Frontend\FaqController@viewfaq')->name('viewfaq');



Auth::routes();


