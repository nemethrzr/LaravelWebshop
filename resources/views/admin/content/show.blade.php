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
	<table class="table table-hover">
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
	<a href="route('getall_admincontent')" class="btn btn-primary">Új tartalom</a>
	<form method="post" action="{{route('postcreate_admincontent')}}">
		<div class="form-group">
		<input type="hidden" name="id" value="@if(isset($data)) {{$data->id}} @endif"> 
			<label for="menu">@lang('admin.menu')</label>
			<input type="text" name="menu" class="form-control" placeholder="Írd be a menüpont nevét" value="@if(isset($data))
			{{ $data->menu }}
			@endif">
		</div>
		<div class="form-group">
			<label for="description">@lang('admin.content')</label><p>Másold be vagy írd meg a tartalmat</p>
			<textarea name="description" class="form-control" rows="10">	
			@if(isset($data))
			{{ $data->description }}
			@endif


			</textarea>
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary">@lang('admin.create')</button>
			<button type="reset" class="btn btn-danger">@lang('admin.cancel')</button>
			
		</div>
		{{ csrf_field() }}
	</form>
</div>
<div class="col-md-2">
	<div class="panel panel-info">
		<div class="panel-heading">Segítség</div>
	  <div class="panel-body">
	    Tipp! A menüpontok sorbarendezéséhez nyomd le a bal egérgombot az adott menüponton és mozgasd a kivánt helyre.
	  </div>
	  
	</div>
</div>


<div class="col-md-2 right">
	<div class="panel panel-info">
		<div class="panel-heading">Segítség</div>
	  <div class="panel-body">
	    Tipp! Ha meggondoltad magadat és nem akarod módosítani az oldal tartalmát akkor kattints a "Mégse" gombra, ezzel új tartalmat bírsz felvinni
	  </div>
	  
	</div>
</div>



@endsection