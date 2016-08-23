<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    protected $fillable = [
        'number', 'validity', 'client_id', 'position_id','commodity', 'imdg', 'onu',
        'pol', 'pod', 'agent', 'type_container', 'date_relance', 'sea_freight',
        'baf', 'is', 'caf', 'ses', 'imo', 'condition', 'confirmed', 'n_booking'];
}
