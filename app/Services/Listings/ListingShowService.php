<?php

namespace App\Services\Listings;

use App\Jobs\UserViewedListing;
use App\Models\Listing;
use App\Repositories\Contracts\ListingRepositoryInterface;

class ListingShowService
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
     * @param Listing $listing
     * @return mixed
     */
    public function handle(Listing $listing, $user = null)
    {
        if(! $this->canAccess($listing)) abort(403);

        if(auth()->check()) {
            $user = $user ?: auth()->user();
            UserViewedListing::dispatch($user, $listing);
        }
    }

    protected function canAccess($listing)
    {
        return $listing->live;
    }
}
