<?php namespace ChaoticWave\CryptoWars\Models;

use ChaoticWave\BlueVelvet\Models\BaseModel;

class Source extends BaseModel
{
    //******************************************************************************
    //* Members
    //******************************************************************************

    /** @var string */
    protected $table = 'source_t';
    /** @var array */
    protected $casts = [
        'host_list_text' => 'array',
        'uct_offset_nbr' => 'integer',
    ];
}
