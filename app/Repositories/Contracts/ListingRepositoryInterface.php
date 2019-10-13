<?php

namespace App\Repositories\Contracts;

interface ListingRepositoryInterface
{
    /**
     * @param $area
     * @param $category
     * @return mixed
     */
    public function defaultPaginated($area, $category);
}
