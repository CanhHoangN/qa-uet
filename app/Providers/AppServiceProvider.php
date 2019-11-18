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
            $allsession= Session_qa::orderBy('id_session','DESC')->get();
            $amountSurvey = Survey::all()->count();
            $count_session = $allsession->count();
            $hot_sessions = DB::table('sessions')
                ->join('questions', 'sessions.id_session', '=', 'questions.id_session')
                ->select('sessions.*', DB::raw('count(*) as total'))->groupBy('id_session')->orderBy('total','DESC')->limit('5')
                ->get();
            $view->with(['type_sessions'=>$type_sessions,'allsession'=>$allsession,'count_session'=>$count_session,'amountUser'=>$amountUser,'amountSurvey'=>$amountSurvey,'hot_sessions'=>$hot_sessions]);
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
