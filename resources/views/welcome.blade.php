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
                <h1 class="page-title">{{$country->name}}</h1> <hr>
                <div class="row">
                @foreach($country->children as $index => $state)
                    <div class="col-md-4">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-{{$index}}-{{\Str::slug($state->name)}}" aria-expanded="true" aria-controls="collapse-{{$index}}-{{\Str::slug($state->name)}}">
                                            {{$state->name}}
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapse-{{$index}}-{{\Str::slug($state->name)}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        @foreach($state->children as $city)
                                            <a href="" class='d-block'>{{$city->name}}</a>
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
