<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class AtCustomsSeizure extends Model
{
    protected $fillable = ['date','user_id', 'cause'];

    public  function getDates()
    {
        return ['date'];
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function position() {
        return $this->belongsTo(Position::class);
    }

    // Date format
    public function setDateAttribute($value)
    {
        $this->attributes['date'] = Carbon::createFromFormat('d-m-Y', $value);
    }
}
