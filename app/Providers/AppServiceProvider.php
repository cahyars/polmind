<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Enforce HTTPS if APP_ENV is production or APP_URL starts with https://
        if ($this->app->environment('production') || str_starts_with(config('app.url', ''), 'https://')) {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }

        // Configure default pagination views
        Paginator::defaultView('vendor.pagination.custom');
        Paginator::defaultSimpleView('vendor.pagination.custom');
    }
}
