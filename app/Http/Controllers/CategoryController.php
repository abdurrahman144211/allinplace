<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Area $area)
    {
        $categories = Category::get()->toTree();

        return view('categories.index', compact('categories'));
    }
}
