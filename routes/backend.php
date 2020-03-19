<?php

Route::prefix('dashboard')->group(function(){

    Route::get('/','HomeController@index')->name('dashboard_index');

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

    //Permissions
    Route::get('/permissions','PermissionsController@index')->name('permissions');
    Route::get('/permissions/create','PermissionsController@create')->name('create_permissions');
    Route::post('/permissions/create','PermissionsController@store')->name('store_permissions');
    Route::get('/permissions/edit','PermissionsController@edit')->name('edit_permissions');
    Route::post('/permissions/update','PermissionsController@update')->name('update_permissions');
    Route::get('/permissions/delete/{id}','PermissionsController@destroy')->name('delete_permissions');
    Route::get('/permissions/show/{id}','PermissionsController@show')->name('show_permissions');

});
