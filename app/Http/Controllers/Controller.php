<?php namespace ChaoticWave\CryptoWars\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param string|array $value
     * @param string       $delimiter
     *
     * @return mixed
     */
    protected function urlize($value, $delimiter = ',')
    {
        if (is_array($value)) {
            return $value;
        }

        if (is_string($value)) {
            return explode($delimiter, $value);
        }

        return [];
    }
}
