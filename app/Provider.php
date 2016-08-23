<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    //
    public $fillable = ['name', 'social_reason', 'type_provider', 'city_id', 'country_code', 'address', 'phone',
        'fax', 'web_site', 'tax_id', 'email'];

    public function country(){
        return $this->belongsTo(Country::class, 'country_code', 'code');
    }

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function type() {
        return $this->belongsTo(TypeProvider::class);
    }

    public function contact() {
        return $this->hasOne(Contact::class);
    }

    public function payment() {
        return $this->hasOne(Payment::class);
    }
}
