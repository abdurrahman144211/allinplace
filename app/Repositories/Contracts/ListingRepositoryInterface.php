<?php

namespace App\Repositories\Contracts;

interface ListingRepositoryInterface
{
    public function defaultPaginated($area, $category);

    public function store($request);

    public function update($listing, $request);
}
