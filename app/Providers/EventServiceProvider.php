<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Les écouteurs d'événements de l'application.
     *
     * @var array
     */
    protected $listen = [
        // 'App\Events\EventName' => [
        //     'App\Listeners\EventListener',
        // ],
    ];

    /**
     * Enregistrer les services liés aux événements.
     */
    public function boot()
    {
        parent::boot();
    }
}
