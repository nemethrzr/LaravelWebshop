<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user(){

    	return $this->belongsTo('App\User');
    }
    public function order_products(){
    	return $this->hasMany('App\OrderProduct');
    }
    public function payment_type(){
    	return $this->belongsTo('App\PaymentType');
    }
    public function shipping_method(){
    	return $this->belongsTo('App\ShippingMethod');
    }
    public function billing_address()
    {
        return $this->belongsTo('App\Address');
    }
    public function shipping_address(){
        return $this->belongsTo('App\Address');
    }
}
