<?php

namespace App\Http\Controllers;
use App\Mesure ;
use App\Confirmation ;
use Illuminate\Http\Request;

class MesureController extends Controller
{
    public function index($id){
        $mesures = Mesure::orderBy('created_at' , 'DESC')->where('client_id', $id)->with(['confirmations'])->get();
      //$mesures = $client->mesures() ;
        return  response()->json($mesures) ;
    }

    public function store(Request $request){
        $request->validate([
            'type' => 'required|max:255',
            'client_id' => 'required',
         ]);

         $mesure = new  Mesure() ;
         $mesure->type = request('type') ;
         $mesure->client_id= request('client_id') ;
         $mesure->respo=\Auth::user()->name  ;
         $mesure->save() ;

         return response()->json($mesure) ;


    }

    public function tousLesMesures(){
        $mesures = Mesure::orderBy('created_at' , 'DESC')->with(['client' , 'confirmations'])->get();
      //$mesures = $client->mesures() ;
        return  response()->json($mesures) ;
    }
    public function tousLesMesuresActiu(){
      $mesures = Mesure::orderBy('created_at' , 'DESC')->with(['client' , 'confirmations'])->get();
    //$mesures = $client->mesures() ;
      return  response()->json($mesures) ;
  }

 

  public function  delete($id){

    $mesure = Mesure::findOrFail($id);
    $conf = Confirmation::where('mesure_id', $id);
    $conf->delete();
    $mesure->delete() ;
}
}