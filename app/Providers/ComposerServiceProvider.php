<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // view()->composer('admin.master.sidebar', 'App\Http\ViewComposers\AdminMenuComposer');
        view()->composer('*', 'App\Http\ViewComposers\AdminMenuComposer');
    }
}
