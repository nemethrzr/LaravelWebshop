

@forelse($addresses as $address)

<div class="form-group">
    <h1>cím selector</h1>
    <h2>@if($address->type == 'shipping') Szállítási cím: @else Számlázási cím @endif</h2>
    
    <div class="form-group">
        <label for="zipcode">Írányítószám</label>
        <input class="form-control" type="number" name="zipcode[]" id="zipcode" value="{{ isset($address->zipcode) ? $address->zipcode : null  }}">
    </div>
    <div class="form-group">
        <label for="city">Város</label>
        <input class="form-control" type="text" name="city[]" id="city" value="{{ isset($address->city) ? $address->city : null  }}">
    </div>
    <div>
        <label for="street">Utca</label>
        <input class="form-control"  type="text" name="street[]" id="street" value="{{ isset($address->street) ? $address->street : null  }}">
    </div>
    <div>
        <label for="street_number">Házszám</label>
        <input class="form-control"  type="text" name="street_number[]" id="street_number" value="{{ isset($address->street_number) ? $address->street_number : null  }}">
        <input class="form-control"  type="hidden" name="type[]" id="type" value="{{ isset($address->type) ? $address->type : null  }}">
    </div>
</div>



@empty

@endforelse




