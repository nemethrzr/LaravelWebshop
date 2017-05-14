@extends('layouts.admin')

@section('content')

<div class="container-fluid col-md-12">
    <ol class="breadcrumb">
        <li><a href="{{route('getall_admincontent')}}">Admin</a></li>
        <li class="active">Termékek</li>
        
    </ol>
</div>
<div class="col-md-3">
	<div class="row">
		<table class="table table-hover">
			<thead>
				<th>Id</th>
				<th>Név</th>
				<th>Slug</th>
				<th>Szerkesztés</th>
				<th>Törlés</th>
			</thead>
			<tbody>
				@foreach($categories as $category)
					<tr>
						<td>{{ $category->id }}</td>
						<td>{{ $category->name }}</td>
						<td>{{ $category->slug }}</td>
						<td><a href="{{route('getupdate_admincategory',['category_id'=>$category->id])}}">@lang('admin.edit')</a></td>
						<td><a href="{{route('getdelete_admincategory',['category_id'=>$category->id])}}">@lang('admin.delete')</a></td>
					</tr>

				@endforeach
			</tbody>
		</table>
		@include('admin.partials.paginator',['paginator'=>$categories])
	</div>
	<div class="row">
		<hr>
		<a href="{{route('getall_adminproduct')}}" class="btn btn-primary">@lang('admin.new')</a>
		<h2>Kategória felvitele</h2>
		<form method="post" action="{{route('postcreate_admincategory')}}">
			<div class="form-group">
			<input type="hidden" name="id" value="@if(isset($data)) {{$data->id}} @endif">
				<label for="name">@lang('admin.name')</label>
				<input type="text" name="name" placeholder="Add meg a kategória nevét" class="form-control" value="@if(isset($data)) {{$data->name}} @endif">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-success">@lang('admin.create')</button>
			</div>
			{{csrf_field()}}
		</form>
	</div>

</div>



@endsection