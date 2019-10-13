<?php

namespace App\Services\ListingContacts;

use App\Models\User;
use App\Models\Listing;
use App\Mail\ListingContact;
use App\Notifications\ListingContactCreated;
use Illuminate\Support\Facades\Mail;

class ContactStoreService
{
    public function handle(Listing $listing, User $sender, $message)
    {
        $listing->owner->notify(
            new ListingContactCreated($listing, $sender, $message)
        );
    }
}
