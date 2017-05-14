
<div>
    <h2>Szállítási és számlázási adatok</h2>



    <div class="shipping_address panel panel-default">
        <div class="panel-heading">@lang('account.shippingaddresses')</div>
        <div class="panel-body">
        @forelse($addresses as $shipping)
            @if($shipping->type=='shipping')
               <div class="container">
                <input type="radio" name="shipping_address_id" value="{{$shipping->id}}">{{ $shipping->zipcode }} {{ $shipping->city }} {{ $shipping->street }} {{ $shipping->street_number }}
       <strong><a href="{{route('getupdateaddress')}}" class="text-success">@lang('menu.edit')</a></strong>
        <strong><a href="{{route('getdeleteaddress',['address_id'=>$shipping->id])}}" class="text-danger">@lang('menu.delete')</a></strong>
                    </div>
            @endif 
            @empty       
        @endforelse
         <div class="container">
            <a href="#" id="newShipping"><input type="radio" name="address_id" value="sd">@lang('account.newshippingaddress')</a>
            </div>
        
        <div id="shippingAddressForm">
      
        </div>
        </div>
    </div>


    <div class="billing_address panel panel-default">
        <div class="panel-heading">@lang('account.billingaddresses')</div>
        <div class="panel-body">
        @forelse($addresses as $billing)
            @if($billing->type=='billing')
            <div class="container">   
                <input type="radio" name="billing_address_id" value="{{$billing->id}}">{{ $billing->zipcode }} {{ $billing->city }} {{ $billing->street }} {{ $billing->street_number }}

    <strong><a href="{{route('getupdateaddress')}}" class="text-success">@lang('menu.edit')</a></strong>
    <strong><a href="{{route('getdeleteaddress',['address_id'=>$billing->id])}}" class="text-danger">@lang('menu.delete')</a></strong>
                </div>    
            @endif 
            @empty       
        @endforelse
        <div class="container">   
            <a href="#" id="newBilling"><input type="radio" name="address_id" value="sd">@lang('account.newbillingaddress')</a>
        </div> 
        <div id="billingAddressForm">
      
        </div>
    </div>
</div>




