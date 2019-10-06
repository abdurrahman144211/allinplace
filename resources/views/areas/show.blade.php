@extends('layouts.app')

@section('title')
    {{$area->name}}
@endsection

@section('content')
    <div class="my-3 my-md-5">
        <div class="container">
            <div class="page-header">
                <h1 class="page-title">
                    {{$area->name}}
                </h1>
            </div>
            <div class="row">
                @foreach($area->children as $index => $state)
                    <div class="col-md-6 col-xl-4">
                        <div class="accordion" id="accordion-{{$index}}">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-{{$index}}" aria-expanded="true" aria-controls="collapse-{{$index}}">
                                            {{$state->name}}
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapse-{{$index}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion-{{$index}}">
                                    <div class="card-body">
                                        <table class="table card-table">
                                            <tbody>
                                                @forelse($state ->children as $child)
                                                    <tr>
                                                        <td><i class="fa fa-edge text-muted"></i></td>
                                                        <td>
                                                            {{$child->name}}
                                                        </td>
                                                        <td class="text-right"><span class="text-muted">9%</span></td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td>Nothing Found Here</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
