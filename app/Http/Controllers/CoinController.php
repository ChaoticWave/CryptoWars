<?php namespace ChaoticWave\CryptoWars\Http\Controllers;

use ChaoticWave\CryptoWars\Facades\CryptoData;
use Illuminate\Support\Facades\Input;

class CoinController extends Controller
{
    /**
     * @var array Default cross-currencies
     */
    protected $crossCurrencies = ['USD', 'ETH', 'LTC', 'BTC'];

    //******************************************************************************
    //* Methods
    //******************************************************************************

    /**
     * Returns a list of coins, optionally filtered by market
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $_coins = CryptoData::getAllCoins(true);

        return \Response::json($_coins);
    }

    /**
     * Get one price
     *
     * @param string $symbol The coin to show
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($symbol)
    {
        $_market = Input::get('market');
        $_against = Input::get('against', ['BTC', 'USD', 'EUR', 'LTC', 'ETH']);

        return CryptoData::latest(strtoupper($symbol), $_against, $_market);
    }
}
