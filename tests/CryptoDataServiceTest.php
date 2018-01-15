<?php namespace Tests;

use ChaoticWave\CryptoWars\Providers\CryptoDataServiceProvider;
use ChaoticWave\CryptoWars\Services\CryptoDataService;

class CryptoDataServiceTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCoinList()
    {
        $_response = app(CryptoDataServiceProvider::ALIAS)->getAllCoins();
        $this->assertNotEmpty($_response, 'getAllCoins response should not be empty');
    }
}
