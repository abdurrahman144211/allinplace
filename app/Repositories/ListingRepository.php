<?php

namespace App\Repositories;

use App\Models\Listing;
use App\Repositories\Contracts\ListingRepositoryInterface;

class ListingRepository implements ListingRepositoryInterface
{
    protected $listing;

    /**
     * ListingRepository constructor.
     * @param Listing $listing
     */
    public function __construct(Listing $listing)
    {
        $this->listing = $listing;
    }

    /**
     * @param $area
     * @param $category
     * @param int $limit
     * @return mixed
     */
    public function defaultPaginated($area, $category, $limit = 15)
    {
        return $this->listing->with(['owner', 'area', 'likers', 'viewedUsers'])
            ->latest()
            ->islive()
            ->fromCategory($category)
            ->inArea($area)
            ->paginate($limit);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function store($data)
    {
        return $this->listing->create($data);
    }

    /**
     * @param $listing
     * @param $data
     */
    public function update($listing, $data)
    {
        $listing->update($data);
    }
}
