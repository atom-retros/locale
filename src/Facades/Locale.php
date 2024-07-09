<?php

namespace Atom\Locale\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Atom\Locale\Locale
 */
class Locale extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return \Atom\Locale\Locale::class;
    }
}
