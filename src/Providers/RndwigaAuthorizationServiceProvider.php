<?php

namespace Rndwiga\Authentication\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Rndwiga\Authentication\ModuleHelper;

class RndwigaAuthorizationServiceProvider extends ServiceProvider
{
    protected static $packageName = 'authorization';

    protected $providers = [
        RndwigaAuthorizationRouteServiceProvider::class,
        EventServiceProvider::class,
    ];

    protected $aliases = [
        //'Charts' => Charts::class,
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(ModuleHelper::getViews(), self::$packageName);

        Validator::extend('email_domain_allowed', function($attribute, $value) {
            $allowedEmailDomains =  ModuleHelper::getAllowedEmailDomains();
            return ends_with($value,
                collect($allowedEmailDomains)
                    ->map(function($domain){
                        return '@' . $domain;
                    })->all());
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerServiceProviders();
        $this->registerAliases();
        $this->registerConfigs();
    }


    private function registerServiceProviders()
    {
        foreach ($this->providers as $provider)
        {
            $this->app->register($provider);
        }
    }
    private function registerAliases()
    {
        $loader = AliasLoader::getInstance();
        foreach ($this->aliases as $key => $alias)
        {
            $loader->alias($key, $alias);
        }
    }
    private function registerConfigs()
    {
        $this->mergeConfigFrom(
            ModuleHelper::getConfig(), self::$packageName
        );
    }
}
