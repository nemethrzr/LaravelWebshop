@extends('layouts.default')



@section('content')
<div class="container col-md-12">
    <ol class="breadcrumb">
        <li><a href="{{route('home')}}">Kezdőlap</a></li>
        <li><a href="{{route('getaccount')}}">Profilom</a></li>
        <li class="active">Megrendeléseim</li>  
    </ol>
</div>
<div>
<h2>Megrendelések</h2>



	<table class="table table-bordered">
	<thead>
		<th>Dátum</th>
		<th>Azonosító</th>		
		<th>Átvétel módja</th>
		<th>Fizetés</th>
		<th>Összeg</th>
		<th>Állapot</th>
		<th>Részletek</th>
	</thead>

	@foreach($orders as $order)
	<tr>
		<td>{{$order->created_at}}</td>
		<td>{{$order->id}}</td>
		<td>{{$order->shipping_method->name}}</td>
		<td>{{$order->payment_type->name}}</td>
		<td>{{ number_format($order->price,0,' ', ' ') }} Ft</td>
		<td>{{$order->status}}</td>
		<td><a href="{{route('getorder',['order_id'=>$order->id])}}">Megtekint</a></td>

	</tr>


	@endforeach
	</table>
	 
	@include('webshop.partials.paginator',['paginator'=>$orders])
</div>	
@endsection
