<?php

namespace App\Providers;

use View;
use Cart;
use Session;
use App\Mainmenu;
use App\Category;
use App\SubCategory;
use App\Brand;
use App\Product;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(){
        View::composer('*', function ($view){
            $view->with('publishBrands', Brand::where('brand_publish_status', 1)->orderBy('brand_name', 'asc')->get());
            $view->with('publishMainmenus', Mainmenu::where('mainmenu_publish_status', 1)->orderBy('mainmenu_name', 'asc')->get());
            $view->with('publishCategories', Category::where('category_publish_status', 1)->orderBy('category_name', 'asc')->get());
            $view->with('publishSubCategories', SubCategory::where('sub_category_publish_status', 1)->orderBy('sub_category_name', 'asc')->get());
            $view->with('cartProducts', Cart::content());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
