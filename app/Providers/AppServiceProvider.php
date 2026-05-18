<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\AAEvent;
use App\Observers\EventObserver;
use App\Policies\EventPolicy;
use Illuminate\Support\Facades\Gate;

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
           AAEvent::observe(EventObserver::class);

           //Registering policy
            Gate::policy(AAEvent::class, EventPolicy::class);
    }
}
