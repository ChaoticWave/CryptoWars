<?php namespace ChaoticWave\Services\CryptoWars\Models;

use ChaoticWave\BlueVelvet\Models\BaseModel;

class Market extends BaseModel
{
    //******************************************************************************
    //* Members
    //******************************************************************************

    /** @var string */
    protected $table = 'market_t';
    /** @var array */
    protected $casts = [
        'market_data_text' => 'array',
    ];
}
