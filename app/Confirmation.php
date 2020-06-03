<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Confirmation extends Model
{
    public function mesures(){
        return $this->belongsToMany(Confirmation::class ,'mesure_id') ;
    }
}
