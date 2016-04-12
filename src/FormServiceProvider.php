<?php

namespace Webup\LaravelForm;

use Illuminate\Support\ServiceProvider;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     */
    public function boot()
    {
        $this->setupConfig();
        view()->share('config', $this->app['config']->get('form'));
        $this->loadViewsFrom(__DIR__.'/views/', 'form');
    }

    protected function setupConfig()
    {
        $source = realpath(__DIR__.'/../config/form.php');
        $this->publishes([$source => config_path('form.php')]);
        $this->mergeConfigFrom($source, 'form');
    }

    /**
     * Register any package services.
     */
    public function register()
    {
        $this->app['form'] = $this->app->share(function ($app) {
            return new FormFactory(
                $this->app['config']->get('form'),
                $this->app['request']->session()->get('_old_input'),
                $this->app['request']->session()->get('errors')
            );
        });
    }
}
