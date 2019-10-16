<?php

namespace App\Services\Listings;

use App\Repositories\Contracts\ListingRepositoryInterface;

class ListingUpdateService
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
     * @param $listing
     * @param $request
     * @param null $user
     * @return mixed
     */
    public function update($listing, $request, $user = null)
    {
        $user = $user ?: auth()->user();

        if($listing->live()) {
            unset($request['category_id']);
        } else {
            $this->listings->update($listing, [
                'category_id' => $request['category_id']
            ]);
        }

        $this->listings->update(
            $listing, array_merge($request, [
                'user_id' => $user->id,
                'live' => $listing->free() ? true : false,
            ])
        );

        return $listing;
    }
}
