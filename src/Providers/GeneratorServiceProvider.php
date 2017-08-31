<?php

namespace Expstudio\Modules\Providers;

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
            'command.make.module'            => \Expstudio\Modules\Console\Generators\MakeModuleCommand::class,
            'command.make.module.controller' => \Expstudio\Modules\Console\Generators\MakeControllerCommand::class,
            'command.make.module.middleware' => \Expstudio\Modules\Console\Generators\MakeMiddlewareCommand::class,
            'command.make.module.migration'  => \Expstudio\Modules\Console\Generators\MakeMigrationCommand::class,
            'command.make.module.model'      => \Expstudio\Modules\Console\Generators\MakeModelCommand::class,
            'command.make.module.policy'     => \Expstudio\Modules\Console\Generators\MakePolicyCommand::class,
            'command.make.module.provider'   => \Expstudio\Modules\Console\Generators\MakeProviderCommand::class,
            'command.make.module.request'    => \Expstudio\Modules\Console\Generators\MakeRequestCommand::class,
            'command.make.module.seeder'     => \Expstudio\Modules\Console\Generators\MakeSeederCommand::class,
            'command.make.module.test'       => \Expstudio\Modules\Console\Generators\MakeTestCommand::class,
        ];

        foreach ($generators as $slug => $class) {
            $this->app->singleton($slug, function ($app) use ($slug, $class) {
                return $app[$class];
            });

            $this->commands($slug);
        }
    }
}
