@extends('layouts.webshop')
@section('title',$product->name)
@section('content')
<div class="container">
	<ol class="breadcrumb">
		<li><a href="{{ route('webshop') }}">Termékek</a></li>
		<li><a href="{{ route('getproducts',['category_slug'=>$product->category_slug])}}">{{ $product->category_name }}</a></li>
		<li class="active">{{ $product->name }}</li>
	</ol>
</div>

<div class="container-fluid">
    <div class="content-wrapper">	
		<div class="item-container">	
			<div class="container">	
				<div class="col-md-12">
					<div class="product col-md-3 service-image-left">
                    
						<center>
							<img id="item-display" src="{{$product->img}}" alt=""></img>
						</center>
					</div>
					
					<div class="container service1-items col-sm-2 col-md-2 pull-left">
						
					</div>
				</div>
					
				<div class="col-md-7">
					<div class="product-title">{{$product->name}}</div>
					<div class="product-desc">The Corsair Gaming Series GS600 is the ideal price/performance choice for mid-spec gaming PC</div>
					<div class="product-rating"><i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star-o"></i> </div>
					<hr>
					<div class="product-price">{{$product->price}} - {{$product->pricewithtax}}</div>
					<div class="product-stock">In Stock</div>
					<hr>
					<div class="btn-group cart">
					<form method="post" action="{{route('postaddtocart')}}">
		                <input type="hidden" name="id" value="{{$product->id}}">
		                <button type="submit" class="btn btn-success">Add to Cart</button>
		                	{{csrf_field()}}
	                </form>
						
					</div>
					<div class="btn-group wishlist">
						<button type="button" class="btn btn-danger">
							Add to wishlist 
						</button>
					</div>
				</div>
			</div> 
		</div>
		<div class="container-fluid">		
			<div class="col-md-12 product-info">
					<ul id="myTab" class="nav nav-tabs nav_tabs">
						
						<li class="active"><a href="#service-one" data-toggle="tab">DESCRIPTION</a></li>
						<li><a href="#service-two" data-toggle="tab">PRODUCT INFO</a></li>
						<li><a href="#service-three" data-toggle="tab">REVIEWS</a></li>
						
					</ul>
				<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade in active" id="service-one">
						 
							<section class="container product-info">
								{{$product->description}}
							</section>
										  
						</div>
					<div class="tab-pane fade" id="service-two">
						
						<section class="container">
								
						</section>
						
					</div>
					<div class="tab-pane fade" id="service-three">
												
					</div>
				</div>
				<hr>
			</div>
		</div>
	</div>
</div>
@endsection