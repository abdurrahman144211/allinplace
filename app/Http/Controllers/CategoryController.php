<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Services\Categories\CategoryIndexService;

class CategoryController extends Controller
{
    protected $service;

    /**
     * CategoryController constructor.
     * @param CategoryIndexService $service
     */
    public function __construct(CategoryIndexService $service)
    {
        $this->service = $service;
    }

    /**
     * @param Area $area
     * @return \Illuminate\View\View
     */
    public function index(Area $area)
    {
        return view('categories.index', [
            'categories' => $this->service->handle($area)
        ]);
    }
}
