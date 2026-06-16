<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;


class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Jika di lingkungan production Railway, skip migrations
        if (App::environment('production')) {
            $this->loadMigrationsFrom([]);
        }
    }
}
