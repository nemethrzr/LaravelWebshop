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
	
<form>
<div class="form-group">
	<h2>Szállítási cím:</h2>
	<div class="form-group">
		<label for="zipcode">Írányítószám</label>
		<input class="form-control" type="number" name="zipcode" id="zipcode">
	</div>
	<div class="form-group">
		<label for="city">Város</label>
		<input class="form-control" type="text" name="city" id="city">
	</div>
	<div>
		<label for="street">Utca</label>
		<input class="form-control"  type="text" name="street" id="street">
	</div>
	<div>
		<label for="streetnumber">Házszám</label>
		<input class="form-control"  type="text" name="streetnumber" id="streetnumber">
	</div>
</div>

<div class="form-group">
	<h2>Számlázási cím:</h2>
	<div class="form-group">
		<label for="zipcode">Írányítószám</label>
		<input class="form-control" type="number" name="zipcode" id="zipcode">
	</div>
	<div class="form-group">
		<label for="city">Város</label>
		<input class="form-control" type="text" name="city" id="city">
	</div>
	<div>
		<label for="street">Utca</label>
		<input class="form-control"  type="text" name="street" id="street">
	</div>
	<div>
		<label for="streetnumber">Házszám</label>
		<input class="form-control"  type="text" name="streetnumber" id="streetnumber">
	</div>
</div>
<div class="form form-group">
	<div class="col-md-6"><button class="btn btn-primary" type="submit">Változtatások mentése</button></div>
	<div class="col-md-6"><button class="btn btn-danger" type="button">Mégse</button></div>
</div>
</form>


</div>

@endsection
