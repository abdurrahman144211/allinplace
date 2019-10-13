<?php

namespace App\Services\Listings;

use App\Models\Area;
use App\Models\Category;
use App\Repositories\Contracts\ListingRepositoryInterface;

class ListingIndexService
{
    protected $listings;

    /**
     * ListingIndexService constructor.
     * @param ListingRepositoryInterface $listings
     */
    public function __construct(ListingRepositoryInterface $listings)
    {
        $this->listings = $listings;
    }

    /**
     * @param Area $area
     * @param Category $category
     * @return mixed
     */
    public function handle(Area $area, Category $category)
    {
        return $this->listings->defaultPaginated($area, $category);
    }
}
