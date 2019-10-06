<?php

namespace App\Http\Controllers;

class LandingController extends Controller
{
    public function __invoke()
    {
        return view('welcome');
    }
}
