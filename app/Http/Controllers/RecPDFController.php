<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use App\Reclamation ;
class RecPDFController extends Controller
{
   
   
    function get_pvc()
    {
     $pvc = Reclamation::orderBy('id' , 'ASC')->where('category','PVC')->get();
         
     return $pvc;
    }
    function get_bois()
    {
     $bois = Reclamation::orderBy('id' , 'ASC')->where('category','Bois')->get();
         
     return $bois;
    }
    function pdf_pvc()
    {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_pvc_to_html());
     return $pdf->stream();
    }
    function pdf_bois()
    {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_bois_to_html());
     return $pdf->stream();
    }

    function convert_pvc_to_html()
    {
     $pvcs = $this->get_pvc();
     $output = '
    <h4> <span align="left">MAURIBOIS 2020</span>
     <span style="float:right">SUIVI ET EVALUATION</span></h4>
     <h3 align="center">LISTE RECLAMATION PVC</h3>
     <h3 align="center"> Date : '.now()->isoFormat('D-M-Y').'</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:2px;" width="8%">N°</th>
    <th style="border: 1px solid; padding:2px;" width="20%">Nom</th>
    <th style="border: 1px solid; padding:2px;" width="15%">Telephone</th>
    <th style="border: 1px solid; padding:2px;" width="20%">Type REC</th>
    <th style="border: 1px solid; padding:2px;" width="20%">Date</th>
    <th style="border: 1px solid; padding:2px;" width="5%">Observation</th>
   </tr>
     ';  
     foreach($pvcs as $pvc)
     {
        if($pvc->date_reparation==NULL){
      $output .= '
      
      <tr>
       <td style="border: 1px solid; padding:2px;text-align:center">'.$pvc->id.'</td>
       <td style="border: 1px solid; padding:2px;text-align:center">'.$pvc->name.'</td>
       <td style="border: 1px solid; padding:2px;text-align:center">'.$pvc->numero.'</td>
       <td style="border: 1px solid; padding:2px;text-align:center">'.$pvc->type.'</td>
       <td style="border: 1px solid; padding:2px;text-align:center">'.$pvc->created_at->locale('fr')->isoFormat('D-M-Y').'</td>
       <th style="border: 1px solid; padding:2px;" width="20%"> </th>
      </tr>
      ';
     }
     }
     $output .= '</table>';
     return $output;
    }






    // Listes des tous les mesures -- sauf portes 
    function convert_bois_to_html()
    {
        $bois = $this->get_bois();
        $output = '
       <h4> <span align="left">MAURIBOIS 2020</span>
        <span style="float:right">SUIVI ET EVALUATION</span></h4>
        <h3 align="center">LISTE RECLAMATION BOIS</h3>
        <h3 align="center"> Date : '.now()->isoFormat('D-M-Y').'</h3>
        <table width="100%" style="border-collapse: collapse; border: 0px;">
         <tr>
       <th style="border: 1px solid; padding:2px;" width="8%">N°</th>
       <th style="border: 1px solid; padding:2px;" width="20%">Nom</th>
       <th style="border: 1px solid; padding:2px;" width="15%">Telephone</th>
       <th style="border: 1px solid; padding:2px;" width="20%">Type REC</th>
       <th style="border: 1px solid; padding:2px;" width="20%">Date</th>
       <th style="border: 1px solid; padding:2px;" width="5%">Observation</th>
      </tr>
        ';  
        foreach($bois as $b)
        {
           if($b->date_reparation==NULL){
         $output .= '
         
         <tr>
          <td style="border: 1px solid; padding:2px;text-align:center">'.$b->id.'</td>
          <td style="border: 1px solid; padding:2px;text-align:center">'.$b->name.'</td>
          <td style="border: 1px solid; padding:2px;text-align:center">'.$b->numero.'</td>
          <td style="border: 1px solid; padding:2px;text-align:center">'.$b->type.'</td>
          <td style="border: 1px solid; padding:2px;text-align:center">'.$b->created_at->locale('fr')->isoFormat('D-M-Y').'</td>
          <th style="border: 1px solid; padding:2px;" width="20%"> </th>
         </tr>
         ';
        }
        }
        $output .= '</table>';
        return $output;
       }
}
