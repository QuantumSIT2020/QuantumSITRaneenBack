<?php

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

});
