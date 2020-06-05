<?php

namespace App\Http\Controllers;
use App\Client ;
use App\Mesure;
use App\Confirmation;
use App\User;
use Illuminate\Http\Request;
use Gate ;
class RapportController extends Controller
{

   public function  getClient(Request $request){
     $allM = Mesure::all();
    $mesures =Mesure::whereBetween('created_at', [$request->start,$request->end])->get();
    $confirmations =Confirmation::whereBetween('created_at', [$request->start,$request->end])->get();
    $res =Mesure::has('confirmations')->get();

    //$user->clients->whereBetween('created_at', ['2020-06-01','2020-06-04'])
    $users = User::all();
    $clients =Client::whereBetween('created_at', [$request->start,$request->end])->get();  
    $output = '
   <h4> <span align="left">MAURIBOIS 2020</span>
    <b align="center"><h2 align="center">تقرير</h2></b>
    <h3 align="center"> يحتوي النقرير التالي علي المعطيات بين تاريخي </h3>
    <p  align="center"style="font-size: 18px" dir="rtl"> '.$request->start.'   و  '.$request->end.'  </p>
    <b style="float:right ;border-bottom:solid 2px black"> الزبناء </b>
    <br>
    <ul class="list-group">
    <li class="list-group-item d-flex justify-content-between align-items-center"  dir="rtl" style="border:1px solid black; padding: 5px 20px" >
    <b style="float:right ; padding-right:5px" >   عدد الزبنء الجدد </b>
      <span class="badge badge-primary " style="float:left">'.$clients->count().'</span>
   
    </li>
  </ul>
 
  <br>

'; foreach($users as $user)
{
 $output .= '
 
 

 
 <ul class="list-group">
 <li class="list-group-item d-flex justify-content-between align-items-center"  dir="rtl" style="border-bottom:1px solid black; margin: 2px 20px" >
 <b style="float:right ; padding-right:15px" > '.$user->name.'  </b>
   <span class="badge badge-primary " style="float:left">'.$user->clients->whereBetween('created_at', ['2020-05-28','2020-06-04'])->count().'</span>

 </li>
</ul>


 ';

} ;
$output .= '

<br>
<b style="float:right ; border-bottom:solid 2px black"> القياسات </b>
<br>

<ul class="list-group">
<li class="list-group-item d-flex justify-content-between align-items-center"  dir="rtl" style="border:1px solid black; padding: 5px 20px" >
<b style="float:right ; padding-right:5px" >   عدد القياسات التي تم طلبها </b>

  <span class="badge badge-primary " style="float:left">'.$mesures->count().'</span>
       
</li>

</ul>
<ul class="list-group">
<li class="list-group-item d-flex justify-content-between align-items-center"  dir="rtl" style="border:1px solid black; padding: 5px 20px" >
<b style="float:right ; padding-right:5px" >   قياسات  تم أخذها </b>

  <span class="badge badge-primary " style="float:left">'.$confirmations->count().'</span>
       
</li>

</ul>

<ul class="list-group">
<li class="list-group-item d-flex justify-content-between align-items-center"  dir="rtl" style="border:1px solid black; padding: 5px 20px" >
<b style="float:right ; padding-right:5px" >   قياسات  في الانتظار </b>

  <span class="badge badge-primary " style="float:left">'. $v =intval($allM->count()) - intval($res->count())  .'</span>
       
</li>

</ul>
' ;



    
  
   
   
      
  
    return $output;
   }



   function convert_orteps_to_html()
    {
     $client = $this->getClient();

       $mesures =Mesure::whereBetween('created_at', [$request->start,$request->end])->get();
       
       $output = '
      <h4> <span align="left">MAURIBOIS 2020</span>
       <b align="center"><h2 align="center">تقرير</h2></b>
       <h3 align="center"> يحتوي النقرير التالي علي المعطيات بين تاريخي </h3>
       <p  align="center"style="font-size: 18px" dir="rtl"> '.$request->start.'   و  '.$request->end.'  </p>
       <b style="float:right ;border-bottom:solid 2px black"> الزبناء </b>
       <br>
       <ul class="list-group">
       <li class="list-group-item d-flex justify-content-between align-items-center"  dir="rtl" style="border:1px solid black; padding: 5px 20px" >
       <b style="float:right ; padding-right:5px" >   عدد الزبنء الجدد </b>
         <span class="badge badge-primary " style="float:left">'.$clients->count().'</span>
      
       </li>
     </ul>
     <b style="float:right ; border-bottom:solid 2px black"> القياسات </b>
     <br>
     <ul class="list-group">
     <li class="list-group-item d-flex justify-content-between align-items-center"  dir="rtl" style="border:1px solid black; padding: 5px 20px" >
     <b style="float:right ; padding-right:5px" >   عدد القياسات التي تم طلبها </b>
       <span class="badge badge-primary " style="float:left">'.$mesures->count().'</span>
            
     </li>

   </ul>
   '; foreach($mesures as $mesure)
   {
    $output .= '
    
    

    
    <ul class="list-group">
    <li class="list-group-item d-flex justify-content-between align-items-center"  dir="rtl" style="border:1px solid black; padding: 5px 10px" >
   
      <span class="badge badge-primary " style="float:left">'.$mesure->type.'</span>
   
    </li>
    
   </ul>
    ';
   
   }
       
     
      
      
         
     
       return $output;
      }
 
   



   function convert_rapport_to_html()
    {
     $clients = $this->getClient();

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

   

