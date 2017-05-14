<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Validator;

class Content extends Model
{
	protected $fillable = ['menu','description','slug','sort'];

    public function getMenu()
    {
    	
    	return $this->orderBy('sort','ASC')->get();
    }


    public function setSlugAttribute($value){
    	$value = ['slug'=>str_slug($value)];
    	$validator = Validator::make($value,[
    		'slug'=>'unique:contents'
    		]);
    	if($validator->fails()){
    		$value['slug'] = $value['slug'].'_'.date('Y_m_d_h_m_s');
    	}
    	$this->attributes['slug'] = str_slug($value['slug']);
    }
}
