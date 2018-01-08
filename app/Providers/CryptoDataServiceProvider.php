<?php namespace ChaoticWave\Services\CryptoWars\Providers;

use ChaoticWave\BlueVelvet\Providers\BaseServiceProvider;
use ChaoticWave\Services\CryptoWars\Services\CryptoDataService;

class CryptoDataServiceProvider extends BaseServiceProvider
{
    //******************************************************************************
    //* Constants
    //******************************************************************************

    /** @inheritdoc */
    const ALIAS = 'cw.crypto-data';

    //********************************************************************************
    //* Public Methods
    //********************************************************************************

    /** @inheritdoc */
    public function register()
    {
        $this->app->singleton(static::ALIAS,
            function($app) {
                return new CryptoDataService($app, config('crypto', []));
            });
    }
}
