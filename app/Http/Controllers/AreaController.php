<?php

namespace App\Http\Controllers;

use App\Models\Area;

class AreaController extends Controller
{
    public function show(Area $area)
    {
        return view('areas.show', compact('area'));
    }
}
