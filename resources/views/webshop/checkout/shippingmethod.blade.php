<h2>Átvétel módja</h2>

<ul>
@foreach($shippingmethods as $shippingmethod)
    <li><input type="radio" name="shipping_method_id" value="{{$shippingmethod->id}}">{{$shippingmethod->name}}(+{{$shippingmethod->price}})</li>    
@endforeach
</ul>