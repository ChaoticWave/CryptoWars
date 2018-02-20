<?php namespace ChaoticWave\CryptoWars\Models;

use ChaoticWave\BlueVelvet\Models\BaseModel;

class Wallet extends BaseModel
{
    //******************************************************************************
    //* Members
    //******************************************************************************

    /** @var string */
    protected $table = 'wallet_t';
    /** @var array */
    protected $casts = [
        'properties_text' => 'array',
    ];
}
