<?php namespace ChaoticWave\Services\CryptoWars\Services;

use ChaoticWave\BlueVelvet\Utility\Curl;
use ChaoticWave\Services\CryptoWars\Coins\GenericCoin;
use ChaoticWave\Services\CryptoWars\Providers\CryptoDataSourceServiceProvider;
use Illuminate\Support\Facades\Log;

class CryptoDataService
{
    //******************************************************************************
    //* Members
    //******************************************************************************

    /**
     * @var array The service configuration
     */
    protected $config;
    /**
     * @var \ChaoticWave\Services\CryptoWars\Services\CryptoDataSourceService
     */
    protected $source;

    //********************************************************************************
    //* Public Methods
    //********************************************************************************

    /**
     * Constructor
     *
     * @param \Illuminate\Foundation\Application $app
     * @param array|null                         $config
     */
    public function __construct($app, $config = [])
    {
        $this->config = $config ?: [];

        if (!empty($config['source'])) {
            $_source = array_pull($config, 'source');

            if ($_source instanceof GenericCoin) {
                $this->source = $_source;
            }
        }

        if (empty($this->source)) {
            $this->source = app()->make(CryptoDataSourceServiceProvider::ALIAS);
        }
    }

    /**
     * @param bool $raw
     *
     * @return array|bool
     */
    public function getAllCoins($raw = true)
    {
        $_coins = Curl::get('https://www.cryptocompare.com/api/data/coinlist', [], [CURLOPT_HTTPHEADER => ['content-type: json']]);

        if (empty($_coins['Data'])) {
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

    public function getPrice($coin, $currencies = ['USD,ETH,LTC,BTC'])
    {
        return $this->getResource('price?fsym=' . $coin . '&tsyms=' . implode(',', $currencies));
    }

    /**
     * @param string $resource
     * @param array  $payload
     *
     * @return array|\stdClass
     */
    protected function getResource($resource, $payload = [])
    {
        $_url = $this->source->getApiHost() . $this->source->getApiUri() . '/' . $resource;

        $_result = Curl::get($_url, $payload, [CURLOPT_HTTPHEADER => ['content-type: json']]);

        Log::debug('GET results', $_result);

        return $_result;
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source->getName();
    }
}
