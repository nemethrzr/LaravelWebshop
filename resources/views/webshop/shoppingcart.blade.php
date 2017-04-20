@extends('layouts.default')

@section('content')




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
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="{{ $product['item']['img'] }}" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#">{{ $product['item']['name'] }}</a></h4>
                                <h5 class="media-heading"> by <a href="#">Brand name</a></h5>
                                <span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="number" class="qty form-control" value="{{ $product['qty'] }}">
                        <input type="hidden" class="addtocart" name="addtocart" value="{{route('getaddtocart',['id'=>$product['item']['id']])}}">
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong> {{ number_format($product['item']['price'],0,' ',' ') }} Ft</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong class="total"> {{ number_format($product['price'],0,' ',' ') }} Ft</strong></td>
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
                        <td class="text-right"><h5><strong id="subtotal">{{number_format($products->totalPrice,0,' ',' ')}} Ft</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Estimated shipping</h5></td>
                        <td class="text-right"><h5><strong id="shipping">{{$products->shipping}} Ft</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong id="total">{{number_format($products->totalPrice+$products->shipping,0,' ',' ')}} Ft</strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        
                        <a class="btn btn-default" href="{{url('/webshop')}}"><span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping</a>
                        </td>
                        <td>
                        <button type="button" class="btn btn-success">
                            Checkout <span class="glyphicon glyphicon-play"></span>
                        </button>
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
    
    $('.qty').on('change',function(event){
        var qty = $(this).val();
        var url = $(this).siblings('.addtocart').val()+'/'+qty;
        console.log('changed the Quantity');
        console.log('the new qty:'+qty);
        console.log('the requested url:'+url);


        $.ajax({
            method: 'GET',
            url: url ,

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

        

        $.each(cart.items, function (index, value) {
            console.log(index);
            console.log(value.item.id);
            $('#'+index+' .total').html(value.price);
        });
    }


</script>




@endsection