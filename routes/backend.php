<?php


Route::get('/lang/{lang}','LanguageController@index')->name('dashboard_changelang');

<<<<<<< HEAD
Route::group(['middleware' => 'Lang'], function () {
    Route::prefix('dashboard')->group(function(){

        Route::get('/','HomeController@index')->name('dashboard_index');

        //Roles
        Route::get('/roles','RolesController@index')->name('roles');
        Route::get('/roles/create','RolesController@create')->name('create_roles');
        Route::post('/roles/create','RolesController@store')->name('store_roles');
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




        //ChildCategory

        Route::get('/ChildCategory','ChildCategoryController@index')->name('ChildCategory');
        Route::get('/ChildCategory/create','ChildCategoryController@create')->name('create_ChildCategory');
        Route::post('/ChildCategory/create','ChildCategoryController@store')->name('store_ChildCategory');
        Route::get('/ChildCategory/edit/{id}','ChildCategoryController@edit')->name('edit_ChildCategory');
        Route::post('/ChildCategory/update/{id}','ChildCategoryController@update')->name('update_ChildCategory');
        Route::get('/ChildCategory/show/{id}','ChildCategoryController@show')->name('show_ChildCategory');
        Route::get('/ChildCategory/delete/{id}','ChildCategoryController@destroy')->name('delete_ChildCategory');
        Route::get('/ChildCategory/view','ChildCategoryController@view')->name('view_ChildCategory');



        //SubCategory

        Route::get('/SubCategory','SubCategoryController@index')->name('SubCategory');
        Route::get('/SubCategory/create','SubCategoryController@create')->name('create_SubCategory');
        Route::post('/SubCategory/create','SubCategoryController@store')->name('store_SubCategory');
        Route::get('/SubCategory/edit/{id}','SubCategoryController@edit')->name('edit_SubCategory');
        Route::post('/SubCategory/update/{id}','SubCategoryController@update')->name('update_SubCategory');
        Route::get('/SubCategory/show/{id}','SubCategoryController@show')->name('show_SubCategory');
        Route::get('/SubCategory/delete/{id}','SubCategoryController@destroy')->name('delete_SubCategory');




        //pages

        Route::get('/pages','PagesController@index')->name('pages');
        Route::get('/pages/create','PagesController@create')->name('create_pages');
        Route::post('/pages/create','PagesController@store')->name('store_pages');
        Route::get('/pages/edit/{id}','PagesController@edit')->name('edit_pages');
        Route::post('/pages/update/{id}','PagesController@update')->name('update_pages');
        Route::get('/pages/show/{id}','PagesController@show')->name('show_pages');
        Route::get('/pages/delete/{id}','PagesController@destroy')->name('delete_pages');

        //blogs

        Route::get('/blogs','BlogsController@index')->name('blogs');
        Route::get('/blogs/create','BlogsController@create')->name('create_blogs');
        Route::post('/blogs/create','BlogsController@store')->name('store_blogs');
        Route::get('/blogs/edit/{id}','BlogsController@edit')->name('edit_blogs');
        Route::post('/blogs/update/{id}','BlogsController@update')->name('update_blogs');
        Route::get('/blogs/show/{id}','BlogsController@show')->name('show_blogs');
        Route::get('/blogs/delete/{id}','BlogsController@destroy')->name('delete_blogs');
        Route::get('/blogs/status/{id}', 'BlogsController@status')->name('status');







    });
=======
    //Roles
    Route::get('/roles','RolesController@index')->name('roles');
    Route::get('/roles/create','RolesController@create')->name('create_roles');
    Route::post('/roles/create','RolesController@store')->name('store_roles');
    Route::get('/roles/edit','RolesController@edit')->name('edit_roles');
    Route::post('/roles/update','RolesController@update')->name('update_roles');
    Route::get('/roles/delete/{id}','RolesController@destroy')->name('delete_roles');
    Route::get('/roles/show/{id}','RolesController@show')->name('show_roles');
    Route::get('/roles/assign/permissions/{id}','RolesController@assignPermission')->name('assign_permissions');
    Route::post('/roles/assign/permissions/{id}','RolesController@assignPermissionPost')->name('assign_permissions_post');
>>>>>>> origin/master

    //Permissions
    Route::get('/permissions','PermissionsController@index')->name('permissions');
    Route::get('/permissions/create','PermissionsController@create')->name('create_permissions');
    Route::post('/permissions/create','PermissionsController@store')->name('store_permissions');
    Route::get('/permissions/edit','PermissionsController@edit')->name('edit_permissions');
    Route::post('/permissions/update','PermissionsController@update')->name('update_permissions');
    Route::get('/permissions/delete/{id}','PermissionsController@destroy')->name('delete_permissions');
    Route::get('/permissions/show/{id}','PermissionsController@show')->name('show_permissions');

});


