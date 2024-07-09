<?php

namespace Atom\Locale\Tests;

use Atom\Locale\LocaleServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    /**
     * Load package service provider.
     */
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Atom\\Locale\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    /**
     * Define environment setup.
     */
    protected function getPackageProviders($app)
    {
        return [
            LocaleServiceProvider::class,
        ];
    }
}
