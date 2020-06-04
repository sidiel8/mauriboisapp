<?php

namespace App\Http\Controllers;
use App\Facture ;
use App\Devis ;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    public function index($id){
        $facture = Facture::orderBy('created_at' , 'DESC')->where('client_id', $id)->get();
      //$mesures = $client->mesures() ;
        return  response()->json($facture) ;
    }

    public function store(Request $request){
        $request->validate([
            'numero_facture' => 'required|unique:factures|max:255',
            'montant_facture' => 'required|max:255',
            'client_id' => 'required',
            'user_id'=>'required',
         ]);

         $facture = new  Facture() ;
         $facture->numero_facture = request('numero_facture') ;
         $facture->montant_facture= request('montant_facture') ;
         $facture->client_id= request('client_id') ;
         $facture->user_id= request('user_id') ;
         $facture->respo= \Auth::user()->name ;
         $facture->save() ;

         return response()->json($facture) ;

    }
    public function tousLesFactures(){
        $factures = Facture::orderBy('created_at' , 'DESC')->with(['client'])->get();
      //$mesures = $client->mesures() ;
        return  response()->json($factures) ;
    }  

   public function  delete($id){
        $fac = Facture::findOrFail($id);
        $fac->delete() ;
    }

    public function  get($id){
        $fac = Devis::where('numero_facture', $id)->orderBy('created_at' , 'DESC')->with(['client'])->get();
        
        return response()->json($fac) ;
    }
    public function ajouter(Request $request, $id)
    {
        $fact = Devis::findOrfail($id) ;
       
        $fact->date_decharge = now();
        //$fact->respo=\Auth::user()->name  ;
        $fact->save();
        $res  = Devis::where('id', $id)->orderBy('created_at' , 'DESC')->with(['client'])->get();
        $all = Devis::where('date_decharge','<>',null)->orderBy('created_at' , 'DESC')->with('client')->get();

        return response()->json([
            'res' => $res ,
            'all' => $all
        ]);

        
    }
    public function retirer(Request $request, $id)
    {
        $fact = Devis::findOrfail($id) ;
       
        $fact->date_decharge = NULL;
        //$fact->respo=\Auth::user()->name  ;
        $fact->save();
        $res  = Devis::where('id', $id)->orderBy('created_at' , 'DESC')->with(['client'])->get();
     
        $all  = Devis::where('date_decharge','<>',null)->orderBy('created_at' , 'DESC')->with('client')->get();

        return response()->json([
            'res' => $res ,
            'all' => $all
        ]);

        
    }
}