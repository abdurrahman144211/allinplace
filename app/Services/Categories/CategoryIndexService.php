<?php

namespace App\Services\Categories;

use App\Models\Area;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryIndexService
{
    protected $categories;

    /**
     * CategoryIndexService constructor.
     * @param CategoryRepositoryInterface $categories
     */
    public function __construct(CategoryRepositoryInterface $categories)
    {
        $this->categories = $categories;
    }

    /**
     * @param Area $area
     * @return mixed
     */
    public function handle(Area $area)
    {
        return $this->categories->get($area)->toTree();
    }
}
