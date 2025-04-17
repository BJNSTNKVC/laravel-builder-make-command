<?php

namespace Bjnstnkvc\BuilderMakeCommand\Tests;

use Bjnstnkvc\BuilderMakeCommand\BuilderMakeCommandServiceProvider;
use Illuminate\Foundation\Application;
use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * Get package providers.
     *
     * @param Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app): array
    {
        return [
            BuilderMakeCommandServiceProvider::class,
        ];
    }

    /**
     * Define environment setup.
     *
     * @param Application $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app): void
    {
        $app->setBasePath(__DIR__ . '/../workbench');
    }
}
