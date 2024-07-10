<?php

namespace Atom\Locale;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LocaleServiceProvider extends PackageServiceProvider
{
    /**
     * Configure the package.
     */
    public function configurePackage(Package $package): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'locale');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'locale');

        $package
            ->name('locale')
            ->hasConfigFile()
            ->hasRoute('web')
            ->hasViews()
            ->hasTranslations()
            ->runsMigrations();
    }
}
