<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Decharge ;
use App\Facture;
use App\Devis;
class DechargeController extends Controller
{  
    public function index(){
        $decharges = Devis::where('date_decharge','<>',null)->orderBy('id' , 'DESC')->with('client')->get();
      //$mesures = $client->mesures() ;
        return  response()->json($decharges) ;
    }


    public function store(Request $request)
    {
        // return $request ;
      
     $request->validate([
            'name' => 'required|max:255',
            'numero' => 'required|max:255',
            'numero_facture' => 'required|max:255',
            'vendeur' => 'required|max:255',
            
        ]);
      $decharge = new Decharge() ;
         $decharge->name=request('name')   ;
         $decharge->numero=request('numero')   ;
         $decharge->numero_facture=request('numero_facture')   ;
         $decharge->vendeur = request('vendeur')    ;     // \Auth::user()->nv ;
         $decharge->respo=\Auth::user()->name  ;
       
         $decharge->save() ;
         // return response()->json($decharge);
        
      if($decharge){
               return $this->refresh() ;
            }  
   
             
    }


    private function refresh(){
        $decharges = Decharge::orderBy('created_at' , 'DESC')->get();
         return response()->json($decharges);
    }
}
