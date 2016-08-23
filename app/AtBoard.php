<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class AtBoard extends Model
{
    public $fillable = ['date_loading'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function position() {
        return $this->belongsTo(Position::class);
    }

    public function getDates()
    {
        return ['date_loading'];
    }

    // Date format
    public function setDateLoadingAttribute($value)
    {
        $this->attributes['date_loading'] = Carbon::createFromFormat('d-m-Y', $value);
    }
}
