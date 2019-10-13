<?php

namespace App\Http\Controllers;

use App\Services\ListingViewed\ListingViewedIndexService;
use Illuminate\Http\Request;

class ListingViewedController extends Controller
{
    const INDEX_LIMIT = 20;

    /**
     * ListingViewedController constructor.
     */
    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('user.listings.viewed.index', [
            'listings' => resolve(ListingViewedIndexService::class)->handle(
                self::INDEX_LIMIT, $request->user()
            ),
            'limit' => self::INDEX_LIMIT
        ]);
    }
}
