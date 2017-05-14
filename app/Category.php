<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Validator;

class Category extends Model
{
	protected $fillable = ['name','slug'];

    public function products(){
    	return $this->hasMany('App\Product');
    }


    public function getMenu(){
    	return $this->all();
    }

    public function setSlugAttribute($value)
    {
    	$value = ['slug'=>str_slug($value)];
    	$validator = Validator::make($value,[
    		'slug'=>'unique:categories'
    		]);
    	if($validator->fails()){
    		$value['slug'] = $value['slug'].'_'.date('Y_m_d_h_m_s');
    		
    	}
    	$this->attributes['slug'] = str_slug($value['slug']);
    }
}
