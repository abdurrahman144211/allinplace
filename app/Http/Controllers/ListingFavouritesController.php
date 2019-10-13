<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Listing;
use App\Services\ListingFavourites\ListingFavouritesStoreService;
use Illuminate\Http\Request;

class ListingFavouritesController extends Controller
{
    protected $service;
    /**
     * ListingFavouritesController constructor.
     */
    public function __construct(ListingFavouritesStoreService $service)
    {
        $this->middleware('auth');

        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('user.listings.favourites.index', [
            'listings' => $request->user()->favouriteListings()->with(['owner', 'area'])->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Area $area, Listing $listing)
    {
        $this->service->store($listing, $request->user());

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * @param Area $area
     * @param Listing $listing
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Area $area, Listing $listing)
    {
        $this->service->destory($listing, auth()->user());

        return back();
    }
}
