<?php

namespace FlowInt\ExternalIdDuplicationHelper\Providers;

use Illuminate\Support\ServiceProvider;

class ExternalIdDuplicationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //echo __DIR__ . '/migrations';
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
