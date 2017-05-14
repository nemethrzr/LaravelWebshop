<table class="table table-condensed">
<thead>
	<th>Dátum</th>
	<th>Azonosító</th>
	<th>Megrendelés össszege</th>
	<th></th>	
</thead>
<tbody>
	@foreach($order as $item)
	<tr>
		<td>{{$item->created_at}}</td>
		<td>{{$item->id}}</td>
		<td>{{ format_price($item->price)}}</td>
		<td><a href="{{route('getorder',['order_id'=>$item->id])}}">Megtekintés</a></td>
	</tr>
	@endforeach	
</tbody>
<tfoot>
	<tr>
		<td><a href="{{route('getorderall')}}">Összes megtekintése</a></td>
	</tr>
</tfoot>

</table>