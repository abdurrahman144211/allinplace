@auth
    @if($listing->hasFavouritedBy(auth()->user()))
        <form method="POST" class="corner" action="{{route('listings.favourites.destroy', [$area, $listing])}}">
            @csrf
            {{method_field('DELETE')}}
            <button type="submit" class="btn btn-primary">
                <i class="fe fe-heart"></i>
            </button>
        </form>
    @else
        <form method="POST" class="corner" action="{{route('listings.favourites.store', [$area, $listing])}}">
            @csrf
            <button type="submit" class="btn btn-outline-default">
                <i class="fe fe-heart"></i>
            </button>
        </form>
    @endif
@endauth
