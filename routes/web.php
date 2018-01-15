<?php
//******************************************************************************
//* General Routes
//******************************************************************************

Route::get('/', function () {
    return view('welcome');
});

/*------------------------------------------------------------------------------*/
/* Resource Routes
/*------------------------------------------------------------------------------*/

Route::get('markets', 'MarketController@list');
Route::get('market/{id}', 'MarketController@show');

Route::get('coins', 'CoinController@list');
Route::get('coin/{symbol}',
    'CoinController@show',
    [
        'parameters' =>
            [
                'market'  => 'market',
                'against' => 'against',
            ],
    ]);

Route::get('prices', 'PriceController@list');
Route::get('price/{symbol}', 'PriceController@show');