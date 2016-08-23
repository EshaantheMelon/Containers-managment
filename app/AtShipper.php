<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class AtShipper extends Model
{
    public $fillable = ['date_out_depot', 'user_id','booking', 'vessel_id', 'travel_id', 'name_shipper', 'cin_driver', 'id_truck'];

    public function getDates()
    {
        return ['date_out_depot'];
    }

    // Date format
    public function setDateOutDepotAttribute($value)
    {
        $this->attributes['date_out_depot'] = Carbon::createFromFormat('d-m-Y', $value);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function position() {
        return $this->belongsTo(Position::class);
    }

    public function vessel() {
        return $this->belongsTo(Vessel::class);
    }

    public function travel() {
        return $this->belongsTo(Travel::class);
    }
}
