<?php

namespace App\Providers;

use App\Session_qa;
use App\Survey;
use App\User;
use Illuminate\Support\Facades\DB;
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
        view()->composer('web.index_master', function ($view) {
            $type_sessions = DB::table('sessions')
                ->select('type_session', DB::raw('count(*) as total'))
                ->groupBy('type_session')->get();

            $amountUser = User::all()->count();
            $allsession= Session_qa::all();
            $amountSurvey = Survey::all()->count();
            $count_session = $allsession->count();
            $view->with(['type_sessions'=>$type_sessions,'allsession'=>$allsession,'count_session'=>$count_session,'amountUser'=>$amountUser,'amountSurvey'=>$amountSurvey]);
        });
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
