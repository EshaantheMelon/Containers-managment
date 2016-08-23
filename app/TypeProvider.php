<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeProvider extends Model
{
    //
    public function providers(){
        return $this->hasMany(Provider::class);
    }
}
