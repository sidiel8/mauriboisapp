<?php

namespace App\Http\Controllers;
use App\Client ;
use App\Mesure;
use App\Confirmation;
use App\User;
use App\Croquis;
use Illuminate\Http\Request;
use Gate ;
class RapportController extends Controller
{

   public function  getClient(Request $request){
    $devisEnRetar = Mesure::whereHas('croquis')->with('client')->get();
     $mrs =Mesure::whereBetween('created_at', [$request->start,$request->end])->get();
     $croquis =Croquis::whereBetween('created_at', [$request->start,$request->end])->get();
    $mesd =Mesure::select('type', Mesure::raw('count(*) as total'))->whereBetween('created_at', [$request->start,$request->end])->groupBy('type') ->get();
    //$mesuresgrp= Mesure::all()->groupBy('type')->;
    $croquisM=Mesure::with('client')->where('type','<>','portes')->whereHas('confirmations')->doesnthave('croquis')->get();
    $confirmations =Confirmation::whereBetween('created_at', [$request->start,$request->end])->with('mesure')->get();
    $client=Mesure::whereBetween('created_at', [$request->start,$request->end])->where('type','<>','portes')->whereHas('confirmations')->groupBy('client_id')->get()->count() ;
    $mesureR=Mesure::doesntHave('confirmations')->count() ;
    $portesR=Mesure::where('type','portes')->doesnthave('confirmations')->count();
    $clientR=Mesure::where('type','<>','portes')->doesnthave('confirmations');
    $resM =Mesure::with('confirmations','croquis')->get();
    $croquisWaiting=Mesure::where('type','<>','portes')->whereHas('confirmations')->doesnthave('croquis');

    //$user->clients->whereBetween('created_at', ['2020-06-01','2020-06-04'])
    $users = User::all();
    $clients =Client::whereBetween('created_at', [$request->start,$request->end])->get();  
    $output = '<div style="padding:5px 25px">
   <h4> <span align="left">MAURIBOIS 2020</span>
    <b align="center"><h2 align="center">تقرير</h2></b>
    <h3 align="center"> يحتوي النقرير التالي علي المعطيات بين تاريخي </h3>
    <p  align="center"style="font-size: 18px" dir="rtl"> '.$request->start.'   و  '.$request->end.'  </p>
    <b style="float:right ;border-bottom:solid 2px black"> الزبناء </b>
    <br>
    <ul class="list-group">
    <li class="list-group-item d-flex justify-content-between align-items-center"  dir="rtl" style="border:1px solid black; padding: 5px 20px" >
    <b style="float:right ; padding-right:25px" >   عدد الزبنء الجدد </b>
      <span class="badge badge-primary " style="float:left">'.$clients->count().'</span>
   
    </li>
  </ul>
  <ul class="list-group"  style="padding: 2px 100px">
'; foreach($users as $user)
{
  if($user->clients->whereBetween('created_at', [$request->start,$request->end])->count()!='0'){
 $output .= '
 
 

 
  
 <li class="list-group-item d-flex justify-content-between align-items-center"  dir="rtl" style="border-bottom:1px solid black; " >
 <b style="float:right ; padding-right:15px" > '.$user->name.'  </b>
   <span class="badge badge-primary " style="float:left">'.$user->clients->whereBetween('created_at', [$request->start,$request->end])->count().'</span>

 </li>



 ';
  }
} ;
foreach($devisEnRetar as $devis)
{
 $output .= '
 
 
 Deviiiiiiiiiiiiiiiiiiiiiis
 
 
 <li class="list-group-item d-flex justify-content-between align-items-center"  dir="rtl" style="border-bottom:1px solid black; margin: 2px 20px" >
 <b style="float:right ; padding-right:5px " > '.$devis->type.'  </b>
   <span class="badge badge-primary " style="float:left">'.$devis->client->name . $devis->client->numero .'</span>

 </li>
 <br>



 ';

} ;
$output .= '
</ul>
<br>
<b style="float:right ; border-bottom:solid 2px black"> القياسات </b>
<br>

<ul class="list-group">
<li class="list-group-item d-flex justify-content-between align-items-center"  dir="rtl" style="border:1px solid black; padding: 5px 20px" >
<b style="float:right ; padding-right:5px" >   عدد القياسات التي تم طلبها </b>

  <span class="badge badge-primary " style="float:left">'.$mrs->count().'</span>
       
</li>
</ul>
<ul class="list-group"  style="padding: 2px 100px">
';

foreach($mesd as $m)
{
 $output .= '
 
 

 
 
 <li class="list-group-item d-flex justify-content-between align-items-center"  dir="rtl" style="border-bottom:1px solid black; margin: 2px 20px" >
 <b style="float:right ; padding-right:5px " > '.$m->type.'  </b>
   <span class="badge badge-primary " style="float:left">'.$m->total.'</span>

 </li>
 <br>



 ';

} ;


$output .='</ul>
<ul class="list-group">
<li class="list-group-item d-flex justify-content-between align-items-center"  dir="rtl" style="border:1px solid black; padding: 5px 20px" >
<b style="float:right ; padding-right:5px" >   قياسات  تم أخذها </b>

  <span class="badge badge-primary " style="float:left">'.$confirmations->count().'</span>
       
</li>

</ul> ';

$portes= 0;
$autres=0;
foreach($confirmations as $c)
{

 if($c->mesure->type=='portes'){
   $portes+= 1;
  }else{
    $autres+= 1;
  }
} ;
  $output .= '
 
  <ul class="list-group"  style="padding: 2px 100px">

 
 
 <li class="list-group-item d-flex justify-content-between align-items-center"  dir="rtl" style="border-bottom:1px solid black; margin: 2px 20px" >
 <b style="float:right ; padding-right:5px ;padding-bottom:5px" > الأبواب  </b>
   <span class="badge badge-primary " style="float:left">'. $portes .'</span>

 </li>
   <br>
 <li class="list-group-item d-flex justify-content-between align-items-center"  dir="rtl" style="border-bottom:1px solid black; margin: 2px 20px" >
 <b style="float:right ; padding-right:5px ;padding-bottom:5px" > أخرى  </b>
   <span class="badge badge-primary " style="float:left"> ' .  $client  . '   زبون</span>
   <span class="badge badge-primary " style="float:left"> ' . $autres . '   قياس لصالح  </span>
 </li>
</ul>


 ';
 
  


$output .='<ul class="list-group">
<li class="list-group-item d-flex justify-content-between align-items-center"  dir="rtl" style="border:1px solid black; padding: 5px 20px" >
<b style="float:right ; padding-right:5px" >   قياسات  في الانتظار </b>

  <span class="badge badge-primary " style="float:left">'. $mesureR .'</span>
       
</li>

</ul>


<ul class="list-group"  style="padding: 2px 100px">

 
 
<li class="list-group-item d-flex justify-content-between align-items-center"  dir="rtl" style="border-bottom:1px solid black; margin: 2px 20px" >
<b style="float:right ; padding-right:5px ;padding-bottom:5px" > الأبواب  </b>
  <span class="badge badge-primary " style="float:left">'. $portesR .'</span>

</li>
  <br>
  <li class="list-group-item d-flex justify-content-between align-items-center"  dir="rtl" style="border-bottom:1px solid black; margin: 2px 20px" >
  <b style="float:right ; padding-right:5px ;padding-bottom:5px" > أخرى  </b>
  <span class="badge badge-primary " style="float:left"> ' . $clientR->get()->groupBy('client_id')->count()     . '   زبون</span>
  <span class="badge badge-primary " style="float:left"> ' .  $clientR->get()->count()  . '   قياس لصالح  </span>
 
</li>
</ul>

<br>
<b style="float:right ; border-bottom:solid 2px black"> التصاميم </b>
<br>

' ;
$output .='<ul class="list-group">
<li class="list-group-item d-flex justify-content-between align-items-center"  dir="rtl" style="border:1px solid black; padding: 5px 20px" >
<b style="float:right ; padding-right:5px" >   تصاميم تم أستلامها </b>
<span class="badge badge-primary " style="float:left">  <b>' .$croquis->count(). '</b> تصميم لصالح '. $croquis->groupBy('client_id')->count(). '   زبون  </span>
       
</li>

</ul>';

$output .='<ul class="list-group">
<li class="list-group-item d-flex justify-content-between align-items-center"  dir="rtl" style="border:1px solid black; padding: 5px 20px" >
<b style="float:right ; padding-right:5px" >تصاميم  في الانتظار </b>

<span class="badge badge-primary " style="float:left">  <b>' .$croquisWaiting->count(). '</b> تصميم لصالح '. $croquisWaiting->groupBy('client_id')->get()->count(). '   زبون  </span>
       
</li>

</ul>';



$rapp= ' <div style="padding: 40px 2% ;font-size: 20px"><table style="font-size: 20px"   width="80%">';
$rapp.='<b style="float:center ;border:2px solid black">'.$croquisM->count().' Croquis  En Attente</b> <br><br>' ;
$rapp.= '<thead>
  
  <tr style="border:2px solid black">
    <th style="float:left">Nom Cleint
    </th>
    <th style="">Numero
    </th>
    <th style="">Mesures
    </th>
    <th style="float:right">Vendeur 
    </th>    </tr>
    </thead> <tbody>';
foreach($croquisM as $m)
{
 $rapp .= '
 
 

 
 
 <tr  style="padding-bottom:6px">
 <td style="border:2px solid black" >'.$m->client->name .'</td>
 <td style="border:2px solid black" >'.$m->client->numero.'</td>
 <td style="border:2px solid black">'.$m->type.'</td>
 <td style="border:2px solid black">'.$m->client->vendeur.'</td>
 </tr>



 ';

} 
$rapp.=' 
</tbody>
</table> <div>';  
   
      
  
    return $rapp;
}



 
   



   

}    

   

