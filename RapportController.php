<?php

namespace App\Http\Controllers;
use App\Client ;
use App\Mesure;
use Illuminate\Http\Request;
use Gate ;
class RapportController extends Controller
{

   public function  getClient(Request $request){
       $clients =client::whereBetween('created_at', [$request->start,$request->end])->get();
      
      return response()->json($clients) ;
   }



   function convert_orteps_to_html()
    {
     $client = $this->getClient();
     $output = '
    <h4> <span align="left">MAURIBOIS 2020</span>
     <span style="float:right">SUIVI ET EVALUATION</span></h4>
     <h3 align="center">LISTE MESURES DES PORTES </h3>
     <h3 align="center"> Date : '.now()->isoFormat('D-M-Y').'</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:2px;" width="8%">N°</th>
    <th style="border: 1px solid; padding:2px;" width="20%">Nom</th>
    <th style="border: 1px solid; padding:2px;" width="15%">Telephone</th>
    <th style="border: 1px solid; padding:2px;" width="20%">Type</th>
    <th style="border: 1px solid; padding:2px;" width="5%">Vendeur</th>
    <th style="border: 1px solid; padding:2px;" width="20%">Date</th>
    <th style="border: 1px solid; padding:2px;" width="5%">Observation</th>
   </tr>
     ';  
     foreach($clients as $client)
     {
       
      $output .= '
      
      <tr>
       <td style="border: 1px solid; padding:2px;text-align:center">'.$client->id.'</td>
       <td style="border: 1px solid; padding:2px;text-align:center">'.$client->name.'</td>
       <td style="border: 1px solid; padding:2px;text-align:center">'.$client->numero.'</td>
       
       <td style="border: 1px solid; padding:2px;text-align:center">'.$client->created_at->locale('fr')->isoFormat('D-M-Y').'</td>
       <th style="border: 1px solid; padding:2px;" width="20%"> </th>
      </tr>
      ';
    
     }
     $output .= '</table>';
     return $output;
    }
}    