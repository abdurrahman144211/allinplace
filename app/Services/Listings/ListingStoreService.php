<?php

namespace App\Services\Listings;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\ListingRepositoryInterface;

class ListingStoreService
{
    protected $categories, $listings;

    /**
     * ListingIndexService constructor.
     * @param CategoryRepositoryInterface $categories
     */
    public function __construct(CategoryRepositoryInterface $categories, ListingRepositoryInterface $listings)
    {
        $this->categories = $categories;
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
            array_merge($request, [
                'user_id' => $user->id,
                'live' => $this->postFree($request['category_id']),
            ])
        );
    }

    protected function postFree($categoryId)
    {
        return (int) $this->categories->find($categoryId, 'price') > 0 ? false : true;
    }
}
