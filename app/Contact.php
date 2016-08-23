<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $fillable = ['pic', 'job', 'direct_phone', 'mobil1', 'mobil2', 'email'];

    public function provider()
    {
        return $this->belongsTo(Contact::class);
    }

    public function client()
    {
        return $this->belongsTo(Contact::class);
    }

    public function depot()
    {
        return $this->belongsTo(Contact::class);
    }
}
