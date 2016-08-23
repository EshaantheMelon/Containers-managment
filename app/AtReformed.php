<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class AtReformed extends Model
{
    protected $fillable = ['date', 'location','user_id', 'cost'];

    public function getDates()
    {
        return ['date'];
    }

    // Date format
    public function setDateAttribute($value)
    {
        $this->attributes['date'] = Carbon::createFromFormat('d-m-Y', $value);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function position() {
        return $this->belongsTo(Position::class);
    }

}
