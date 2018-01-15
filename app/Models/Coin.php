<?php namespace ChaoticWave\CryptoWars\Models;

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

    //******************************************************************************
    //* Methods
    //******************************************************************************

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne|\ChaoticWave\CryptoWars\Models\Market
     */
    public function market()
    {
        return $this->hasOne(Market::class);
    }
}
