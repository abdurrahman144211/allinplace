<?php

namespace App\Services\ListingFavourites;

class ListingFavouritesStoreService
{
    /**
     * @param $listing
     * @param null $user
     */
    public function store($listing, $user = null)
    {
        $this->favouritesListings($user)
            ->syncWithoutDetaching([$listing->id]);
    }

    /**
     * @param $listing
     * @param $user
     */
    public function destory($listing, $user)
    {
            $this->favouritesListings($user)
                ->detach([$listing->id]);
    }

    /**
     * @param $user
     * @return mixed
     */
    protected function favouritesListings($user)
    {
        $user = $user ?: auth()->user();

        return $user->favouriteListings();
    }
}
