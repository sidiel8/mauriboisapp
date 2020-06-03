<?php
namespace App\Http\Controllers;
use App\Confirmation ;

use Illuminate\Http\Request;

class ConfirmationController extends Controller
{
    public function index($id){
        $conf = Confirmation::orderBy('created_at' , 'DESC')->where('mesure_id', $id)->get();
      //$mesures = $client->mesures() ;
        return  response()->json($conf) ;
    }
public function  store(Request $request){

         $conf = new Confirmation() ;
         $conf->mesure_id= request('mesure_id') ;
         $conf->respo= \Auth::user()->name ;
         $conf->save() ;
         return response()->json($conf) ;

}



}