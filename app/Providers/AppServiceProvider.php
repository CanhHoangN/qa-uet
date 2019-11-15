<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
    /*    view()->composer('web.master', function ($view) {
            $product = type_products::all();
            $cart = Cart::where('id_user','=',Auth::id())->get();
            $view->with(['prod'=>$product,'cart'=>$cart]);
        });*/
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
