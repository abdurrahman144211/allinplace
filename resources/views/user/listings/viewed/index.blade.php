@extends('layouts.app')

@section('title')
    {{__('site.favourite_listings')}}
@endsection

@section('content')
    <div class="my-3 my-md-5">
        <div class="container">
            <div class="page-header">
                <div class="page-subtitle">{{__('site.view_last_views', ['count' => $limit])}}</div>
            </div>
            <div class="row row-cards">
                @forelse($listings as $listing)
                    @include('listings.partials._viewed_listing', compact($listing))
                @empty
                    <div class="col-md-12 alert alert-info">{{__('site.no_listings_found')}}</div>
                @endforelse
            </div>
        </div>
    </div>

@endsection
