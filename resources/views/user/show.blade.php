@extends('layouts.default')
@section('title','Profilom')

@section('content')
<div class="container col-md-12">
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}">Kezdőlap</a></li>
            <li class="active">Felhasználói adatok</li>            
            
            
        </ol>
</div>

<div class="row">
	<div class="col-md-6">
	<div class="panel panel-default">
		<div class="panel-heading">
			Profilom Alap információk:
		</div>
		<div class="panel-body">
			<p>{{ $session_product_id }}</p>
			<p>{{ $id }}</p>

			<div>{{$user->id}}</div>
			<div><strong>Regisztálás dátuma: </strong>{{$user->created_at}}</div>
			<div><strong>Név:</strong> {{$user->first_name}} {{$user->last_name}}</div>
			<div><strong>Email:</strong> {{$user->email}}</div>	
		</div>
	</div>
		
		

		
		<div class="panel panel-default">			
	      <div class="panel-heading">@lang('account.changepassword')</div>
	      <div class="panel-body">
			<form method="post" action="{{route('postchangepassword')}}">
				<div class="form-group">
					<label for="oldpassword">@lang('account.oldpassword'):</label>
					<input type="password" name="oldpassword" class="form-control">
				</div>
				<div class="form-group">
					<label for="password">@lang('account.newpassword'): </label>
					<input type="password" name="password" class="form-control"></div>
				<div class="form-group">
					<label for="password_confirm">@lang('account.confirmnewpassword'):</label>
					<input type="password" name="password_confirm" class="form-control">
				</div>
				<div class="form-group">
								{{ csrf_field() }}
					<button type="submit" class="btn btn-primary">@lang('account.change')</button>
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
		<div class="panel panel-default">
			<div class="panel-heading">
				@lang('account.orders')
			</div>
			<div class="panel-body">
			@if(!empty($order))
				@include('user.partials.order')		
			@else
				<p>Nincsenek megrendelések!</p>
			@endif

			</div>

		</div>
		

		
	</div>



	<div class="col-md-6">





		@include('partials.address')

		@include('partials.addressForm')
			


		{{csrf_field()}}
		<div class="form form-group">
			<div class="col-md-6"><button class="btn btn-primary" type="submit">@lang('account.savechanges')</button></div>
			<div class="col-md-6"><button class="btn btn-danger" type="button">@lang('account.cancel')</button></div>

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