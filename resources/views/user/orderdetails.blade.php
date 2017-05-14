@extends('layouts.default')
@section('title','Megrendelésem részletesen')
@section('content')

<div class="container">
    <ol class="breadcrumb">
        <li><a href="{{route('getorderall')}}">Vissza</a></li>
    </ol>
</div>

<div class="container">
<ul class="list-group">
	<li class="list-group-item"><strong>Megrendelés  azonosító:</strong> {{ $order->id }}</li>
	<li class="list-group-item"><strong>Dátum:</strong> {{ $order->created_at }}</li>
	<li class="list-group-item"><strong>Átvétel módja:</strong> {{ $order->shipping_method->name }}</li>
	<li class="list-group-item"><strong>Fizetés:</strong> {{ $order->payment_type->name }}</li>
	<li class="list-group-item"><strong>Összeg:</strong> {{ format_price($order->price) }}</li>
	<li class="list-group-item"><strong>Állapot:</strong> {{ $order->status }}</li>
	<li class="list-group-item"><strong>Szállítási cím:</strong>
	<ul>
		<li><strong>Írányítószám:</strong> {{ $order->shipping_address->zipcode }}</li>
		<li><strong>Város:</strong> {{ $order->shipping_address->city }}</li>
		<li><strong>Utca:</strong> {{ $order->shipping_address->street }}</li>
		<li><strong>Házszám:</strong> {{ $order->shipping_address->street_number }}</li>
	</ul>
	</li>
	<li class="list-group-item"><strong>Szállítási cím:</strong>
	<ul>
		<li><strong>Írányítószám:</strong> {{ $order->billing_address->zipcode }}</li>
		<li><strong>Város:</strong> {{ $order->billing_address->city }}</li>
		<li><strong>Utca:</strong> {{ $order->billing_address->street }}</li>
		<li><strong>Házszám:</strong> {{ $order->billing_address->street_number }}</li>
	</ul>
	</li>
</ul>



 <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                
                @foreach($order->order_products as $order_products)
                

                    <tr id="{{$order_products->product->id}}">
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="{{ route('getproduct',['category_slug'=>$order_products->product->category->slug,'product_slug'=>$order_products->product->slug,'product_id'=>$order_products->product->id]) }}"> <img class="media-object" src="{{ route('getimage',['filename'=>'deafult.jpg']) }}" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading">


<a href="{{ route('getproduct',['category_slug'=>$order_products->product->category->slug,'product_slug'=>$order_products->product->slug,'product_id'=>$order_products->product->id]) }}">{{ $order_products->product->name }}</a>


                                </h4>
                               
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <strong>{{ $order_products->qty }}</strong>                        
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong> {{ format_price($order_products->price) }}</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong class="total"> {{ format_price($order_products->price) }}</strong></td>
                        <td class="col-sm-1 col-md-1">
                        

                        
                        
                        </td>
                    </tr>



                @endforeach
                
                   
                   




                   
                </tbody>
            </table>
</div>
@endsection