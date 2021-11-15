<?php

namespace Msamgan\Raquel;


use Illuminate\Support\ServiceProvider;
use Msamgan\Raquel\Commands\MakeRawQuery;

class RaquelServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeRawQuery::class
            ]);
        }
    }
}
