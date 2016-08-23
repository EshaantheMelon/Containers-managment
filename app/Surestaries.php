<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surestaries extends Model
{
    protected $fillable = ['port_id', 'container_id', 'position_id', 'free_time',
        'tariff', 'at', 'id_at'];

    public function port() {
        return $this->belongsTo(Port::class);
    }

    public function position() {
        return $this->belongsTo(Position::class);
    }
}
