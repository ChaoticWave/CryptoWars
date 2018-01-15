<?php namespace ChaoticWave\CryptoWars\Services;

use ChaoticWave\BlueVelvet\Utility\Curl;
use ChaoticWave\BlueVelvet\Utility\Uri;
use ChaoticWave\CryptoWars\Coins\GenericCoin;
use ChaoticWave\CryptoWars\Contracts\ProvidesCryptoData;
use ChaoticWave\CryptoWars\Providers\CryptoDataSourceServiceProvider;
use Illuminate\Support\Facades\Log;

class CryptoDataService implements ProvidesCryptoData
{
    //******************************************************************************
    //* Members
    //******************************************************************************

    /**
     * @var \Illuminate\Foundation\Application
     */
    protected $app;
    /**
     * @var array The default cross-currencies for return data
     */
    protected $crossCurrencies = ['USD', 'EUR', 'ETH', 'LTC', 'BTC'];
    /**
     * @var \ChaoticWave\CryptoWars\Services\CryptoDataSourceService
     */
    protected $source;

    //********************************************************************************
    //* Public Methods
    //********************************************************************************

    /**
     * Constructor
     *
     * @param \Illuminate\Foundation\Application $app
     */
    public function __construct($app)
    {
        $this->app = $app;
        $this->source = app(CryptoDataSourceServiceProvider::ALIAS);
    }

    /** @inheritdoc */
    public function getAllCoins($raw = true)
    {
        $_coins = Curl::get('https://www.cryptocompare.com/api/data/coinlist', [], [CURLOPT_HTTPHEADER => ['content-type: json']]);

        if (empty($_coins['Data']) || empty($_coins['Response']) || 'Success' != $_coins['Response']) {
            return false;
        }

        if ($raw) {
            return $_coins['Data'];
        }

        $_result = null;

        foreach ($_coins['Data'] as $_coin => $_info) {
            $_result[] = new GenericCoin($_info);
        }

        unset($_coins);

        return $_result;
    }

    public function getPrice($coin, $currencies = null)
    {
    }

    /**
     * @param string $resource
     * @param array  $payload
     *
     * @return array|\stdClass
     */
    protected function getResource($resource, $payload = [])
    {
        static $_url;
        empty($_url) and $_url = $this->source->getApiHost() . $this->source->getApiUri() . '/';

        $_result = Curl::get($_url . $resource, $payload, [CURLOPT_HTTPHEADER => ['content-type: json']]);

        Log::debug('GET results', ['url' => $_url . $resource, 'result' => $_result]);

        return $_result;
    }

    /** @inheritdoc */
    public function getCoin($symbol)
    {
        return [];
    }

    /** @inheritdoc */
    public function latest($symbol, $against = ['USD', 'ETH', 'LTC', 'BTC'], $market = null)
    {
        return $this->getResource('price?fsym=' . $symbol . '&tsyms=' . Uri::urlize($against, true));
    }

    /** @inheritdoc */
    public function historical($symbol, $against = null, $timestamp = null, $markets = null)
    {
        return [];
    }

    /**
     * @return array|\ChaoticWave\CryptoWars\Services\CryptoDataSourceService
     */
    public function getSource()
    {
        return $this->source;
    }
}
