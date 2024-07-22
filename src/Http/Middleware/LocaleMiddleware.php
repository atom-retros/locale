<?php

namespace Atom\Locale\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->routeIs('locale')) {
            return $next($request);
        }

        if (Session::has('locale')) {
            App::setLocale(Session::get('locale'));

            return $next($request);
        }

        $countryCode = match (true) {
            isset($_SERVER['HTTP_CF_IPCOUNTRY']) => strtolower($_SERVER['HTTP_CF_IPCOUNTRY']),
            isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) => strtolower(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2)),
            default => config('app.locale'),
        };

        $supportedLocale = Arr::first(
            config('locale.supported_locales'),
            fn (array $value) => $value['country_code'] === strtolower($countryCode),
        );

        if (! $supportedLocale) {
            $countryCode = config('app.fallback_locale');
        }

        Session::put('locale', $countryCode);

        App::setLocale($countryCode);

        return $next($request);
    }
}
