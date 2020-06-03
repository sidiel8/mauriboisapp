<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Croquis extends Model
{

    protected $fillable = ['filename', 'mime', 'path', 'size'];
    
    public function mesure(){
        return $this->belongsTo('App\Mesure');
}
}
