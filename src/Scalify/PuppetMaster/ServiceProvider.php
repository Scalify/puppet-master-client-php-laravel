<?php

namespace Scalify\PuppetMaster;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\ClientInterface as GuzzleClientInterface;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Scalify\PuppetMaster\Client\Client;
use Scalify\PuppetMaster\Client\ClientInterface;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $configPath = $this->getPackageConfigPath();
        $this->mergeConfigFrom($configPath, 'puppet-master');


        $this->app->singleton(GuzzleClientInterface::class, GuzzleClient::class);
        $this->app->singleton(ClientInterface::class, function () {
            return new Client(
                $this->app->make(GuzzleClientInterface::class),
                $this->app->get('config')->get('puppet-master.endpoint'),
                $this->app->get('config')->get('puppet-master.apiToken')
            );
        });
    }

    public function boot()
    {
        $configPath = $this->getPackageConfigPath();
        $this->publishConfig($configPath);
    }

    /**
     * Publish the config file
     *
     * @param  string $configPath
     */
    private function publishConfig($configPath)
    {
        $this->publishes([$configPath => $this->getConfigPath()], 'config');
    }

    /**
     * Get the config path
     *
     * @return string
     */
    private function getConfigPath()
    {
        return config_path('puppet-master.php');
    }

    /**
     * Get the path of the config file distributed with the package.
     *
     * @return string
     */
    private function getPackageConfigPath(): string
    {
        return __DIR__ . '/config/puppet-master.php';
    }
}
