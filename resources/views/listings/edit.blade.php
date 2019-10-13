@extends('layouts.app')

@section('title')
    {{__('site.create_listing')}}
@endsection

@section('content')
    <div class="container mt-md-7">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <span class="corner badge badge-{{$listing->live() ? 'success' : 'warning'}}">
                        @if($listing->live())
                        <i class="fe fe-check"></i>
                        <a class="text-white" href="{{route('listings.show', [$area, $listing])}}">{{__('site.preview')}}</a>
                        @else
                        <i class="fe fe-stop-circle"></i> {{__('site.not_live')}}
                        @endif
                    </span>
                    <div class="card-header">
                        {{__('site.continue_editing_listing')}}
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('listings.update', [$area, $listing])}}">
                            @csrf
                            {{method_field('PATCH')}}
                            <div class="form-group">
                                <label class="control-label">{{__('site.title')}}</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title') ?: $listing->title}}">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{__('site.description')}}</label>
                                <textarea type="text" name="body" class="form-control @error('title') is-invalid @enderror" rows="8">{{old('body') ?: $listing->body}}</textarea>
                                @error('body')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            @include('listings.partials.form._areas')
                            @include('listings.partials.form._categories')
                            <div class="form-group">
                                <button type="submit" class="btn btn-default">{{__('site.save')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
