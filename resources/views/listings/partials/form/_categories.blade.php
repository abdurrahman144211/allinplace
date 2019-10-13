<div class="form-group">
    @if(isset($listing))
        <input type="hidden" name="category_id" value="{{$listing->category_id}}">
    @endif
    <label class="control-label">{{__('site.category')}}</label>
    <select
        name="category_id"
        class="form-control @error('category_id') is-invalid @enderror"
        @if(isset($listing) && $listing->live()) disabled @endif>
        @foreach($categories as $category)
            <optgroup label="{{$category->name}}">
                @foreach($category->children as $child)
                    <option
                        value="{{$child->id}}"
                        @if(!$child->usable) disabled @endif
                        {{(isset($listing) && $listing->category_id == $child->id) || old('category_id') == $child->id ? 'selected' : '' }}>
                        {{$child->name}} ({{$child->cost()}})
                    </option>
                @endforeach
            </optgroup>
        @endforeach
    </select>
    @error('category_id')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
