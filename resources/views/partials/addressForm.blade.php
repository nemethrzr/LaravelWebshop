<div id="addressForm">
    <form method="post" action="{{route('postaddress')}}">
          <div class="form-group">
            <label for="zipcode">Írányítószám</label>
            <input class="form-control" type="number" name="zipcode" id="zipcode" value="">
        </div>
        <div class="form-group">
            <label for="city">Város</label>
            <input class="form-control" type="text" name="city" id="city" value="">
        </div>
        <div>
            <label for="street">Utca</label>
            <input class="form-control"  type="text" name="street" id="street" value="">
        </div>
        <div>
            <label for="street_number">Házszám</label>
            <input class="form-control"  type="text" name="street_number" id="street_number" value="">
            <input class="form-control"  type="hidden" name="type" id="type" value="">
        </div>
        <div>   
            {{ csrf_field()}}
            <button type="submit">Save</button>
           
        </div>
    </form>

</div>