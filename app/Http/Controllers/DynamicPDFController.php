<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use App\Mesure ;
class DynamicPDFController extends Controller
{
    function portes()
    {
     $mesures = $this->get_portes();
     return view('dynamic_pdf')->with('mesures', $mesures);
    }
    function autres_mesures()
    {
     $mesures = $this->get_mesures();
     return view('dynamic_pdf')->with('mesures', $mesures);
    }
    function get_portes()
    {
     $mesures = Mesure::orderBy('id' , 'ASC')->where('type','portes')->with(['client' , 'confirmations'])->get();
         
     return $mesures;
    }
    function get_mesures()
    {
     $mesures = Mesure::orderBy('client_id' , 'ASC')->where('type','<>','portes')->with(['client' , 'confirmations'])->get();
         
     return $mesures;
    }
    function pdf_portes()
    {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_portes_to_html());
     return $pdf->stream();
    }
    function pdf_mesures()
    {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_mesures_to_html());
     return $pdf->stream();
    }

    function convert_portes_to_html()
    {
     $mesures = $this->get_portes();
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
     foreach($mesures as $mesure)
     {
        if($mesure->confirmations->count()==0){
      $output .= '
      
      <tr>
       <td style="border: 1px solid; padding:2px;text-align:center">'.$mesure->id.'</td>
       <td style="border: 1px solid; padding:2px;text-align:center">'.$mesure->client->name.'</td>
       <td style="border: 1px solid; padding:2px;text-align:center">'.$mesure->client->numero.'</td>
       <td style="border: 1px solid; padding:2px;text-align:center">'.$mesure->type.'</td>
       <td style="border: 1px solid; padding:2px;text-align:center">'.$mesure->client->vendeur.'</td>
       <td style="border: 1px solid; padding:2px;text-align:center">'.$mesure->created_at->locale('fr')->isoFormat('D-M-Y').'</td>
       <th style="border: 1px solid; padding:2px;" width="20%"> </th>
      </tr>
      ';
     }
     }
     $output .= '</table>';
     return $output;
    }






    // Listes des tous les mesures -- sauf portes 
    function convert_mesures_to_html()
    {
     $mesures = $this->get_mesures();
     $output = '
    <h4> <span align="left">MAURIBOIS 2020</span>
     <span style="float:right">SUIVI ET EVALUATION</span></h4>
     <h3 align="center">LISTE DES  MESURES </h3>
     <h3 align="center"> Date : '.now()->isoFormat('D-M-Y').'</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:2px;" width="8%">N°</th>
    <th style="border: 1px solid; padding:2px;" width="15%">Nom</th>
    <th style="border: 1px solid; padding:2px;" width="15%">Telephone</th>
    <th style="border: 1px solid; padding:2px;" width="15%">Type</th>
    <th style="border: 1px solid; padding:2px;" width="15%">Date</th>
    <th style="border: 1px solid; padding:2px;" width="5%">Observation</th>
   </tr>
     ';  
     foreach($mesures as $mesure)
     {
        if($mesure->confirmations->count()==0){
      $output .= '
      <tr>
       <td style="border: 1px solid; padding:2px;text-align:center">'.$mesure->id.'</td>
       <td style="border: 1px solid; padding:2px;text-align:center">'.$mesure->client->name.'</td>
       <td style="border: 1px solid; padding:2px;text-align:center">'.$mesure->client->numero.'</td>
       <td style="border: 1px solid; padding:2px;text-align:center">'.$mesure->type.'</td>
       <td style="border: 1px solid; padding:2px;text-align:center">'.$mesure->created_at->locale('fr')->isoFormat('D-M-Y').'</td>
       <th style="border: 1px solid; padding:2px;" width="20%"> </th>
      </tr>
      ';
     }
    }

     $output .= '</table>';
     return $output;
    }
}
