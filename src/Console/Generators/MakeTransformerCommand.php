<?php

namespace Jasahub\Modules\Console\Generators;

use Jasahub\Modules\Console\GeneratorCommand;

class MakeTransformerCommandCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module:transformer
    	{slug : The slug of the module}
    	{name : The name of the transformer class}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new module transformer class';

    /**
     * String to store the command type.
     *
     * @var string
     */
    protected $type = 'Module transformer';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/transformer.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     *
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return module_class($this->argument('slug'), 'Transformers');
    }
}
