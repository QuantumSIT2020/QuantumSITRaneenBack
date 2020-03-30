<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\WishList;
use App\Models\ChildCategory;
use App\Models\MainCategory;
use Auth;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        
        $lang = \Lang::getLocale();
        View::share('user_wishlists',WishList::orderBy('id','desc')->limit(3)->get());
        View::share('childCategorySearch',ChildCategory::select($lang.'_name as name',$lang.'_desc as description','main_category_id','child_image','id')->get());
        View::share('MainCategoriesMenu',MainCategory::select($lang.'_name as name','id')->get());
        
    }
}
