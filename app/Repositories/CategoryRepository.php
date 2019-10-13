<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    protected $category;

    /**
     * CategoryRepository constructor.
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * @param $area
     * @return mixed
     */
    public function get($area)
    {
        return $this->category->withListingsInArea($area)->get();
    }

    /**
     * @param $id
     * @param null $field
     */
    public function find($id, $field = null)
    {
        $category = $this->category->find($id);

        if(! $category) return;

        return $field ? $category[$field] : $category;
    }
}
