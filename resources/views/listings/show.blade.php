@extends('layouts.app')

@section('title')
   {{$listing->title}}
@endsection

@section('content')
    <div class="container mt-md-7">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-muted page-title">{{$listing->category->parent->name}} &nbsp;- {{$listing->category->name}}</h3>
            </div>
            <hr>
            @auth
            <div class="col-md-3">
                <form method="POST" class="form-group" action="{{route('listings.favourites.store', [$area, $listing])}}">
                    @csrf
                    <button type="submit" class="btn btn-default">{{__('site.add_to_favourites')}}</button>
                </form>
            </div>
        @endauth
        <div class="col-md-{{auth()->check() ? '9' : '12'}}">
            <div class="card">
                @include('listings.partials._favourite_buttons')
                <div class="card-header">
                    <h3 class="page-title">
                        {{$listing->title}}
                    </h3>

                </div>
                <div class="card-body">
                    {{nl2br(e($listing->body))}}
                </div>
                <div class="card-footer">
                    <span class="badge badge-success">
                        <i class="fa fa-area-chart"></i>
                        <a href="{{route('user.area.store', $listing->area->slug)}}" class="text-white">{{$listing->area->name}}</a>
                    </span>
                    <span class="badge badge-default">
                        <i class="fa fa-eye"></i> (11)
                    </span>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5><i class="fe fe-message-square"></i> {{__('site.contact')}} {{$listing->owner->name}}</h5>
                    @auth
                    <form method="post">
                        @csrf
                        <div class="form-group">
                            <label>{{__('site.messages')}}</label>
                            <textarea class="form-control" name="message" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary">{{__('site.send')}}</button>
                        </div>
                        <span class="text-muted">
                                {{__('site.send_message_notice', ['name' => $listing->owner->name])}}
                        </span>
                    </form>
                    @else
                        <a href="{{route('login')}}" class="btn btn-primary"><i class="fe fe-log-in"></i> {{__('site.sign_in_to_contact')}}</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
