<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class AtPOD extends Model
{
    public $table = 'at_pods';

    public $fillable = ['date_unloading','user_id', 'port_id'];

    public function getDates()
    {
        return ['date_unloading'];
    }

    // Date format
    public function setDateUnloadingAttribute($value)
    {
        $this->attributes['date_unloading'] = Carbon::createFromFormat('d-m-Y', $value);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function position() {
        return $this->belongsTo(Position::class);
    }

    public function port(){
        return $this->belongsTo(Port::class);
    }

}
