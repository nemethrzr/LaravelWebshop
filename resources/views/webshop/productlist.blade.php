@extends('layouts.webshop')
@section('title', isset($category->name) ? $category->name : 'No display data' )

@section('content')
@isset($category)
	<div class="container col-md-12">
		<ol class="breadcrumb">
			<li><a href="{{ route('webshop') }}">Termékek</a></li>
			<li class="active">{{  $category->name  }}</li>
			
		</ol>
	</div>
@endisset
      <div class="row">
     
        @forelse($products as $product)
	        <div class="col-xs-18 col-sm-6 col-md-3">
	          <div class="thumbnail">
	            <a href="{{route('getproduct',['category_slug'=>$product->category_slug,'product_slug'=>$product->slug,'product_id'=>$product->id])}}">
	            <!--<img src="http://placehold.it/500x300" alt=""></a>-->
	            <img src="{{route('getimage',['filename'=>'deafult.jpg'])}}" alt=""></a>
	              <div class="caption">
	                <h4><a href="{{route('getproduct',['category_slug'=>$product->category_slug,'product_slug'=>$product->slug,'product_id'=>$product->id])}}">{{$product->name}}</a></h4>
	                <p>{{  str_limit($product->description,100,'...') }}</p>	                
	                <p><strong>{{ number_format($product->pricewithtax,0,' ', ' ') }} Ft</strong></p>
	                <p>
	                <form method="post" action="{{route('postaddtocart')}}">
		                <input type="hidden" name="id" value="{{$product->id}}">
		                <button type="submit" class="btn btn-success btn-xs">Add to Cart</button>
		                	{{csrf_field()}}
	                </form>
	              

	                </p>
	            </div>
	          </div>
	        </div>
	    @empty
			<h3>No display data</h3>
        @endforelse
 		
        
        </div>
      


@include('webshop.partials.paginator',['paginator'=>$products])
      
    

@endsection