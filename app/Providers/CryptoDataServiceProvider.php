<?php namespace ChaoticWave\CryptoWars\Providers;

use ChaoticWave\BlueVelvet\Providers\BaseServiceProvider;
use ChaoticWave\CryptoWars\Services\CryptoDataService;

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
            function($app, $source = null) {
                return new CryptoDataService($app, $source);
            });
    }
}
