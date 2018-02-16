<?php

namespace Jasahub\Modules;

use Jasahub\Modules\Contracts\Repository;
use Jasahub\Modules\Providers\BladeServiceProvider;
use Jasahub\Modules\Providers\ConsoleServiceProvider;
use Jasahub\Modules\Providers\GeneratorServiceProvider;
use Jasahub\Modules\Providers\HelperServiceProvider;
use Jasahub\Modules\Providers\RepositoryServiceProvider;
use Illuminate\Support\ServiceProvider;

class ModulesServiceProvider extends ServiceProvider
{
    /**
     * @var bool Indicates if loading of the provider is deferred.
     */
    protected $defer = false;

    /**
     * Boot the service provider.
     *
     * @return void
     */
    private function config_path($path = '')
    {
        return app()->basePath() . '/config' . ($path ? '/' . $path : $path);
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/modules.php' => $this->config_path('modules.php'),
        ], 'config');

        $this->app['modules']->register();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/modules.php', 'modules'
        );

        $this->app->register(ConsoleServiceProvider::class);
        $this->app->register(GeneratorServiceProvider::class);
        $this->app->register(HelperServiceProvider::class);
        $this->app->register(RepositoryServiceProvider::class);
        $this->app->register(BladeServiceProvider::class);

        $this->app->singleton('modules', function ($app) {
            $repository = $app->make(Repository::class);

            return new Modules($app, $repository);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['modules'];
    }

    public static function compiles()
    {
        $modules = app()->make('modules')->all();
        $files   = [];

        foreach ($modules as $module) {
            $serviceProvider = module_class($module['slug'], 'Providers\\ModuleServiceProvider');

            if (class_exists($serviceProvider)) {
                $files = array_merge($files, forward_static_call([$serviceProvider, 'compiles']));
            }
        }

        return array_map('realpath', $files);
    }
}
