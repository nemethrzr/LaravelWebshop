<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    public function getMenu()
    {
    	
    	return $this->orderBy('sort','ASC')->get();
    }
}
