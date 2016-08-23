<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = [ 'reference', 'client_id','type', 'date_on', 'date_off'];

    public function client() {
        return $this->belongsTo(Client::class);
    }

    public function containers() {
        return $this->hasMany(Container::class);
    }

    public function getDates()
    {
        return ['created_at', 'updated_at', 'date_on', 'date_off'];
    }

    public function setDateOnAttribute($value)
    {
        $this->attributes['date_on'] = Carbon::createFromFormat('d-m-Y', $value);
    }

    public function setDateOffAttribute($value)
    {
        $this->attributes['date_off'] = Carbon::createFromFormat('d-m-Y', $value);
    }

}
