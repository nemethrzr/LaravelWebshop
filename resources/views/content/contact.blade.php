@extends('layouts.default')
@section('title',__('menu.contact'))

@section('content')



<div class="container col-md-12">
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">@lang('menu.home')</a></li>
            <li class="active">@lang('menu.contact')</li>
        </ol>

</div>


<p>Ha bármilyen kérdése lenne forduljon hozzánk bizalommal.</p>
<div class="container col-md-6 center">
	<form method="post" action="{{ route('postcontact') }}">
	<div class="form-group">
	<label for="email">@lang('menu.email')</label>
		<input type="email" name="email" class="form-control">
	</div>
	<div class="form-group">
	<label for="message">@lang('menu.message')</label>
		<textarea class="form-control" name="message">
			
		</textarea>
	</div>

	<div class="form-group">
		<button type="submit" class="btn btn-primary">@lang('menu.send')</button>
	</div>
	{{ csrf_field()}}
	</form>

</div>

@endsection