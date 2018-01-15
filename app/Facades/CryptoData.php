<?php namespace ChaoticWave\CryptoWars\Facades;

use ChaoticWave\BlueVelvet\Facades\BaseFacade;
use ChaoticWave\CryptoWars\Providers\CryptoDataServiceProvider;

/**
 * @see \ChaoticWave\CryptoWars\Services\CryptoDataService
 *
 * @method static array getAllCoins($raw = true)
 * @method static array getCoin($symbol)
 * @method static array latest($symbol, $against = null, $market = null)
 * @method static array historical($symbol, $against = null, $timestamp = null, $markets = null)
 * @method static array getSource()
 */
class CryptoData extends BaseFacade
{
    //******************************************************************************
    //* Methods
    //******************************************************************************

    /** @noinspection PhpMissingParentCallCommonInspection
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return CryptoDataServiceProvider::ALIAS;
    }
}
