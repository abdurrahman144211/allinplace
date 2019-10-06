<?php

namespace App\Http\Controllers;

use App\Models\Area;

class LandingController extends Controller
{
    public function __invoke()
    {
        return view('welcome', [
            'areas' => Area::get()->toTree()
        ]);
    }
}
