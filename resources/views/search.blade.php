<form>
    <label for="location">Location</label>
    <input type="text" id="location" name="location" value={{ $location }}>

    <label for="near_beach">Near beach</label>
    <input type="checkbox" name="near_beach" id="near_beach" value="1" {{ $near_beach ? 'checked="checked"' : ''}}>

    <label for="accepts_pets">Accepts pets</label>
    <input type="checkbox" name="accepts_pets" id="accepts_pets" value="1" {{ $accepts_pets ? 'checked="checked"' : ''}}>

    <label for="sleeps">Sleeps</label>
    <input type="number" name="sleeps" id="sleeps" min="1" max="8" value="{{ $sleeps }}">

    <label for="beds">Beds</label>
    <input type="number" name="beds" id="beds" min="1" max="4" value="{{ $beds }}">

    <a href="{{ route('search') }}">Reset</a>
    <input type="submit">
</form>

@if ($properties)
    <ul>
        @foreach ($properties as $property)
            <li>
                <strong>Location:</strong> {{ $property->location }}<br>
                <strong>Near the beach:</strong> {{ $property->near_beach ? 'Yes' : 'No' }}<br>
                <strong>Accepts pets:</strong> {{ $property->accepts_pets ? 'Yes' : 'No' }}<br>
                <strong>Sleeps:</strong> {{ $property->sleeps }}<br>
                <strong>Beds:</strong> {{ $property->beds }}<br>
            </li>
        @endforeach    
    </ul>

    <div>
        {!! $pagination !!}
    </div>
@endif