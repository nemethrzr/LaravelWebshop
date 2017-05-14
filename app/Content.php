<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
	protected $fillable = ['menu','description','slug','sort'];

    public function getMenu()
    {
    	
    	return $this->orderBy('sort','ASC')->get();
    }


    public function setSlugAttribute($value){
    	$this->attributes['slug'] = str_slug($value);
    }
}
