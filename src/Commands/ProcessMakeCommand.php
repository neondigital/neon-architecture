<?php

namespace Neondigital\NeonArchitecture\Commands;

use Str;
use Illuminate\Console\Command;
use Illuminate\Console\GeneratorCommand;

class ProcessMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:process {name : e.g. PlaceOrderProcess} {folder?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new process class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Process';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/process.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        if ($this->getFolderInput()) {
            return $rootNamespace.'\Processes\\' . Str::studly($this->getFolderInput());
        } else {
            return $rootNamespace.'\Processes';
        }
    }

    /**
     * Get the desired class name from the input.
     *
     * @return string
     */
    protected function getFolderInput()
    {
        return trim($this->argument('folder'));
    }

    /**
     * Get the desired class name from the input.
     *
     * @return string
     */
    protected function getNameInput()
    {
        $name = trim($this->argument('name'));

        if (config('neon-architecture.suffix_processes', true)) {
            $name .= "Process";
        }

        return $name;
    }
}
