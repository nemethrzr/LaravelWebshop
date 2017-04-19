<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<style type="text/css">
		#wrapper{padding-top: 60px;}
	</style>

</head>
<body>

@include('partials.navbar')


<div id="wrapper" class="container">
<div class="col-md-2">
	<h1>Termékek</h1>
		@include('webshop.partials.webshopmenu')
	</div>
<div class="col-md-10">
	
	@if(session()->has('message'))
	    <div class="alert alert-success">
	        {{ session()->get('message') }}
	    </div>
	@endif

	@if($errors)

		@foreach($errors->all() as $error)

			<div class="alert alert-danger">

				{{$error}}  

			</div>


		@endforeach

	@endif

	@yield('content')
</div>
	



</div>


@yield('scripts')

</body>
</html>