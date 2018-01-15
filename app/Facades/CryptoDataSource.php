<?php namespace ChaoticWave\CryptoWars\Facades;

use ChaoticWave\BlueVelvet\Facades\BaseFacade;
use ChaoticWave\CryptoWars\Providers\CryptoDataSourceServiceProvider;

/**
 * @see \ChaoticWave\CryptoWars\Services\CryptoDataSourceService
 *
 * @method static array make($source = null)
 * @method static array getCallMapping()
 */
class CryptoDataSource extends BaseFacade
{
    //******************************************************************************
    //* Methods
    //******************************************************************************

    /** @noinspection PhpMissingParentCallCommonInspection
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return CryptoDataSourceServiceProvider::ALIAS;
    }
}
