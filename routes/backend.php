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
        Route::get('/buyers','UsersController@buyers')->name('buyers');
        Route::get('/buyers/create','UsersController@createBuyers')->name('create_buyers');
        Route::post('/buyers/store','UsersController@storeBuyers')->name('store_buyers');
        Route::get('/buyers/edit/{id}','UsersController@editBuyers')->name('edit_buyers');
        Route::post('/buyers/update','UsersController@updateBuyers')->name('update_buyers');
        Route::get('/buyers/delete/{id}','UsersController@destroyBuyers')->name('delete_buyers');
        Route::get('/buyers/show/{id}','UsersController@showBuyers')->name('show_buyers');
        Route::get('/buyers/search','UsersController@searchBuyers')->name('search_buyers');
        
        //Data Entry
        Route::get('/data-entry','UsersController@dataEntries')->name('dataentry');
        Route::get('/data-entry/create','UsersController@createdataEntries')->name('create_dataentry');
        Route::post('/data-entry/store','UsersController@storedataEntries')->name('store_dataentry');
        Route::get('/data-entry/edit/{id}','UsersController@editdataEntries')->name('edit_dataentry');
        Route::post('/data-entry/update','UsersController@updatedataEntries')->name('update_dataentry');
        Route::get('/data-entry/delete/{id}','UsersController@destroydataEntries')->name('delete_dataentry');
        Route::get('/data-entry/show/{id}','UsersController@showdataEntries')->name('show_dataentry');
        Route::get('/data-entry/search','UsersController@searchdataEntries')->name('search_dataentry');

        //Inventory
        Route::get('/inventory','InventoryController@index')->name('inventories');
        Route::get('/inventory/create','InventoryController@create')->name('create_inventories');
        Route::post('/inventory/store','InventoryController@store')->name('store_inventories');
        Route::get('/inventory/edit/{id}','InventoryController@edit')->name('edit_inventories');
        Route::post('/inventory/update','InventoryController@update')->name('update_inventories');
        Route::get('/inventory/delete/{id}','InventoryController@destroy')->name('delete_inventories');
        Route::get('/inventory/show/{id}','InventoryController@show')->name('show_inventories');
        Route::get('/inventory/search','InventoryController@search')->name('search_inventories');

        //Manufacturer
        Route::get('/manufacturer','ManufacturerController@index')->name('manufacturers');
        Route::get('/manufacturer/create','ManufacturerController@create')->name('create_manufacturers');
        Route::post('/manufacturer/store','ManufacturerController@store')->name('store_manufacturers');
        Route::get('/manufacturer/edit/{id}','ManufacturerController@edit')->name('edit_manufacturers');
        Route::post('/manufacturer/update','ManufacturerController@update')->name('update_manufacturers');
        Route::get('/manufacturer/delete/{id}','ManufacturerController@destroy')->name('delete_manufacturers');
        Route::get('/manufacturer/show/{id}','ManufacturerController@show')->name('show_manufacturers');
        Route::get('/manufacturer/search','ManufacturerController@search')->name('search_manufacturers');




        //GroupAttributes
        Route::get('/GroupAttributes','GroupAttributeController@index')->name('GroupAttributes');
        Route::get('/GroupAttributes/create','GroupAttributeController@create')->name('create_GroupAttributes');
        Route::post('/GroupAttributes/store','GroupAttributeController@store')->name('store_GroupAttributes');
        Route::get('/GroupAttributes/edit/{id}','GroupAttributeController@edit')->name('edit_GroupAttributes');
        Route::post('/GroupAttributes/update/{id}','GroupAttributeController@update')->name('update_GroupAttributes');
        Route::get('/GroupAttributes/delete/{id}','GroupAttributeController@destroy')->name('delete_GroupAttributes');
        Route::get('/GroupAttributes/show/{id}','GroupAttributeController@show')->name('show_GroupAttributes');
//        Route::get('/GroupAttributes/search','GroupAttributeController@search')->name('search_GroupAttributes');



        //Attributes
        Route::get('/Attributes','AttributesController@index')->name('Attributes');
        Route::get('/Attributes/create','AttributesController@create')->name('create_Attributes');
        Route::post('/Attributes/store','AttributesController@store')->name('store_Attributes');
        Route::get('/Attributes/edit/{id}','AttributesController@edit')->name('edit_Attributes');
        Route::post('/Attributes/update/{id}','AttributesController@update')->name('update_Attributes');
        Route::get('/Attributes/delete/{id}','AttributesController@destroy')->name('delete_Attributes');
        Route::get('/Attributes/show/{id}','AttributesController@show')->name('show_Attributes');
//        Route::get('/Attributes/search','AttributesController@search')->name('search_Attributes');





        //wishlist

        Route::get('/wishlist','WishListController@index')->name('wishlist');
        Route::get('/wishlist/create','ChildCategoryController@create')->name('create_wishlist');
        Route::post('/wishlist/store','ChildCategoryController@store')->name('store_wishlist');
