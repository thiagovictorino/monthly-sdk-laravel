<?php

namespace MonthlyCloud\Laravel;

use Illuminate\Support\ServiceProvider;
use MonthlyCloud\Sdk\Builder;

class MonthlyCloudServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Builder::class, function ($app) {
            return new Builder(
                config('monthlycloud.access_token'),
                config('monthlycloud.api_url')
            );
        });
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/monthlycloud.php' => config_path('monthlycloud.php'),
            ]);
        }
    }
}