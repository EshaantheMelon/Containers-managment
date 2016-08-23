<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    protected $fillable = ['number', 'vessel_id', 'date_enter', 'port_id', 'date_out', 'bunkers',
                           'start_travel_date', 'start_travel_quantity', 'end_travel_date', 'end_travel_quantity',
                           'bunkers_delivery_quantity', 'bunkers_delivery_date', 'date_hire_start', 'date_hire_end'];



    public function getDates()
    {
        return ['created_at', 'updated_at', 'bunkers_delivery_date', 'date_hire_start', 'date_hire_end',
            'end_travel_date', 'start_travel_date', 'date_enter', 'date_out'];
    }

    public function setBunkersDeliveryDateAttribute($value)
    {
        $this->attributes['bunkers_delivery_date'] = Carbon::createFromFormat('d-m-Y', $value);
    }
    public function setDateHireStartAttribute($value)
    {
        $this->attributes['date_hire_start'] = Carbon::createFromFormat('d-m-Y', $value);
    }
    public function setDateHireEndAttribute($value)
    {
        $this->attributes['date_hire_end'] = Carbon::createFromFormat('d-m-Y', $value);
    }
    public function setEndTravelDateAttribute($value)
    {
        $this->attributes['end_travel_date'] = Carbon::createFromFormat('d-m-Y', $value);
    }
    public function setStartTravelDateAttribute($value)
    {
        $this->attributes['start_travel_date'] = Carbon::createFromFormat('d-m-Y', $value);
    }
    public function setDateEnterAttribute($value)
    {
        $this->attributes['date_enter'] = Carbon::createFromFormat('d-m-Y', $value);
    }
    public function setDateOutAttribute($value)
    {
        $this->attributes['date_out'] = Carbon::createFromFormat('d-m-Y', $value);
    }


    public function vessel()
    {
        return $this->belongsTo(Vessel::class, 'vessel_id','id');
    }

    public function port()
    {
        return $this->belongsTo(Port::class, 'port_id','id');
    }
}
