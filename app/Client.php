<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    public $fillable = ['name', 'social_reason', 'user_id','type_client', 'city_id', 'country_code', 'address', 'phone', 'fax',
        'web_site', 'tax_id', 'email'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function country(){
        return $this->belongsTo(Country::class, 'country_code', 'code');
    }

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function contact() {
        return $this->hasOne(Contact::class);
    }

    public function payment() {
        return $this->hasOne(Payment::class);
    }
}
