@extends('layouts.default')
@section('title','Kosár')

@section('style')
<style type="text/css">

    
</style>

@endsection
@section('content')


<div class="container col-md-12">
        <ol class="breadcrumb">
            <li><a href="{{ route('webshop') }}">Cart</a></li>
            <li class="active">Checkout</li>
            <li class="active">Finish</li>
            
        </ol>
    </div>




<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
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
                
                @foreach($products->items as $product)

                    <tr id="{{$product['item']['id']}}">
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="{{route('getproduct',['category_slug'=>$product['item']['category_slug'],'product_slug'=>$product['item']['slug'],'product_id'=>$product['item']['id']])}}"> <img class="media-object" src="{{ route('getimage',['filename'=>'deafult.jpg']) }}" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading">
<a href="{{route('getproduct',['category_slug'=>$product['item']['category_slug'],'product_slug'=>$product['item']['slug'],'product_id'=>$product['item']['id']])}}">{{$product['item']['name']}}</a>
                                </h4>
                               
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="number" class="qty form-control" value="{{ $product['qty'] }}">
                        <input type="hidden" class="id form-control" value="{{ $product['item']['id'] }}">
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong> {{ format_price($product['item']['price']) }}</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong class="total"> {{ format_price($product['price']) }}</strong></td>
                        <td class="col-sm-1 col-md-1">
                        

                        
                        <a href="{{route('getremovefromcart',['id'=>$product['item']['id']])}}" class="btn btn-danger" ><span class="glyphicon glyphicon-remove"></span>Remove</a>
                        </td>
                    </tr>



                @endforeach
                
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right"><h5><strong id="subtotal">{{format_price($products->totalPrice)}}</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Estimated shipping</h5></td>
                        <td class="text-right"><h5><strong id="shipping">{{ format_price($products->shipping)}}</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong id="total">{{format_price($products->totalPrice+$products->shipping)}}</strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        
                        <a class="btn btn-default" href="{{url('/webshop')}}"><span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping</a>
                        </td>
                        <td>
                        <a class="btn btn-success" href="{{route('getcheckout')}}">
                            Checkout <span class="glyphicon glyphicon-play"></span>
                        </a>
                        <a href="{{route('getremovefromcart')}}">Remove all</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection



@section('scripts')

<script type="text/javascript">
    var url    = "{{route('postupdatecart')}}";
    var _token = "{{csrf_token()}}";
    $('.qty').on('change',function(event){
        var qty = $(this).val();
        var id  = $(this).siblings('.id').val();
        console.log('changed the Quantity');
        console.log('the new qty:'+qty);
        console.log('the requested url:'+url);


        $.ajax({
            method: 'POST',
            url: url ,
            data: {'_token':_token,'qty':qty,'id':id }

        }).done(function(msg){
            console.log('sikeres ajax küldés'+msg);
            console.log('qty: '+msg.totalPrice);
            console.log('items: '+msg.items);
            updateCart(msg);
        });


    });

    function updateCart(cart) {
        $('#subtotal').html(cart.totalPrice);
        $('#shipping').html(cart.shipping);
        $('#total').html(cart.totalPrice+cart.shipping);
        $('#cartbadge').html(cart.totalQty);
        

        $.each(cart.items, function (index, value) {
            console.log(index);
            console.log(value.item.id);
            $('#'+index+' .total').html(value.price);
        });
    }


</script>




@endsection