<?php

namespace App\Http\Controllers;

use App\Models\Area;

class AreaController extends Controller
{
    /**
     * @param Area $area
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Area $area)
    {
        session()->put('area', $area->slug);

        return redirect()->route('categories.index', $area->slug);
    }
}
