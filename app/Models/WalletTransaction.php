<?php namespace ChaoticWave\CryptoWars\Models;

use ChaoticWave\BlueVelvet\Models\BaseModel;

class WalletTransaction extends BaseModel
{
    //******************************************************************************
    //* Members
    //******************************************************************************

    /** @var string */
    protected $table = 'wallet_txn_t';
    /** @var array */
    protected $casts = [
        'wallet_id'         => 'integer',
        'market_id'         => 'integer',
        'coin_id'           => 'integer',
        'paid_with_coin_id' => 'integer',
        'txn_date'          => 'datetime',
        'qty_nbr'           => 'double',
        'fees_nbr'          => 'double',
        'cost_nbr'          => 'double',
    ];
}
