<?php namespace ChaoticWave\CryptoWars\Services;

class CryptoDataSourceService
{
    //******************************************************************************
    //* Members
    //******************************************************************************

    /** @var \Illuminate\Foundation\Application */
    protected $app;
    /**
     * @var string The API name
     */
    protected $name;
    /**
     * @var string The API host
     */
    protected $apiHost;
    /**
     * @var string The API uri
     */
    protected $apiUri;

    //********************************************************************************
    //* Public Methods
    //********************************************************************************

    /**
     * Constructor
     *
     * @param \Illuminate\Foundation\Application $app
     * @param string|null                        $name
     */
    public function __construct($app, $name = null)
    {
        $this->app = $app;

        if (empty($name)) {
            $name = config('crypto-wars.default', 'crypto-compare');
        }

        $_config = config('crypto-wars', []);

        if (empty($_config)) {
            throw new \InvalidArgumentException('The crypto data source "' . $name . '" is not supported.');
        }

        $_host = config('crypto-wars.sources.' . $name . '.host', 'https://www.cryptocompare.com');
        $_uri = config('crypto-wars.sources.' . $name . '.uri', '/api/data');

        $this->name = $name;
        $this->apiHost = rtrim($_host, ' /');
        $this->apiUri = rtrim($_uri, ' /');
    }

    public static function make($app, $name = null)
    {
        return new static($app, $name);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getApiHost()
    {
        return $this->apiHost;
    }

    /**
     * @return string
     */
    public function getApiUri()
    {
        return $this->apiUri;
    }
}
