<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mesure extends Model
{
    public function client(){
        return $this->belongsTo(Client::class ,'client_id');
}

public function confirmations(){
    return $this->hasMany(Confirmation::class , 'mesure_id' ,);
}

public function croquis(){
    return $this->hasMany(Croquis::class , 'mesure_id' ,);
}
}