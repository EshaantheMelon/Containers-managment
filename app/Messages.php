<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    //
    protected $fillable = ["id", 'pic', "client_id", "user_id", 'send',"message"];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function client() {
        return $this->belongsTo(Client::class);
    }
}
