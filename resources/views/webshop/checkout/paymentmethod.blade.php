<h2>Fizetés kiválasztása</h2>

<ul>
    @foreach($paymenttypes as $paymenttype)
    	<li><input type="radio" name="paymenttype">{{$paymenttype->name}} (+{{$paymenttype->price}}) Ft</li>
    @endforeach
</ul>