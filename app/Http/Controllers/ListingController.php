<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Listing;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\Listings\ListingShowService;
use App\Services\Listings\ListingIndexService;

class ListingController extends Controller
{
    protected $indexService, $showService;

    /**
     * ListingController constructor.
     * @param ListingIndexService $indexService
     */
    public function __construct(ListingIndexService $indexService, ListingShowService $showService)
    {
        $this->indexService = $indexService;
        $this->showService = $showService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Area $area, Category $category)
    {
        return view('listings.index', [
            'category' => $category,
            'listings' => $this->indexService->handle($area, $category)
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * @param Area $area
     * @param Listing $listing
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Area $area, Listing $listing)
    {

       $this->showService->handle($listing);

        return view('listings.show', compact('listing'));
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
