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
			<form method="post" action="{{route('postchangepassword')}}">
				<div class="form-group">
					<label for="oldpassword">Régi jelszó:</label>
					<input type="password" name="oldpassword" class="form-control">
				</div>
				<div class="form-group">
					<label for="password">Új jelszó: </label>
					<input type="password" name="password" class="form-control"></div>
				<div class="form-group">
					<label for="password_confirm">Új jelszó mégegyszer:</label>
					<input type="password" name="password_confirm" class="form-control">
				</div>
				<div class="form-group">
								{{ csrf_field() }}
					<button type="submit" class="btn btn-primary">Megváltoztat</button>
					@if(session()->has('warning'))
					    <div class="alert alert-warning">
					        {{ session()->get('warning') }}
					    </div>
					@endif
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

		@include('partials.addressForm')
			


		{{csrf_field()}}
		<div class="form form-group">
			<div class="col-md-6"><button class="btn btn-primary" type="submit">Változtatások mentése</button></div>
			<div class="col-md-6"><button class="btn btn-danger" type="button">Mégse</button></div>

		</div>
	</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
	
$('#newShipping').on('click',function(){
    $('#addressForm #type').attr('value','shipping');
    $('#shippingAddressForm').html($('#addressForm').toggle());
    
});

$('#newBilling').on('click',function(){
    $('#addressForm #type').attr('value','billing');
    $('#billingAddressForm').html($('#addressForm').toggle());
    
});




</script>
@endsection