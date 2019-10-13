<div class="col-sm-6 col-lg-4">
    <div class="card p-3">
        @include('listings.partials._favourite_buttons')
        <div class="card-header">
            <a href="{{route('listings.show', [$area->slug, $listing->slug])}}" class="mb-3">
                {{$listing->title}}
            </a>
        </div>
        <div class="card-body">
            {{\Str::limit($listing->body, 120)}}
        </div>
        <div class="card-footer">
            <div class="d-flex align-items-center px-2">
                <div>
                    <div>{{__('site.by')}} {{$listing->owner->name}}</div>
                    @if($area->children->count())
                        <span class="badge badge-secondary">
                            <a class="text-white" href="{{route('user.area.store', $listing->area->slug)}}">{{$listing->area->name}}</a>
                        </span>
                    @endif
                        <span class="badge badge-info">
                        <i class="fa fa-eye"></i> (11)
                    </span>
                    {{$footer}}
                </div>
            </div>
        </div>
    </div>
</div>
