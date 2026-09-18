<?php

namespace Modules\LandingPage\Providers;

use Illuminate\Support\ServiceProvider;

class LandingPageServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Enregistrer les vues du module
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'landingpage');
    }

    public function register(): void
    {
        //
    }
}
