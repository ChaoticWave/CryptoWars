<?php namespace ChaoticWave\Services\CryptoWars\Models;

use ChaoticWave\BlueVelvet\Models\BaseModel;

class Coin extends BaseModel
{
    //******************************************************************************
    //* Members
    //******************************************************************************

    /** @var string */
    protected $table = 'coin_t';
    /** @var array */
    protected $casts = [
        'coin_data_text' => 'array',
    ];
}