//        Route::get('/ChildCategory/show/{id}','ChildCategoryController@show')->name('show_ChildCategory');
        Route::get('/wishlist/delete/{id}','ChildCategoryController@destroy')->name('wishlist');










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


        //seo

        Route::get('/testseo', 'SeoController@index')->name('testseo_index');
        Route::post('/testseo/update', 'SeoController@update')->name('testseo_update');


        //soicalmedia

        Route::get('/soicalmedia', 'SoicalMediaController@index')->name('soicalmedia_index');
        Route::post('/soicalmedia/update', 'SoicalMediaController@update')->name('soicalmedia_update');
        

        //Products
        Route::get('/products','ProductsController@index')->name('products');
        Route::get('/products/create','ProductsController@create')->name('create_products');
        Route::post('/products/store','ProductsController@store')->name('store_products');
        Route::get('/products/edit/{id}','ProductsController@edit')->name('edit_products');
        Route::post('/products/update/{id}','ProductsController@update')->name('update_products');
        Route::get('/products/delete/{id}','ProductsController@destroy')->name('delete_products');
        Route::get('/products/show/{id}','ProductsController@show')->name('show_products');

        Route::get('products/delete_img/{id}','ProductsController@delete_img')->name('delete_product_img');
        Route::get('products/delete_attribute/{id}','ProductsController@delete_attribute')->name('delete_attribute');
        Route::get('/products/search','ProductsController@search_product')->name('search_products');
        Route::get('/products/hotsaleproducts','ProductsController@hot_sale')->name('hotsale_products');
        Route::get('/products/hotsale/{id}','ProductsController@hot_sale_create')->name('create_hotsale_products');
        Route::post('/products/hotsale/{id}','ProductsController@hot_sale_store')->name('store_hotsale_products');
        Route::get('/products/hotsale/delete/{id}','ProductsController@delete_hotsale')->name('delete_hotsale');

        //isActive

        Route::get('/products/status/{id}', 'ProductsController@status')->name('products_status');

        //reviews

        Route::get('/reviews','ProductsController@viewReview')->name('reviews');
        Route::get('/reviews/create','ProductsController@createReview')->name('create_reviews');
        Route::post('/reviews/store','ProductsController@storeReview')->name('store_reviews');


        //discount

        Route::get('/discount','ProductSaleController@index')->name('discount');
        Route::get('/discount/create','ProductSaleController@create')->name('create_discount');
        Route::post('/discount/store','ProductSaleController@store')->name('store_discount');
        Route::get('/discount/edit/{id}','ProductSaleController@edit')->name('edit_discount');
        Route::post('/discount/update/{id}','ProductSaleController@update')->name('update_discount');
        Route::get('/discount/delete/{id}','ProductSaleController@destroy')->name('delete_discount');
        Route::get('/discount/show/{id}','ProductSaleController@show')->name('show_discount');







        //slider

        Route::get('/sliders','SliderController@index')->name('sliders');
        Route::get('/sliders/create','SliderController@create')->name('create_sliders');
        Route::post('/sliders/store','SliderController@store')->name('store_sliders');
        Route::get('/sliders/edit/{id}','SliderController@edit')->name('edit_sliders');
        Route::post('/sliders/update/{id}','SliderController@update')->name('update_sliders');
        Route::get('/sliders/delete/{id}','SliderController@destroy')->name('delete_sliders');
        Route::get('/sliders/show/{id}','SliderController@show')->name('show_sliders');



        //partners

        Route::get('/partners','PartnersController@index')->name('partners');
        Route::get('/partners/create','PartnersController@create')->name('create_partners');
        Route::post('/partners/create','PartnersController@store')->name('store_partners');
        Route::get('/partners/edit/{id}','PartnersController@edit')->name('edit_partners');
        Route::post('/partners/update/{id}','PartnersController@update')->name('update_partners');
        Route::get('/partners/delete/{id}','PartnersController@destroy')->name('delete_partners');



        //Product_bundles
        Route::get('/bundles','BundlesController@index')->name('bundles');
        Route::get('/bundles/create','BundlesController@create')->name('create_bundles');
        Route::post('/bundles/store','BundlesController@store')->name('store_bundles');
        Route::get('/bundles/edit/{id}','BundlesController@edit')->name('edit_bundles');
        Route::post('/bundles/update/{id}','BundlesController@update')->name('update_bundles');
        Route::get('/bundles/delete/{id}','BundlesController@destroy')->name('delete_bundles');
        Route::get('/bundles/show/{id}','BundlesController@show')->name('show_bundles');

        Route::get('/bundles/items/delete/{id}','BundlesController@delete_item_bundle')->name('delete_items_bundle');


    });
    

});


