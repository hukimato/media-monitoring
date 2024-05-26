<?php

namespace Infrastructure\Provider;

use Domain\Storage\PostStorageInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Storage\PostStorage;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PostStorageInterface::class, function (Application $app) {
            return new PostStorage();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
