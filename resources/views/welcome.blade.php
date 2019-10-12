@extends('layouts.app')

@section('title')
{{__('site.welcomeTitle')}}
@endsection

@section('content')
    <div class="my-3 my-md-5">
        <div class="container">
            <div class="page-header">
                <h1>
                   {{__('site.welcomeTitle')}}
                </h1>
            </div>
            @foreach($areas as $country)
                <h1 class="page-title">
                    <a href="{{route('user.area.store', $country->slug)}}">{{$country->name}}</a>
                </h1> <hr>
                <div class="row">
                @foreach($country->children as $index => $state)
                    <div class="col-md-4">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapse-{{$state->id}}" aria-expanded="true" aria-controls="collapse-{{$state->id}}">
                                    <i class="fa fa-plus"></i>
                                    <h2 class="mb-0">
                                        <button class="btn btn-link" type="button">
                                            <a href="{{route('user.area.store', $state->slug)}}">{{$state->name}}</a>
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapse-{{$state->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        @foreach($state->children as $city)
                                            <a href="{{route('user.area.store', $city->slug)}}" class='d-block'>{{$city->name}}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            @endforeach
        </div>
    </div>
@endsection
