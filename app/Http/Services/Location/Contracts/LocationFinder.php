<?php

namespace App\Http\Services\Location\Contracts;

interface LocationFinder
{
    public function locate($ip, $by = null);
}
