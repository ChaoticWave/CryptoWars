<?php namespace ChaoticWave\CryptoWars\Coins;

use Illuminate\Support\Collection;

class GenericCoin extends Collection
{
    //******************************************************************************
    //* Members
    //******************************************************************************

    /** @var string The coin ID */
    protected $id;
    /** @var string The public coin url */
    protected $url;
    /** @var string The coin image url */
    protected $imageUrl;
    /** @var string The coin name */
    protected $name;
    /** @var string The coin symbol */
    protected $symbol;
    /** @var string The short coin name */
    protected $coinName;
    /** @var string full coin name */
    protected $fullName;
    /** @var string The coin's algorithm */
    protected $algorithm;
    /** @var string The coin's type of proof */
    protected $proofType;
    /** @var string The coin's premined status */
    protected $fullyPremined;
    /** @var string The coin's total supply */
    protected $totalCoinSupply;
    /** @var string The coin's premined value */
    protected $preminedValue;
    /** @var string The coin's free float */
    protected $totalCoinsFreeFloat;
    /** @var string The coin's sort order */
    protected $sortOrder;
    /** @var bool The coin's sponsorship */
    protected $sponsored;

    //******************************************************************************
    //* Methods
    //******************************************************************************

    /**
     * Constructor
     *
     * @param array $items The coin data
     */
    public function __construct($items = [])
    {
        $this->load($items);

        parent::__construct($items);
    }

    protected function load(&$items = [])
    {
        $_vars = get_object_vars($this);

        foreach ($items as $_key => $_value) {
            $_ogKey = $_key;

            if (false === ($_key = $this->findKey($_key, $_vars))) {
                continue;
            }

            $this->{$_key} = $_value;
            array_forget($items, $_ogKey);
        }
    }

    /**
     * Case-sensitive and
     *
     * @param string $key
     * @param array  $array
     *
     * @return bool|string
     */
    protected function findKey($key, $array = [])
    {
        if (property_exists($this, $key)) {
            return $key;
        }

        foreach (array_keys($array) as $_arrayKey) {
            //  Skip internals
            if (in_array($_arrayKey, ['items', 'macros', 'proxies'])) {
                continue;
            }

            if (0 === strcasecmp($key, $_arrayKey)) {
                return $_arrayKey;
            }
        }

        return false;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
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
    public function getSymbol()
    {
        return $this->symbol;
    }

    /**
     * @return string
     */
    public function getCoinName()
    {
        return $this->coinName;
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @return string
     */
    public function getAlgorithm()
    {
        return $this->algorithm;
    }

    /**
     * @return string
     */
    public function getProofType()
    {
        return $this->proofType;
    }

    /**
     * @return string
     */
    public function getFullyPremined()
    {
        return $this->fullyPremined;
    }

    /**
     * @return string
     */
    public function getTotalCoinSupply()
    {
        return $this->totalCoinSupply;
    }

    /**
     * @return string
     */
    public function getPreminedValue()
    {
        return $this->preminedValue;
    }

    /**
     * @return string
     */
    public function getTotalCoinsFreeFloat()
    {
        return $this->totalCoinsFreeFloat;
    }

    /**
     * @return string
     */
    public function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * @return bool
     */
    public function isSponsored()
    {
        return $this->sponsored;
    }
}