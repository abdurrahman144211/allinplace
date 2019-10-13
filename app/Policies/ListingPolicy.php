<?php

namespace App\Policies;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ListingPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any listings.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the listing.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Listing  $listing
     * @return mixed
     */
    public function view(User $user, Listing $listing)
    {
        //
    }

    /**
     * Determine whether the user can create listings.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the listing.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Listing  $listing
     * @return mixed
     */
    public function update(User $user, Listing $listing)
    {
        return $listing->owner->is($user);
    }

    /**
     * Determine whether the user can delete the listing.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Listing  $listing
     * @return mixed
     */
    public function delete(User $user, Listing $listing)
    {
        //
    }

    /**
     * Determine whether the user can restore the listing.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Listing  $listing
     * @return mixed
     */
    public function restore(User $user, Listing $listing)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the listing.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Listing  $listing
     * @return mixed
     */
    public function forceDelete(User $user, Listing $listing)
    {
        //
    }
}
