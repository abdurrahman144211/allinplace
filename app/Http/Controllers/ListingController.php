<?php

namespace App\Http\Controllers;

use App\Http\Requests\Listings\ListingStoreRequest;
use App\Http\Requests\Listings\ListingUpdateRequest;
use App\Models\Area;
use App\Models\Listing;
use App\Models\Category;
use App\Services\Listings\ListingStoreService;
use App\Services\Listings\ListingUpdateService;
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

        $this->middleware('auth', ['except' => ['show', 'index']]);
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
        return view('listings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Area $area, ListingStoreRequest $request)
    {

        $listing = resolve(ListingStoreService::class)->store($request->validated());

        return redirect()->route('listings.edit', [$area, $listing]);
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


    public function edit($area, Listing $listing)
    {
        $this->authorize('update', $listing);

        return view('listings.edit', compact('listing'));
    }

    public function update($area, Listing $listing, ListingUpdateRequest $request)
    {
        $this->authorize('update', $listing);

        resolve(ListingUpdateService::class)->update($listing, $request->validated());

        // check for payments
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
