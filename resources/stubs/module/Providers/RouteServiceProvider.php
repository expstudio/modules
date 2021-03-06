<?php

namespace DummyNamespace\Providers;

use Illuminate\Support\Facades\Route;

class RouteServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'DummyNamespace\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->map();
    }

    /**
     * Define the routes for the module.
     *
     * @return void
     */
    public function map()
    {
        $this->mapWebRoutes();

        $this->mapApiRoutes();

        //
    }

    /**
     * Define the "web" routes for the module.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        global $app;

        $app->group(['namespace'  => $this->namespace], function ($router) {
            require module_path('DummySlug', 'Routes/web.php');
        });
    }

    /**
     * Define the "api" routes for the module.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        global $app;

        $app->group(['namespace' => $this->namespace, 'prefix' => 'api'], function ($router) {
            require module_path('DummySlug', 'Routes/api.php');
        });
    }
}
