<?php

namespace App\Http\Controllers;
use App\Devis ;

use Illuminate\Http\Request;

class DevisController extends Controller
{
    public function index($id){
        $devis = Devis::orderBy('created_at' , 'DESC')->where('client_id', $id)->where('date_facturation',NULL)->get();
        $factures = Devis::orderBy('created_at' , 'DESC')->where('client_id', $id)->where('date_facturation','<>',NULL)->get();
      //$mesures = $client->mesures() ;
        return  response()->json([
          'devis'=>$devis,
          'factures'=>$factures
        ]) ;
    }

    public function store(Request $request){
        $request->validate([
            'numero_devis' => 'required|unique:devis|max:255',
            'montant_devis' => 'required|max:255',
            'client_id' => 'required',
            'user_id'=>'required',
         ]);

         $devis = new  Devis() ;
         $devis->numero_devis = request('numero_devis') ;
         $devis->montant_devis= request('montant_devis') ;
         $devis->client_id= request('client_id') ;
         $devis->user_id= request('user_id') ;
         $devis->respo= \Auth::user()->name ;
         $devis->save() ;

         return response()->json($devis) ;

    }
    public function tousLesDevis(){
        $devis = Devis::orderBy('created_at' , 'DESC')->where('date_facturation',NULL)->with(['client'])->get();
      //$mesures = $client->mesures() ;
        return  response()->json($devis) ;
    }
    public function tousLesFac(){
      $devis = Devis::orderBy('created_at' , 'DESC')->where('date_facturation' ,'<>',NULL)->with(['client'])->get();
    //$mesures = $client->mesures() ;
      return  response()->json($devis) ;
  }
    public function addFacture(Request $request , $id){
      $request->validate([
        'numero_facture' => 'required|unique:devis|max:255',
        
     ]);
      $devisToFac = Devis::where('numero_devis' , $id)->first();
      $devisToFac->numero_facture = request('numero_facture');
      //$devisToFac->montant_facture= request('montant_facture');
      $devisToFac->date_facturation = now();
      $devisToFac->save();
      return response()->json($devisToFac);
    }

    public function editDevis(Request $request , $id){
      $request->validate([
        'montant_devis' => 'required|max:255',
        
     ]);
      $devisEdit = Devis::where('numero_devis' , $id)->first();
      $devisEdit->montant_devis = request('montant_devis');
      //$devisToFac->montant_facture= request('montant_facture');
      
      $devisEdit->save();
      return response()->json($devisEdit);
    }


    public function  delete($id){
      $devis = Devis::findOrFail($id);
      $devis->delete() ;
  }
}