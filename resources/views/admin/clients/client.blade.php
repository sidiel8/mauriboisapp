@extends('layouts.app')

@section('content')
@include('admin.admin-utilities.admin')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-body">
              
                  
                <div class="row">
                  <div class="col-md-4">
                    <img src="{{ asset('img/u.svg') }}" class="rounded " style="" alt="...">
                <b>{{$client->name}}</b> 
                </div>
                <div class="col-md-8">
                  <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Telephone
                    <span class=" badge-primary badge-pill ">{{$client->numero}}</span>
                      </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Vendeur
                    <span class=" badge-primary badge-pill">{{$client->vendeur == '11' ? 'reclamation' : $client->vendeur}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Quartier
                    <span class=""> {{$client->quartier}}</span>
                    </li>
                </div>
                </div>  
                  
                  <hr>

                  <div class="row">
                    
                     <div class="col-md-6">
                      <b>Mesures</b>
                      <ul class="list-group">
                       @foreach ($client->type_mesure as $type)
                         <li class="list-group-item  ">
                                <span class=" badge-warning badge-pill float-left">  {{$type}}  </span> 
                                <span class=" ">   </span>
                                <span class=" btn btn-success  float-lg-right">  date </span>
                        @endforeach
                        </li>
                      </ul>

                      <b>Qroquis</b>
                      <ul class="list-group">
                       @foreach ($client->type_mesure as $type)
                         <li class="list-group-item  ">
                                <span class=" badge-warning badge-pill float-left">  {{$type}}  </span> 
                                <span class=" ">   </span>
                                <span class=" btn btn-success  float-lg-right">  date </span>
                        @endforeach
                        </li>
                      </ul>
                    </div>
                     
                    <div class="col-md-6">
                      <b>Devis</b>
                      <ul class="list-group">
                      
                          <li class="list-group-item  ">
                            <span class=" badge-danger badge-pill float-right">  {{$client->numero_devis ==Null ? 'Pas de Devis' : $client->numero_devis}}  </span> 
                     
                         </li>
                       </ul>

                       <b>Factures</b>
                      <ul class="list-group">
                      
                          <li class="list-group-item  ">
                            <span class=" badge-danger badge-pill float-left">  {{$client->numero_devis ==Null ? 'Pas de Factures' : $client->numero_devis}}  </span> 
                     
                         </li>
                       </ul>
                    </div>
                  </div>  
            </div>
           
        </div>
    </div>
    
   
</div>

@endsection