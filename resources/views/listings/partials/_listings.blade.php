<div class="col-sm-6 col-lg-4">
    <div class="card p-3">
        <div class="card-header">
            <a href="javascript:void(0)" class="mb-3">
                {{$listing->title}}
            </a>
        </div>
        <div class="card-body">
            {{\Str::limit($listing->body, 120)}}
        </div>
        <div class="card-footer">
            <div class="d-flex align-items-center px-2">
                <div>
                    @if($area->children->count())
                        <span class="text-muted-dark">
                            <a href="{{route('areas.store', $listing->area->slug)}}">{{$listing->area->name}}</a>
                        </span>
                    @endif
                    <div>{{$listing->owner->name}}</div>
                    <small class="d-block text-muted"><time>{{$listing->created_at->diffForHumans()}}</time></small>
                </div>
                <div class="ml-auto text-muted">
                    <a href="javascript:void(0)" class="icon"><i class="fe fe-eye mr-1"></i> 112</a>
                    <a href="javascript:void(0)" class="icon d-none d-md-inline-block ml-3"><i class="fe fe-heart mr-1"></i> 42</a>
                </div>
            </div>
        </div>
    </div>
</div>
