<?php

namespace Neondigital\Commands;

use Illuminate\Console\Command;
use Illuminate\Console\GeneratorCommand;

class ActionMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:action {domain : e.g. Inventory} {name : e.g. PlaceOrderAction}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new action class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Action';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/action.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\\Domains\\' . $this->getDomainInput();
    }

    /**
     * Get the desired class name from the input.
     *
     * @return string
     */
    protected function getDomainInput()
    {
        return trim($this->argument('domain'));
    }
}
