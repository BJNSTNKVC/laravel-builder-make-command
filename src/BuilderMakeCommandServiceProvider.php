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
        $this->mergeConfigFrom(
            __DIR__ . '/config/builder.php',
            'builder'
        );

        if ($this->app->runningInConsole()) {
            $this->commands([
                BuilderMakeCommand::class,
            ]);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/config/builder.php' => config_path('builder.php'),
        ], 'make-builder-config');

        $this->publishes([
            __DIR__ . '/Console/Commands/stubs' => base_path('stubs'),
        ], 'make-builder-stubs');
    }
}
