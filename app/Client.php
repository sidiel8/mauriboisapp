<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $casts = [
        'type_mesure' => 'array'
    ] ;


    public function mesures(){
        return $this->hasMany('App\Mesure' , 'client_id' , 'id');
    }
    public function devis(){
        return $this->hasMany('App\Devis' , 'client_id' , 'id');
    }
    public function factures(){
        return $this->hasMany('App\Facture' , 'client_id' , 'id');
    }
    public function croquis(){
        return $this->hasMany('App\Croquis' , 'client_id' , 'id');
    }
}
