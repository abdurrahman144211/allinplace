<div class="form-group">
    <label class="control-label">{{__('site.area')}}</label>
    <select name="area_id" class="form-control @error('area_id') is-invalid @enderror">
        @foreach($areas as $country)
            <optgroup label="{{$country->name}}">
                @foreach($country->children as $state)
                    <optgroup label="{{$state->name}}">
                        @foreach($state->children as $city)
                            <option
                                value="{{$city->id}}"
                                {{(isset($listing) && $listing->area_id == $city->id) || old('area_id') == $city->id || $area->id == $city->id ? 'selected' : '' }}
                                @if(!$city->usable) disabled @endif>
                                {{$city->name}}
                            </option>
                        @endforeach
                    </optgroup>
                @endforeach
            </optgroup>
        @endforeach
    </select>
    @error('area_id')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
