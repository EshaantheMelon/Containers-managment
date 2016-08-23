<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Container extends Model
{
    protected $fillable = ['prefix', 'provider_id', 'type', 'contract_id', 'day_cost', 'capacity', 'tare', 'value',
                           'full', 'last_survey', 'date_pick_up', 'cout_pick_up', 'lieu_pick_up'];


    public function getDates()
    {
        return ['created_at', 'updated_at', 'last_survey', 'date_pick_up'];
    }

    public function setLastSurveyAttribute($value)
    {
        $this->attributes['last_survey'] = Carbon::createFromFormat('d-m-Y', $value);
    }

    public function setDatePickUpAttribute($value)
    {
        $this->attributes['date_pick_up'] = Carbon::createFromFormat('d-m-Y', $value);
    }

    /********************
    *********************/
    public function provider(){
        return $this->belongsTo(Provider::class);
    }

    public function contract() {
        return $this->belongsTo(Contract::class);
    }

    public function positions() {
        return $this->belongsToMany(Position::class, 'container_position');
    }

    public function lastPosition() {
        return $this->belongsToMany(Position::class, 'container_position')->orderBy('created_at', 'desc')->first();
    }

    public function isAvailable() {
        return $this->lastPosition();
    }
}
