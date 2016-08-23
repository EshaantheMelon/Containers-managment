<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class AtPOL extends Model
{
    public $table = 'at_pols';

    public $fillable = ['date_in', 'user_id','port_id'];

	protected $dates = ['date_in'];

    // Date format
    public function setDateInAttribute($value)
    {
        $this->attributes['date_in'] = Carbon::createFromFormat('d-m-Y', $value);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function position() {
        return $this->belongsTo(Position::class);
    }

    public function port() {
        return $this->belongsTo(Port::class);
    }
}
