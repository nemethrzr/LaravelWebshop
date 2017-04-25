<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
	protected $fillable = ['qty','product_id','price','order_id','pricewithtax'];
    public function order(){

    	return $this->belongsTo('App\Order');
    }
}
