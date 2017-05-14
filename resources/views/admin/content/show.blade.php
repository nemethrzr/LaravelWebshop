@extends('layouts.admin')

@section('content')

<div class="container-fluid col-md-12">
    <ol class="breadcrumb">
        <li><a href="{{route('getall_admincontent')}}">Admin</a></li>
        <li class="active">Oldalak</li>
        
    </ol>
</div>

<h2>Tartalmi oldalak:</h2>
<div class="col-md-6">
	<table class="table">
		<thead>
			<th>@lang('admin.id')</th>
			<th>@lang('admin.sort')</th>
			<th>@lang('admin.menu')</th>
			<th>@lang('admin.slug')</th>
			<th>@lang('admin.content')</th>
			<th>@lang('admin.created')</th>
			<th>@lang('admin.updated')</th>
			<th>@lang('admin.edit')</th>
			<th>@lang('admin.delete')</th>

		</thead>

		<tbody>
		@foreach($contents as $content)
			<tr>
				<td>{{ $content->id }}</td>
				<td>{{ $content->sort }}</td>
				<td>{{ $content->menu }}</td>
				<td>{{ $content->slug }}</td>
				<td>{{ str_limit($content->description,40,' ...') }}</td>
				<td>{{ $content->created_at }}</td>
				<td>{{ $content->updated_at }}</td>
				<td>
				<a href="{{ route('getupdate_admincontent',['content_id'=>$content->id]) }}" class="text-success">@lang('admin.edit')</a></td>
				<td>
				<a href="{{ route('getdelete_admincontent',['content_id'=>$content->id])}}" class="text-alert">@lang('admin.delete')</a></td>
			</tr>
		@endforeach
		</tbody>


	</table>
	@include('admin.partials.paginator',['paginator'=>$contents])
</div>
<div class="col-md-6">
	<h2>@lang('admin.newcontent')</h2>
	<form method="post" action="{{route('postcreate_admincontent')}}">
		<div class="form-group">
		<input type="hidden" name="id" value="@if(isset($data)) {{$data->id}} @endif"> 
			<label for="menu">@lang('admin.menu')</label>
			<input type="text" name="menu" class="form-control" value="@if(isset($data))
			{{ $data->menu }}
			@endif">
		</div>
		<div class="form-group">
			<label for="description">@lang('admin.content')</label>
			<textarea name="description" class="form-control" rows="10">	
			@if(isset($data))
			{{ $data->description }}
			@endif


			</textarea>
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary">@lang('admin.create')</button>
		</div>
		{{ csrf_field() }}
	</form>
</div>

@endsection