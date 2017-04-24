@extends('layouts.default')
@section('title','Profilom')

@section('content')
<div class="row">
<div class="col-md-6">
	<h2>Profilom</h2>
	<h3>Alap információk:</h3>
	<p>{{ $session_product_id }}</p>
	<p>{{ $id }}</p>

	<div>{{$user->id}}</div>
	<div><strong>Regisztálás dátuma: </strong>{{$user->created_at}}</div>
	<div><strong>Név:</strong> {{$user->first_name}} {{$user->last_name}}</div>
	<div><strong>Email:</strong> {{$user->email}}</div>	

</div>


<div class="col-md-6">
	<h3>Megrendelések:</h3>
</div>
</div>


<div class="col-md-6">
	
<form method="post" action="{{route('postaccount')}}">
<div class="form-group">
    <h2>Szállítási cím:</h2>
    <div class="form-group">
        <label for="shipping_zipcode">Írányítószám</label>
        <input class="form-control" type="number" name="shipping_zipcode" id="shipping_zipcode" value="{{ isset($shipping_address->zipcode) ? $shipping_address->zipcode : null  }}">
    </div>
    <div class="form-group">
        <label for="shipping_city">Város</label>
        <input class="form-control" type="text" name="shipping_city" id="shipping_city" value="{{ isset($shipping_address->city) ? $shipping_address->city : null  }}">
    </div>
    <div>
        <label for="shipping_street">Utca</label>
        <input class="form-control"  type="text" name="shipping_street" id="shipping_street" value="{{ isset($shipping_address->street) ? $shipping_address->street : null  }}">
    </div>
    <div>
        <label for="shipping_streetnumber">Házszám</label>
        <input class="form-control"  type="text" name="shipping_streetnumber" id="shipping_streetnumber" value="{{ isset($shipping_address->street_number) ? $shipping_address->street_number : null  }}">
    </div>
</div>

<p><input type="checkbox" name="equal" id="equal">A szállítási is számlázási cím megegyezik</p>
<div class="form-group">
    <h2>Számlázási cím:</h2>
    <div class="form-group">
        <label for="billing_zipcode">Írányítószám</label>
        <input class="form-control" type="number" name="billing_zipcode" id="billing_zipcode" value="{{ isset($billing_address->zipcode) ? $shipping_address->zipcode : null  }}">
    </div>
    <div class="form-group">
        <label for="billing_city">Város</label>
        <input class="form-control" type="text" name="billing_city" id="billing_city" value="{{ isset($billing_address->city) ? $shipping_address->city : null  }}">
    </div>
    <div>
        <label for="billing_street">Utca</label>
        <input class="form-control"  type="text" name="billing_street" id="billing_street" value="{{ isset($billing_address->street) ? $shipping_address->street : null  }}">
    </div>
    <div>
        <label for="billing_streetnumber">Házszám</label>
        <input class="form-control"  type="text" name="billing_streetnumber" id="billing_streetnumber" value="{{ isset($billing_address->street_number) ? $shipping_address->street_number : null  }}">
    </div>
</div>

{{csrf_field()}}
<div class="form form-group">
	<div class="col-md-6"><button class="btn btn-primary" type="submit">Változtatások mentése</button></div>
	<div class="col-md-6"><button class="btn btn-danger" type="button">Mégse</button></div>
</div>
</form>


</div>

@endsection
