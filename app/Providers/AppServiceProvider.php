<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }

    public function boot()
    {
        view()->composer('student.list_questions', function($view){
            if(Session('listQuestions')){
                $view->with([
                    'listQuestions' => Session::get('listQuestions')
                ]);
            }
        });

        view()->composer('student.task', function($view){
            $listQuestion = Session::get('listQuestions');
            $view->with('listQuestions', $listQuestion);
        });

        view()->composer('student.result', function($view){
            $kq = Session::get('finishTest');
            $view->with('finishTest', $kq);
        });
    }
}
