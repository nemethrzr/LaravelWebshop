<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $appends = ['is_admin'];
	protected $visible = ['is_admin'];
	protected $attributes = ['is_admin'=>1];

    public function category(){

    	return $this->belongsTo('App\Category');
    }

    public function getIsAdminAttribute()
    {
        return $this->attributes['price'] . 'yes';
    }
    
}
