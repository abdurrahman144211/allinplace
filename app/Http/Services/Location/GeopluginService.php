<?php

namespace App\Http\Services\Location;

use App\Http\Services\Location\Contracts\LocationFinder;

class GeopluginService implements LocationFinder
{
    public function locate($ip, $by = null)
    {
        $ip = $ip !== '127.0.0.1' ?: null;

        $countryData = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip={$ip}"));

        if(! $countryName = $countryData->geoplugin_countryName) return false;

        return $by ? $countryData[$by] : $countryName;
    }
}
