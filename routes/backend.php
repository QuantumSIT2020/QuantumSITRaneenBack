<?php


Route::get('/lang/{lang}','LanguageController@index')->name('dashboard_changelang');

Route::group(['middleware' => 'Lang'], function () {
    Route::prefix('dashboard')->group(function(){

        Route::get('/','HomeController@index')->name('dashboard_index');

        //Roles
        Route::get('/roles','RolesController@index')->name('roles');
        Route::get('/roles/create','RolesController@create')->name('create_roles');
        Route::post('/roles/create','RolesController@store')->name('store_roles');
        Route::get('/roles/edit/{id}','RolesController@edit')->name('edit_roles');
        Route::post('/roles/update','RolesController@update')->name('update_roles');
        Route::get('/roles/delete/{id}','RolesController@destroy')->name('delete_roles');
        Route::get('/roles/show/{id}','RolesController@show')->name('show_roles');
        Route::get('/roles/assign/permissions/{id}','RolesController@assignPermission')->name('assign_permissions');
        Route::post('/roles/assign/permissions/{id}','RolesController@assignPermissionPost')->name('assign_permissions_post');



        //categories

        Route::get('/MainCategory','MainCategoryController@index')->name('MainCategory');
        Route::get('/MainCategory/create','MainCategoryController@create')->name('create_MainCategory');
        Route::post('/MainCategory/create','MainCategoryController@store')->name('store_MainCategory');
        Route::get('/MainCategory/show/{id}','MainCategoryController@show')->name('show_MainCategory');
        Route::get('/MainCategory/edit/{id}','MainCategoryController@edit')->name('edit_MainCategory');
        Route::post('/MainCategory/update/{id}','MainCategoryController@update')->name('update_MainCategory');
        Route::get('/MainCategory/delete/{id}','MainCategoryController@destroy')->name('delete_MainCategory');
        Route::get('/MainCategory/view','MainCategoryController@view')->name('view_MainCategory');
        Route::get('/MainCategory/search','MainCategoryController@searchMainCategory')->name('search_MainCategory');





        //ChildCategory

        Route::get('/ChildCategory','ChildCategoryController@index')->name('ChildCategory');
        Route::get('/ChildCategory/create','ChildCategoryController@create')->name('create_ChildCategory');
        Route::post('/ChildCategory/create','ChildCategoryController@store')->name('store_ChildCategory');
        Route::get('/ChildCategory/edit/{id}','ChildCategoryController@edit')->name('edit_ChildCategory');
        Route::post('/ChildCategory/update/{id}','ChildCategoryController@update')->name('update_ChildCategory');
        Route::get('/ChildCategory/show/{id}','ChildCategoryController@show')->name('show_ChildCategory');
        Route::get('/ChildCategory/delete/{id}','ChildCategoryController@destroy')->name('delete_ChildCategory');
        Route::get('/ChildCategory/view','ChildCategoryController@view')->name('view_ChildCategory');
        Route::get('/ChildCategory/search','ChildCategoryController@searchChildCatgory')->name('search_ChildCategory');




        //SubCategory

        Route::get('/SubCategory','SubCategoryController@index')->name('SubCategory');
        Route::get('/SubCategory/create','SubCategoryController@create')->name('create_SubCategory');
        Route::post('/SubCategory/create','SubCategoryController@store')->name('store_SubCategory');
        Route::get('/SubCategory/edit/{id}','SubCategoryController@edit')->name('edit_SubCategory');
        Route::post('/SubCategory/update/{id}','SubCategoryController@update')->name('update_SubCategory');
        Route::get('/SubCategory/show/{id}','SubCategoryController@show')->name('show_SubCategory');
        Route::get('/SubCategory/delete/{id}','SubCategoryController@destroy')->name('delete_SubCategory');
        Route::get('/SubCategory/search','SubCategoryController@searchSubCategory')->name('search_SubCategory');







        //pages

        Route::get('/pages','PagesController@index')->name('pages');
        Route::get('/pages/create','PagesController@create')->name('create_pages');
        Route::post('/pages/create','PagesController@store')->name('store_pages');
        Route::get('/pages/edit/{id}','PagesController@edit')->name('edit_pages');
        Route::post('/pages/update/{id}','PagesController@update')->name('update_pages');
        Route::get('/pages/show/{id}','PagesController@show')->name('show_pages');
        Route::get('/pages/delete/{id}','PagesController@destroy')->name('delete_pages');
        Route::get('/pages/search','PagesController@searchPages')->name('search_pages');



        //blogs

        Route::get('/blogs','BlogsController@index')->name('blogs');
        Route::get('/blogs/create','BlogsController@create')->name('create_blogs');
        Route::post('/blogs/create','BlogsController@store')->name('store_blogs');
        Route::get('/blogs/edit/{id}','BlogsController@edit')->name('edit_blogs');
        Route::post('/blogs/update/{id}','BlogsController@update')->name('update_blogs');
        Route::get('/blogs/show/{id}','BlogsController@show')->name('show_blogs');
        Route::get('/blogs/delete/{id}','BlogsController@destroy')->name('delete_blogs');
        Route::get('/blogs/status/{id}', 'BlogsController@status')->name('status');
        Route::get('/blogs/search','BlogsController@searchBlogs')->name('search_blogs');



        //Customers
        Route::get('/customers','UsersController@customers')->name('customers');
        Route::get('/customers/create','UsersController@createCustomers')->name('create_customers');
        Route::post('/customers/store','UsersController@storeCustomers')->name('store_customers');
        Route::get('/customers/edit/{id}','UsersController@editCustomers')->name('edit_customers');
        Route::post('/customers/update','UsersController@updateCustomers')->name('update_customers');
        Route::get('/customers/delete/{id}','UsersController@destroyCustomers')->name('delete_customers');
        Route::get('/customers/show/{id}','UsersController@showCustomers')->name('show_customers');
        Route::get('/customers/search','UsersController@searchCustomers')->name('search_customers');


        //Buyers
        Route::get('/buyers','UsersController@buyers')->name('customers');
        Route::get('/buyers/create','UsersController@createBuyers')->name('create_buyers');
        Route::post('/buyers/store','UsersController@storeBuyers')->name('store_buyers');
        Route::get('/buyers/edit/{id}','UsersController@editBuyers')->name('edit_buyers');
        Route::post('/buyers/update','UsersController@updateBuyers')->name('update_buyers');
        Route::get('/buyers/delete/{id}','UsersController@destroyBuyers')->name('delete_buyers');
        Route::get('/buyers/show/{id}','UsersController@showBuyers')->name('show_buyers');
        Route::get('/buyers/search','UsersController@searchBuyers')->name('search_buyers');



        //seo

        Route::get('/testseo', 'SeoController@index')->name('testseo_index');
        Route::post('/testseo/update', 'SeoController@update')->name('testseo_update');


        //soicalmedia

        Route::get('/soicalmedia', 'SoicalMediaController@index')->name('soicalmedia_index');
        Route::post('/soicalmedia/update', 'SoicalMediaController@update')->name('soicalmedia_update');



    });
    

});


