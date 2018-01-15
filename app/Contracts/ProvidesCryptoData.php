<?php namespace ChaoticWave\CryptoWars\Contracts;

/**
 * Something that provides data
 */
interface ProvidesCryptoData
{
    //******************************************************************************
    //* Methods
    //******************************************************************************

    /**
     * Get a list of coins tracked by source
     *
     * @param bool $raw If true, data is returned in array format, direct from API.
     *                  Otherwise it is returned in an array of ChaoticWave\CryptoWars\Coins\GenericCoin
     *
     * @return array|\ChaoticWave\CryptoWars\Coins\GenericCoin[]
     */
    public function getAllCoins($raw = true);

    /**
     * Get information about a coin tracked by source
     *
     * @param string $symbol The coin's symbol
     *
     * @return array
     */
    public function getCoin($symbol);

    /**
     * Retrieve the latest prices of a coin tracked by source
     *
     * @param string      $symbol  The symbol of the coin in question
     * @param array|null  $against Array of currencies in which to return the price
     * @param string|null $market  The name of the market from which to retrieve price
     *
     * @return array
     */
    public function latest($symbol, $against = null, $market = null);

    /**
     * Retrieve the latest prices of a coin tracked by source
     *
     * @param string            $symbol    The symbol of the coin in question
     * @param array|string|null $against   Array, or comma-delimited list, of currencies in which to return the price
     * @param string|int|null   $timestamp A timestamp from which to retrieve the price
     * @param string|array|null $markets   Array, or comma-delimited list, of markets from which to retrieve price
     *
     * @return array
     */
    public function historical($symbol, $against = null, $timestamp = null, $markets = null);
}
