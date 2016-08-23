<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillLading extends Model
{
    public $table = 'bill_ladings';

    protected $fillable = ['number', 'shipper_id', 'user_id','consignee_id', 'notify', 'place_of_loading', 'port_of_loading_pol',
                           'place_of_delivery_pod', 'place_of_delivery', 'number_original_bls', 'number_packages',
                           'position_id', 'payment_freight', 'vessel_id', 'travel_id'];


    public function shipper() {
        return $this->belongsTo(AtShipper::class);
    }

    public function consignee() {
        return $this->belongsTo(AtConsignee::class);
    }

    public function vessel() {
        return $this->belongsTo(Vessel::class);
    }

    public function travel() {
        return $this->belongsTo(Travel::class);
    }

    public function position() {
        return $this->belongsTo(Position::class);
    }
}
