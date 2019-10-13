<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Http\Requests\Listings\Contact\ContactStoreRequest;
use App\Services\ListingContacts\ContactStoreService;

class ListingContactsController extends Controller
{
    /**
     * ListingContactController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(ContactStoreRequest $request, $area, Listing $listing)
    {
        resolve(ContactStoreService::class)->handle($listing, auth()->user(), $request->message);

        return back()->with('success', __('site.message_sent_successfully', [
            'username' => $listing->owner->name
        ]));
    }
}
