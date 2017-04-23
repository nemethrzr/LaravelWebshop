<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;

class Product extends Model
{
	/*protected $attributes = ['pricewithtax'=>'',];
    protected $appends    =    ['pricewithtax'=>'',];
    protected $available    = ['pricewithtax'];*/
    
    protected $attributes = array(
        'Zipode' => '',
        'pricewithtax'=>'',
        'imgpath'=>''
    );
    protected $appends = ['ZipCode','pricewithtax','imgpath'];

    public function getZipCodeAttribute()
    {
        return '6050'.$this->attributes['price'];
    }

    public function category(){

    	return $this->belongsTo('App\Category');
    }

    public function getPriceWithTaxAttribute()
    {
        
        $price = $this->attributes['price'];
        return ($price * (27/100))+$price;


    }

    public function setPriceWithTaxAttribute($value)
    {
        return $this->pricewithtax=$value;


    }
    public function getImgPathAttribute(){
       
        return Storage::url('img/deafult.jpg');
    }

    
}
