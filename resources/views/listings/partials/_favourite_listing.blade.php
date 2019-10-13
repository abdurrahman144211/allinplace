@component('listings.partials._base_listing', compact('listing'))

    @slot('footer')
        <small class="d-block text-muted">
            <time>
                {{__('site.added_from')}} {{$listing->pivot->created_at->diffForHumans()}}
            </time>
        </small>
    @endslot

@endcomponent
