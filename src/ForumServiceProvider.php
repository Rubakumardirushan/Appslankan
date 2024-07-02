<?php

namespace Appslankan\Forum;

use Illuminate\Support\ServiceProvider;

class ForumServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/table.php', 'table');
       

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
       
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->publishes([
            __DIR__.'/../config/table.php' => config_path('table.php'),
        ], 'config');
       
    
    }
}
