<?php

namespace Bjnstnkvc\BuilderMakeCommand;

use Bjnstnkvc\BuilderMakeCommand\Console\Commands\BuilderMakeCommand;
use Illuminate\Support\ServiceProvider;

class BuilderMakeCommandServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                BuilderMakeCommand::class,
            ]);
        }
    }
}
