<?php

namespace App\Repositories\Contracts;

interface CategoryRepositoryInterface
{
    public function get($area);

    public function find($categoryId, $field = null);
}
