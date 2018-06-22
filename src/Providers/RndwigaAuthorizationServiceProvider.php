<?php

namespace Rndwiga\Authentication\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Rndwiga\Authentication\Api\Http\Middleware\ApiAuthenticationMiddleware;
use Rndwiga\Authentication\Api\Http\Middleware\ApiHeaderMiddleware;
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

    protected $middleware = [
        'apiAuthentication' => ApiAuthenticationMiddleware::class,
        'apiHeader' => ApiHeaderMiddleware::class,
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Router $router)
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

        $this->bootMiddleware($router);
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

    private function bootMiddleware($router)
    {
        if (app()->version() >= 5.4) {
            foreach ($this->middleware as $key => $alias)
            {
                $router->aliasMiddleware($key, $alias);
            }
        } else {
            foreach ($this->middleware as $key => $alias)
            {
                $router->middleware($key, $alias);
            }
        }

    }
}
