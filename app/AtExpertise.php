<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class AtExpertise extends Model
{
    protected  $fillable = ['user_id','date', 'company', 'person'];

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
