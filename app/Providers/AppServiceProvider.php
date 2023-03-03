<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

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
        Passport::routes();

        //inside AppServiceProvider register method:
        //in your navbar view you can now simply loop through them and do your magic: 'shared.navbar'
        view()->composer('front.layouts.header', function($view){
            //get all parent categories with their subcategories
            $menuCategories = \App\Models\Category::where('parent_id', 0)->with('subcategories')->get();
            //attach the menuCategories to the view.     
            $view->with(compact('menuCategories'));
        });


        /*$categories = Category::where('parent_id','=',0)->get();
        View::composer('*', function ($view) {
            $view->with(['mainMenu' => 'categories']);
        });*/

        //$mainMenu = Categorias::whereWxibir(1)->wherePublicado(1)->get();
       /* $mainMenuCategories = $categories;
        View::composer('*', function ($view) {
            $view->with(compact('mainMenuCategories'));
        });*/
    }
}
