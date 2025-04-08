<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

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
        Model::preventLazyLoading();

        // This assumes the current locale is set in the URL (e.g., from the first URL segment)
        // or falls back to your config setting (usually 'en').
        $locale = request()->segment(1) ?: config('app.locale', 'en');

        URL::defaults(['locale' => $locale]);

        //Paginator::useBootstrapFive();
    }
}
