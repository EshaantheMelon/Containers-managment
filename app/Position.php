<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = ['position', 'end', 'last_position', 'last_date', 'at', 'id_at'];

    protected $casts = [
        'end' => 'boolean'
    ];
    protected $dates = ['last_position'];

    public function bl() {
        return $this->hasOne(BillLading::class);
    }

    public function quotation() {
        return $this->hasOne(Quotation::class, 'position_id', 'id');
    }

    public function surestaries() {
        return $this->hasOne(Surestaries::class, 'position_id', 'id');
    }
    
    public function containers() {
        return $this->belongsToMany(Container::class, 'container_position');
    }

    public function atDepot() {
        return $this->hasMany(AtDepot::class);
    }

    public function atPol() {
        return $this->hasMany(AtPOL::class);
    }

    public function atPod() {
        return $this->hasMany(AtPOD::class);
    }

    public function atShipper() {
        return $this->hasMany(AtShipper::class);
    }

    public function atBoard() {
        return $this->hasMany(AtBoard::class);
    }

    public function atConsignee() {
        return $this->hasMany(AtConsignee::class);
    }

    public function atExpertise() {
        return $this->hasMany(AtExpertise::class);
    }

    public function atLongStay() {
        return $this->hasMany(AtLongStay::class);
    }

    public function atReformed() {
        return $this->hasMany(AtReformed::class);
    }

    public function atCustomsSeizure() {
        return $this->hasMany(AtCustomsSeizure::class);
    }
}
