@extends('layouts.app')

@section('title')
    {{__('site.welcomeTitle')}}
@endsection

@section('content')
    <div class="my-3 my-md-5">
        <div class="container">
            <div class="row">
                @foreach($categories as $category)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <a href="">{{$category->name}}</a>
                            </div>
                            <div class="card-body">
                                @foreach($category->children as $subCategory)
                                    <a href="" class="d-block">{{$subCategory->name}} (x)</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
