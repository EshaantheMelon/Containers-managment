<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AtLongStay extends Model
{
    protected $fillable = ['user_id','cause'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function position() {
        return $this->belongsTo(Position::class);
    }
}
