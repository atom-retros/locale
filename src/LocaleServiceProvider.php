<?php

namespace Atom\Locale;

use Illuminate\Support\ServiceProvider;

class LocaleServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            path: __DIR__.'/../config/locale.php',
            key: 'locale',
        );

        $this->loadViewsFrom(
            path: __DIR__.'/../resources/views',
            namespace: 'locale',
        );

        $this->loadRoutesFrom(
            path: __DIR__.'/../routes/web.php'
        );
    }
}

