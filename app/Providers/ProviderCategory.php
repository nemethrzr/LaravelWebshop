<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ProviderCategory extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Category::creating(function($model){
            $model->name = $model->name + 'módosítva';
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
