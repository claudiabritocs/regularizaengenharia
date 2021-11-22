<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
		$router->model('imagens', 'App\Models\Imagem');
		$router->model('home', 'App\Models\Home');
        $router->model('principal', 'App\Models\Principal');
        $router->model('banners', 'App\Models\Banners');
        $router->model('servicos', 'App\Models\Servicos');
		$router->model('configuracoes', 'App\Models\Configuracoes');
        $router->model('recebidos', 'App\Models\ContatoRecebido');
        // $router->model('contato', 'App\Models\Contato');
        $router->model('usuarios', 'App\Models\User');



        parent::boot($router);
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}
