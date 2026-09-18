<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
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
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        try {
            if (\Illuminate\Support\Facades\Schema::hasTable('plans')) {
                \Illuminate\Support\Facades\View::share('plans', \App\Models\Plan::where('is_active', 1)->get());
            }
        } catch (\Exception $e) {
            // Ignore error if database is not ready
        }
    }
}
