<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vessel extends Model
{
    protected $fillable = ['vessel', 'type', 'built_country', 'built_year', 'flag', 'class', 'owners', 'imo_number',
        'length_overall', 'length_between', 'breadth_moulded', 'depth_moulded', 'summer_draught', 'dwt_summer_draft',
        'light_weight', 'draft_displacement', 'grt', 'nrt', 'teu_capacity', 'feu_capacity', 'reefers_capacity',
        'bunkers_capacity', 'type_engine', 'cargo_gear', 'speed', 'consumption', 'hfo', 'lsfo', 'mgo', 'mdo',
        'capacity_trailer', 'number_gear', 'capacity_gear'];

    public function travels()
    {
        return $this->hasMany(Travel::class);
    }
}
