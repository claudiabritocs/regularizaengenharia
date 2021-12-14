<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\AceiteDeCookies;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function($view) {
            $view->with('config', \App\Models\Configuracoes::first());
        });

        view()->composer('frontend.*', function($view) {
            $view->with('contato', \App\Models\Contato::first());

            $request = app(\Illuminate\Http\Request::class);
            $view->with('verificacao', AceiteDeCookies::where('ip', $request->ip())->first());
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
