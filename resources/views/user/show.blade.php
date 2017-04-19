@extends('layouts.default')


@section('content')

<h1>Profilom</h1>


<div>{{$user->id}}</div>
<div>{{$user->first_name}}</div>
<div>{{$user->last_name}}</div>

<div>{{$user->email}}</div>
<form>
<div class="form-group">
	<h2>Szállítási cím:</h2>
	<div class="form-group">
		<label for="city">Írányítószám</label>
		<input class="form-control" type="number" name="city" id="city">
	</div>
	<div class="form-group">
		<label for="city">Város</label>
		<input class="form-control" type="text" name="city" id="city">
	</div>
	<div>
		<label for="city">Utca</label>
		<input class="form-control"  type="text" name="city" id="city">
	</div>
	<div>
		<label for="city">Házszám</label>
		<input class="form-control"  type="text" name="city" id="city">
	</div>
</div>

<div class="form-group">
	<h2>Számlázási cím:</h2>
	<div class="form-group">
		<label for="city">Írányítószám</label>
		<input class="form-control" type="number" name="city" id="city">
	</div>
	<div class="form-group">
		<label for="city">Város</label>
		<input class="form-control" type="text" name="city" id="city">
	</div>
	<div>
		<label for="city">Utca</label>
		<input class="form-control"  type="text" name="city" id="city">
	</div>
	<div>
		<label for="city">Házszám</label>
		<input class="form-control"  type="text" name="city" id="city">
	</div>
</div>
<div class="form form-group">
	<div class="col-md-6"><button class="btn btn-primary" type="submit">Változtatások mentése</button></div>
	<div class="col-md-6"><button class="btn btn-danger" type="button">Mégse</button></div>
</div>
</form>
@endsection
