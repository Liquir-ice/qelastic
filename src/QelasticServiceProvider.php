<?php


namespace Liquirice\Qelastic;

use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class QelasticServiceProvider extends ServiceProvider
{

    public function boot()
    {

        // Shortcut so developers don't need to add an Alias in app/config/app.php
        AliasLoader::getInstance()->alias('Qelastic','Liquirice\Qelastic\Facades\Qelastic');


    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

        // 將config/config.php裡的設定跟原有的結合起來
        $this->mergeConfigFrom(
            __DIR__.'/config/config.php', 'es_config'
        );

        // 登入elasticsearch
        $this->app->singleton('Elasticsearch\Client', function($app){

            return ClientBuilder::create()->build(config('es_config'));

        });

        $this->app->instance('qelastic', new Qelastic($this->app));



    }

     /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
