<h2>Átvétel módja</h2>

<ul>
@foreach($shippingmethods as $shippingmethod)
    <li><input type="radio" name="shippingmethod">{{$shippingmethod->name}}(+{{$shippingmethod->price}})</li>    
@endforeach
</ul>