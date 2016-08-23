<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class AtConsignee extends Model
{
    public $fillable = ['date_out_port', 'user_id','name_consignee'];

    public function getDates()
    {
        return ['date_out_port'];
    }

    public function setDateOutPortAttribute($value)
    {
        $this->attributes['date_out_port'] = Carbon::createFromFormat('d-m-Y', $value);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function position() {
        return $this->belongsTo(Position::class);
    }

}
