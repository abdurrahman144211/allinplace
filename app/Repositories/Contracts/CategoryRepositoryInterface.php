<?php

namespace App\Repositories\Contracts;

interface CategoryRepositoryInterface
{
    /**
     * @param $area
     * @return mixed
     */
    public function get($area);
}
