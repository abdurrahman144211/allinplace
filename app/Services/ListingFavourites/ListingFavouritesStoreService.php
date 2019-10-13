<?php

namespace App\Services\ListingFavourites;

class ListingFavouritesStoreService
{
    public function handle($listing, $user = null)
    {
        $user = $user ?: auth()->user();

        $user->favouriteListings()->syncWithoutDetaching([$listing->id]);

    }
}
