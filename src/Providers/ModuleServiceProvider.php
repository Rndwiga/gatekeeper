<?php

namespace  Rndwiga\Gatekeeper\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Rndwiga\Gatekeeper\Console\MigrateCommand;
use Rndwiga\Gatekeeper\Http\Middleware\AdminAuthenticationMiddleware;
use Rndwiga\Gatekeeper\Http\Middleware\ApiAuthenticationMiddleware;
use Rndwiga\Gatekeeper\Http\Middleware\ApiHeaderMiddleware;
use Rndwiga\Gatekeeper\Model\AdministratorModel;


class ModuleServiceProvider extends ServiceProvider
{
    protected static $packageName = 'gatekeeper';

    protected $providers = [];

    protected $aliases = [];

    protected $commands = [
        MigrateCommand::class
    ];

    protected $middleware = [
        'apiAuthentication' => ApiAuthenticationMiddleware::class,
        'apiHeader' => ApiHeaderMiddleware::class,
        'gateKeeperAdmin' => AdminAuthenticationMiddleware::class,
    ];

    /**
     * Bootstrap the application services.
     *
     * @param Router $router
     * @return void
     */
    public function boot(Router $router)
    {
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', self::$packageName);

        $this->bootMiddleware($router);
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

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerServiceProviders();
        $this->registerAliases();
        $this->registerCommands();
        $this->registerConfigs();
        $this->registerRoutes();
        $this->registerPublishable();
        $this->registerAuthorsAuthGuard();
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
            __DIR__."/../Config/".self::$packageName.".php", self::$packageName
        );
    }
    private function registerCommands(){
        $this->commands($this->commands);
    }

    private function registerRoutes(){

        $urlPath = config(self::$packageName.'.path');
        $middlewareGroup = config(self::$packageName.'.middleware_group');

        Route::namespace('Rndwiga\Gatekeeper\Http\Controllers')
            ->middleware([$middlewareGroup])
            ->as(self::$packageName.'.')
            ->group(function () {
                $this->loadRoutesFrom(__DIR__.'/../Routes/auth.php');
            });

        Route::namespace('Rndwiga\Gatekeeper\Http\Controllers')
            ->middleware([$middlewareGroup,'gateKeeperAdmin'])
            ->as(self::$packageName.'.')
            ->prefix($urlPath)
            ->group(function () {
                $this->loadRoutesFrom(__DIR__.'/../Routes/private.php');
            });
        Route::fallback(function(){
            return redirect('/authentication/login');
        });
    }

    private function registerPublishable(){

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../Resources/assets' => public_path('argon'),
            ], self::$packageName.'-assets');

            $this->publishes([
                __DIR__."/../Config/".self::$packageName.".php" => config_path(self::$packageName.'.php'),
            ], self::$packageName.'-config');
        }
    }

    /**
     * Register the package's authentication guard.
     *
     * @return void
     */
    private function registerAuthorsAuthGuard()
    {
        $provider = self::$packageName."_admin";
        $this->app['config']->set("auth.guards.".self::$packageName, [
            'driver' => 'session',
            'provider' => $provider,
        ]);

        $this->app['config']->set('auth.providers'.$provider, [
            'driver' => 'eloquent',
            'model' => AdministratorModel::class,
        ]);

    }
}
