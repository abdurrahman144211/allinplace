<?php

namespace App\Http\Controllers;

use App\Models\Area;

class AreaController extends Controller
{
    public function store(Area $area)
    {
        session()->put('area', $area->slug);

        return redirect()->back();
    }
}
