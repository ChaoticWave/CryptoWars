<?php namespace ChaoticWave\CryptoWars\Models;

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
        'uct_offset_nbr' => 'integer',
    ];

    //******************************************************************************
    //* Methods
    //******************************************************************************

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany|\ChaoticWave\CryptoWars\Models\Coin[]
     */
    public function coins()
    {
        return $this->hasMany(Coin::class);
    }
}