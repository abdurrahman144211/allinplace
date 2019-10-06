@extends('layouts.app')

@section('title')
   {{$listing->title}}
@endsection

@section('content')
<div class="container mt-md-7">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item btn btn-outline-secondary">Email To Friend</li>
                        <li class="list-group-item btn btn-outline-secondary">Add to Favourites</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{$listing->title}} in &nbsp; <a href="{{route('areas.store', $listing->area->slug)}}" class="text-muted">{{$listing->area->name}}</a>
                </div>
                <div class="card-body">
                    {{nl2br(e($listing->body))}}
                </div>
                <div class="card-footer">
                    <i class="fa fa-eye"></i>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <i class="fe fe-message-square"></i> {{__('site.contact')}} {{$listing->owner->name}}
                </div>
                <div class="card-body">
                    @auth
                    <form method="post">
                        @csrf
                        <div class="form-group">
                            <label>{{__('site.messages')}}</label>
                            <textarea class="form-control" name="message" rows="7"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary">{{__('site.send')}}</button>
                        </div>
                        <span class="text-muted">
                                {{__('site.send_message_notice', ['name' => $listing->owner->name])}}
                        </span>
                    </form>
                    @else
                        <a href="{{route('login')}}" class="btn btn-danger"><i class="fe fe-log-in"></i> {{__('site.sign_in_to_contact')}}</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
