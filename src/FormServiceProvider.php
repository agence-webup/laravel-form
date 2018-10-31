<?php

namespace Webup\LaravelForm;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Webup\LaravelForm\Elements\TimeTrap;
use Webup\LaravelForm\Elements\HoneyPot;

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


        Validator::extend('honeypot', "form_honeypot@checkHoneypot", trans("form::antispam.honeypot"));
        Validator::extend('timetrap', "form_timetrap@checkTimeTrap", trans("form::antispam.timetrap"));
    }

    protected function setupConfig()
    {
        $source = realpath(__DIR__.'/../config/form.php');
        $this->publishes([$source => config_path('form.php')]);
        $this->mergeConfigFrom($source, 'form');


        $translationSource = realpath(__DIR__.'/lang/');
        $this->loadTranslationsFrom($translationSource, 'form');
        
        if (function_exists("resource_path")) {
            $this->publishes([$translationSource => resource_path('lang/vendor/form')]);
        } else {
            $this->publishes([$translationSource => app_path('resources/lang/vendor/form')]);
        }
    }

    /**
     * Register any package services.
     */
    public function register()
    {
        $this->app->singleton('form', function ($app) {
            return new FormFactory(
                $this->app['config']->get('form'),
                $this->app['request']->session()->get('_old_input'),
                $this->app['request']->session()->get('errors')
            );
        });

        $this->app->singleton('form_honeypot', function ($app) {
            return new HoneyPot(null);
        });

        $this->app->singleton('form_timetrap', function ($app) {
            return new TimeTrap(null);
        });
    }
}
