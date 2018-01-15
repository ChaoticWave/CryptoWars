<?php namespace ChaoticWave\CryptoWars\Http\Controllers;

class PriceController extends Controller
{
    //******************************************************************************
    //* Methods
    //******************************************************************************

    /**
     * Returns a list of prices, optionally filtered by market
     *
     * @param \Illuminate\Http\Request $request The request
     * @param string|null              $market  Market filter [optional]
     */
    public function index($request, $market = null)
    {
        //
    }

    /**
     * Get one price
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
}
