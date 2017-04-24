@extends('layouts.default')

@section('content')
<div class="container col-md-12">
        <ol class="breadcrumb">
            <li><a href="{{ route('webshop') }}">Cart</a></li>
            <li class="active"><a href="{{ route('getcheckout') }}">Checkout</a></li>
            <li class="active">Finish</li>
            
        </ol>
    </div>
<h2>Checkout</h2>


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
                        <strong>{{ $product['qty'] }}</strong>                        
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong> {{ number_format($product['item']['price'],0,' ',' ') }} Ft</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong class="total"> {{ number_format($product['price'],0,' ',' ') }} Ft</strong></td>
                        <td class="col-sm-1 col-md-1">
                        

                        
                        
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
                   




                   
                </tbody>
            </table>
        </div>


        <form method="post" action="{{route('postcheckout')}}">
@include('partials.address',$address[0])
@include('partials.address',$address[1])

<p><input type="checkbox" name="equal" id="equal">A szállítási is számlázási cím megegyezik</p>
<div class="form-group">
    <h2>Számlázási cím:</h2>
    <div class="form-group">
        <label for="zipcode">Írányítószám</label>
        <input class="form-control" type="number" name="zipcode[]" id="zipcode" value="{{ isset($billing_address->zipcode) ? $shipping_address->zipcode : null  }}">
    </div>
    <div class="form-group">
        <label for="city">Város</label>
        <input class="form-control" type="text" name="city[]" id="city" value="{{ isset($billing_address->city) ? $shipping_address->city : null  }}">
    </div>
    <div>
        <label for="street">Utca</label>
        <input class="form-control"  type="text" name="street[]" id="street" value="{{ isset($billing_address->street) ? $shipping_address->street : null  }}">
    </div>
    <div>
        <label for="streetnumber">Házszám</label>
        <input class="form-control"  type="text" name="streetnumber[]" id="streetnumber" value="{{ isset($billing_address->street_number) ? $shipping_address->street_number : null  }}">
    </div>
</div>


        {{csrf_field()}}



                        <a class="btn btn-default" href="{{route('getcart')}}"><span class="glyphicon glyphicon-shopping-cart"></span> Back to Cart</a>
                        </td>
                        <td>
                        <button type="submit" class="btn btn-success"">
                            Checkout <span class="glyphicon glyphicon-play"></span>
                        </button>
                        
</form>


    </div>
</div>
@endsection


@section('scripts')
<script type="text/javascript">
    
    $('#equal').on('change',function(evenet){
        console.log('checbox megváltozva');
        if(this.checked){
            console.log('checkolva van');
            $('#shipping_zipcode').bind('keyup change',function(){
                console.log('event lefutottt');
                $('#billing_zipcode').attr('value',$(this).val());
            });
            $('#shipping_street').bind('keyup change',function(){
                console.log('shipping_street event lefutottt');
                $('#billing_street').attr('value',$(this).val());
            });
            $('#shipping_streetnumber').bind('keyup change',function(){
                console.log('event lefutottt');
                $('#billing_streetnumber').attr('value',$(this).val());
            });
            $('#shipping_city').bind('keyup change',function(){
                console.log('event lefutottt');
                $('#billing_city').attr('value',$(this).val());
            });
        }else{
            $('#shipping_city, #shipping_zipcode, shipping_street, shipping_streetnumber').unbind();
            console.log('unbinding evenets');
        }
    });
</script>
@endsection