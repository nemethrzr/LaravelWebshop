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

		
		<div class="panel panel-default">
	      <div class="panel-heading">Jelszó megváltoztatása</div>
	      <div class="panel-body">
			<form method="post">
				<div class="form-group">
					<label for="oldpassword">Régi jelszó:</label>
					<input type="password" name="oldpassword" class="form-control">
				</div>
				<div class="form-group">
					<label for="oldpassword">Új jelszó: </label>
					<input type="password" name="password" class="form-control"></div>
				<div class="form-group">
					<label for="oldpassword">Új jelszó mégegyszer:</label>
					<input type="password" name="password_confirm" class="form-control">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Megváltoztat</button>
				</div>
			</form>

	      </div>
	    </div>
	</div>


	<div class="col-md-6">
		<h3>Megrendelések:</h3>
	</div>



	<div class="col-md-6">





	@include('partials.address')
			


		{{csrf_field()}}
		<div class="form form-group">
			<div class="col-md-6"><button class="btn btn-primary" type="submit">Változtatások mentése</button></div>
			<div class="col-md-6"><button class="btn btn-danger" type="button">Mégse</button></div>

		</div>
	</div>
</div>
@endsection
