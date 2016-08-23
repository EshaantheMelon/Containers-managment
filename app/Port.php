<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Port extends Model
{
    //
	protected $fillable = ['port', 'country_code', 'city_id' ];

	public function city(){
        return $this->belongsTo(City::class);
    }
	
	public function country(){
        return $this->belongsTo(Country::class, 'country_code', 'code');
    }
}
