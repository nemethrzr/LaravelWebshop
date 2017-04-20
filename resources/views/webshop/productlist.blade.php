@extends('layouts.webshop')

@section('content')








<div class="container">
      
      <div class="row">
        @foreach($products as $product)
	        <div class="col-xs-18 col-sm-6 col-md-3">
	          <div class="thumbnail">
	            <img src="http://placehold.it/500x300" alt="">
	              <div class="caption">
	                <h4>{{$product->name}}</h4>
	                <p>{{  str_limit($product->description,100,'...') }}</p>
	                <p>
	                <form method="post" action="{{route('postaddtocart')}}">
		                <input type="hidden" name="id" value="{{$product->id}}">
		                <input type="number" name="qty" value="1" class="">  

		                <button type="submit" class="btn btn-info btn-xs">Add to Cart</button>
		                	{{csrf_field()}}
	                </form>
	                <a href="{{route('getaddtocart',['id'=>$product->id])}}" class="btn btn-info btn-xs" role="button">Order</a> 
	                <a href="#" class="btn btn-default btn-xs" role="button">Add to Cart</a>

	                </p>
	            </div>
	          </div>
	        </div>
        @endforeach
        </div>


      
    </div><!-- End container -->

@endsection