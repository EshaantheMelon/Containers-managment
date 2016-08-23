<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $fillable = ['bank_account_n', 'bank', 'swift', 'payment_conditions', 'address_invoices'];
    public function provider()
    {
        return $this->belongsTo(Payment::class);
    }

    public function client()
    {
        return $this->belongsTo(Payment::class);
    }

    public function depot()
    {
        return $this->belongsTo(Payment::class);
    }
}
