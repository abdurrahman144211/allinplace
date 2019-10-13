<?php

namespace App\Http\Controllers;

use App\Models\Listing;

class ListingPaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param Listing $listing
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show($area, Listing $listing)
    {
        $this->authorize('update', $listing);

        if($listing->live() || $listing->free()) return abort(404);

        return view('listings.payment.show', compact('listing'));
    }

    public function store()
    {

    }
}
