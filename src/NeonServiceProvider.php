<?php

namespace Neondigital\NeonArchitecture;

use Illuminate\Support\ServiceProvider;
use Neondigital\NeonArchitecture\Commands\ActionMakeCommand;
use Neondigital\NeonArchitecture\Commands\ProcessMakeCommand;

class NeonServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ActionMakeCommand::class,
                ProcessMakeCommand::class,
            ]);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
