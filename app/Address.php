<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['zipcode', 'street', 'city','street_number','user_id','type'];

    public function user()
    {
    	return $this->hasMany('App\User');
    }
}
