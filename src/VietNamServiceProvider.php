<?php

namespace NguyenManh1997\LaravelVietNamDatabase;

use Illuminate\Support\ServiceProvider;
use NguyenManh1997\LaravelVietNamDatabase\Commands\VietNamDatabaseInstall;

class VietNamServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $package_name = "vietnam_database";
        // include routes
        //$this->loadRoutesFrom(__DIR__.'/routes/web.php');

        //migrations
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations/');
        $this->publishes([
            __DIR__ . '/database/migrations/' => database_path('migrations'),
        ], 'migrations');
        // database seeder
        $this->publishes([
            __DIR__ . '/database/seeds/' => database_path('seeds'),
        ], 'seeds');

        //commands
        if ($this->app->runningInConsole()) {
            $this->commands([
                VietNamDatabaseInstall::class,
            ]);
        }
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
