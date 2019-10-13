@extends('layouts.app')

@section('content')
    <div class="container mt-md-9">
        <div class="row">
            <div class="col col-md-6">
                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>{{__('site.pay_for_listing', ['listing' => $listing->title])}}</h3>
                    </div>
                    <div class="card-body">
                        <h5>{!!__('site.total_cost', ['cost' => $listing->formattedCost()]) !!}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
