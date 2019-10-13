<?php

namespace App\Services\Listings;

use App\Jobs\UserViewedListing;
use App\Models\Listing;
use App\Repositories\Contracts\ListingRepositoryInterface;

class ListingStoreService
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
     * @param $request
     * @param null $user
     * @return mixed
     */
    public function store($request, $user = null)
    {
        $user = $user ?: auth()->user();

        return $this->listings->store(
            array_merge($request, ['user_id' => $user->id])
        );
    }
}
