<?php namespace ChaoticWave\Services\CryptoWars\Providers;

use ChaoticWave\BlueVelvet\Providers\BaseServiceProvider;
use ChaoticWave\Services\CryptoWars\Services\CryptoDataSourceService;

class CryptoDataSourceServiceProvider extends BaseServiceProvider
{
    //******************************************************************************
    //* Constants
    //******************************************************************************

    /** @inheritdoc */
    const ALIAS = 'cw.crypto-data-source';

    //********************************************************************************
    //* Public Methods
    //********************************************************************************

    /** @inheritdoc */
    public function register()
    {
        $this->app->singleton(static::ALIAS,
            function($app) {
                return new CryptoDataSourceService($app);
            });
    }
}
