<?php namespace ChaoticWave\Services\CryptoWars\Services;

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

        if (null === $name) {
            $name = config('crypto.default', 'crypto-compare');
        }

        $_config = config('crypto', []);

        if (empty($_config)) {
            throw new \InvalidArgumentException('The crypto data source "' . $name . '" is not supported.');
        }

        $this->name = $name;
        $this->apiHost = rtrim(config('crypto.sources.' . $name . '.host', 'https://www.cryptocompare.com'), ' /');
        $this->apiUri = rtrim(config('crypto.sources.' . $name . '.uri', '/api/data'), ' /');
    }

    public function make($name = null)
    {
        return new static($name);
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
