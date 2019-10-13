<?php

namespace App\Services\ListingViewed;

class ListingViewedIndexService
{
    /**
     * @param null $user
     * @return mixed
     */
    public function handle($limit = 20, $user = null)
    {
        $user = $user ?: auth()->user();

        return $user->viewedListings()
            ->with(['area', 'owner'])
            ->orderBy('pivot_updated_at')
            ->isLive()
            ->take($limit)
            ->get();
    }
}
