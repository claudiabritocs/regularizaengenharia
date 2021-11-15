<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
            $view->with('projetosCategorias', \App\Models\ProjetoCategoria::ordenados()->get());
        });

        view()->composer('painel.common.nav', function($view) {
            $view->with('contatosNaoLidos', \App\Models\ContatoRecebido::naoLidos()->count());
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
