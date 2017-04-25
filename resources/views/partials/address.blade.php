
<div>
    <h2>Szállítási és számlázási adatok</h2>



    <div class="shipping_address panel panel-default">
        <div class="panel-heading">Szállítási adatok</div>
        <div class="panel-body">
        @forelse($addresses as $shipping)
            @if($shipping->type=='shipping')
               <div class="container">
                <input type="radio" name="shipping_address_id" value="{{$shipping->id}}">{{ $shipping->zipcode }} {{ $shipping->city }} {{ $shipping->street }} {{ $shipping->street_number }}
       <strong><a href="{{route('getupdateaddress')}}" class="text-success">Szerkesztés</a></strong>
        <strong><a href="{{route('getdeleteaddress',['address_id'=>$shipping->id])}}" class="text-danger">Törlés</a></strong>
                    </div>
            @endif 
            @empty       
        @endforelse
         <div class="container">
            <a href="#" id="newShipping"><input type="radio" name="address_id" value="sd">Új szállítási cím</a>
            </div>
        
        <div id="shippingAddressForm">
      
        </div>
        </div>
    </div>


    <div class="billing_address panel panel-default">
        <div class="panel-heading">Számlázási adatok</div>
        <div class="panel-body">
        @forelse($addresses as $billing)
            @if($billing->type=='billing')
            <div class="container">   
                <input type="radio" name="billing_address_id" value="{{$billing->id}}">{{ $billing->zipcode }} {{ $billing->city }} {{ $billing->street }} {{ $billing->street_number }}

    <strong><a href="{{route('getupdateaddress')}}" class="text-success">Szerkesztés</a></strong>
    <strong><a href="{{route('getdeleteaddress',['address_id'=>$billing->id])}}" class="text-danger">Törlés</a></strong>
                </div>    
            @endif 
            @empty       
        @endforelse
        <div class="container">   
            <a href="#" id="newBilling"><input type="radio" name="address_id" value="sd">Új számlázási cím</a>
        </div> 
        <div id="billingAddressForm">
      
        </div>
    </div>
</div>



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
