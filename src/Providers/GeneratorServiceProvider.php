<?php

namespace Jasahub\Modules\Providers;

use Illuminate\Support\ServiceProvider;

class GeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $generators = [
            'command.make.module'            => \Jasahub\Modules\Console\Generators\MakeModuleCommand::class,
            'command.make.module.controller' => \Jasahub\Modules\Console\Generators\MakeControllerCommand::class,
            'command.make.module.middleware' => \Jasahub\Modules\Console\Generators\MakeMiddlewareCommand::class,
            'command.make.module.migration'  => \Jasahub\Modules\Console\Generators\MakeMigrationCommand::class,
            'command.make.module.model'      => \Jasahub\Modules\Console\Generators\MakeModelCommand::class,
            'command.make.module.policy'     => \Jasahub\Modules\Console\Generators\MakePolicyCommand::class,
            'command.make.module.provider'   => \Jasahub\Modules\Console\Generators\MakeProviderCommand::class,
            'command.make.module.request'    => \Jasahub\Modules\Console\Generators\MakeRequestCommand::class,
            'command.make.module.seeder'     => \Jasahub\Modules\Console\Generators\MakeSeederCommand::class,
            'command.make.module.test'       => \Jasahub\Modules\Console\Generators\MakeTestCommand::class,
        ];

        foreach ($generators as $slug => $class) {
            $this->app->singleton($slug, function ($app) use ($slug, $class) {
                return $app[$class];
            });

            $this->commands($slug);
        }
    }
}
