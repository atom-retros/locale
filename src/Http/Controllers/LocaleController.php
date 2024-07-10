<?php

namespace Atom\Locale\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;

class LocaleController extends Controller
{
    /**
     * Handle an incoming request.
     */
    public function __invoke(string $locale): RedirectResponse
    {
        $supportedLocale = Arr::first(
            config('locale.supported_locales'),
            fn (array $value) => $value['country_code'] === strtolower($locale),
        );

        if (! $supportedLocale) {
            return redirect()->back()->withErrors(['message' => __('The language selected is not supported')]);
        }

        Session::put('locale', $supportedLocale['country_code']);

        App::setLocale($supportedLocale['country_code']);

        return redirect()->back();
    }
}
