<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class AtDepot extends Model
{
    public $fillable = ['date_in', 'user_id', 'status', 'depot_id',  'loss_date', 'loss_cause', 'reparation_date',
        'reparation_cost', 'reparation_provider', 'reparation_reference_invoice'];

    protected $dates = ['date_in', 'loss_date', 'reparation_date'];

    public function setDateInAttribute($value)
    {
        $this->attributes['date_in'] = Carbon::createFromFormat('d-m-Y', $value);
    }

    public function setLossDateAttribute($value)
    {
        if (strlen($value)) {
            $this->attributes['loss_date'] = Carbon::createFromFormat('d-m-Y', $value);
        } else {
            $this->attributes['loss_date'] = null;
        }
    }

    public function setReparationDateAttribute($value)
    {
        if (strlen($value)) {
            $this->attributes['reparation_date'] = Carbon::createFromFormat('d-m-Y', $value);
        } else {
            $this->attributes['reparation_date'] = null;
        }
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function position() {
        return $this->belongsTo(Position::class);
    }

    public function depot(){
        return $this->belongsTo(Depot::class);
    }
}
