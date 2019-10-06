<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * @param Area $area
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Area $area)
    {
        $categories = Category::withListingsInArea($area)->get()->toTree();

        return view('categories.index', compact('categories'));
    }
}
