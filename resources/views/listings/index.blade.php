@extends('layouts.app')

@section('title')
    {{$category->name}} in {{$area->name}}
@endsection

@section('content')
    <div class="my-3 my-md-5">
        <div class="container">
            <div class="page-header">
                <h1 class="text-muted page-title">
                    {{$category->parent->name}} > {{$category->name}}
                </h1>
                <div class="page-subtitle">{{__('site.found')}} {{count($listings)}} {{__('site.advertises')}}</div>
                <div class="page-options d-flex">
                    <select class="form-control custom-select w-auto">
                        <option value="asc">Newest</option>
                        <option value="desc">Oldest</option>
                    </select>
                    <div class="input-icon ml-2">
                  <span class="input-icon-addon">
                    <i class="fe fe-search"></i>
                  </span>
                        <input type="text" class="form-control w-10" placeholder="Search photo">
                    </div>
                </div>
            </div>
            <div class="row row-cards">
                @forelse($listings as $listing)
                    @include('listings.partials._listings', compact($listing))
                @empty
                <div class="col-md-12 alert alert-info">{{__('site.no_listings_found')}}</div>
                @endforelse
            </div>
            {{$listings->links()}}
        </div>
    </div>

@endsection
