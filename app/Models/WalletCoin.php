<?php namespace ChaoticWave\CryptoWars\Models;

use ChaoticWave\BlueVelvet\Models\BaseModel;

class WalletCoin extends BaseModel
{
    //******************************************************************************
    //* Members
    //******************************************************************************

    /** @var string */
    protected $table = 'wallet_coin_t';
    /** @var array */
    protected $casts = [
        'wallet_id'   => 'integer',
        'coin_id'     => 'integer',
        'balance_nbr' => 'double',
    ];
}
