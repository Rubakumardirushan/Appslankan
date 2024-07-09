<?php

namespace Appslankan\Forum;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
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
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'forum-flex');
        
        $this->publishes([
            __DIR__.'/../config/table.php' => config_path('table.php'),
        ], 'config');
        Livewire::component('forumpage', \Appslankan\Forum\Livewire\Forumpage::class);
    
    }
}
