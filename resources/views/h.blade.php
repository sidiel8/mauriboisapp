@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-9">
                </div>   
                  
                <div class="col-md-3 navbar float-right">
                    
                   <div class="">
                   <button id ="" class="btn btn-primary" data-toggle="modal" data-target="#myModal"> <i class="fa fa-user-plus" ></i> Client</button>
                    </div>    
                    
                </div>
            </div>
            <div class="card">
                <div class="">
                    <nav class="navbar navbar-light bg-light">
                       
                        @can('mange') 
                        <a class="navbar-brand">Clients</a>
                        @elsecannot('mange')
                         <a class="navbar-brand">Mes Clients</a><span class=" rounded btn btn-outline-primary"> {{Auth::user()->nv}}</span>
                        @endcan
                        <form class="form-inline">
                          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        </form>
                      </nav>
                    
                    </div>
                  
                 <div class="card-body">
                  <table class="table table-striped table-sm">
                      <thead>
                        <tr>
                          
                          <th scope="col">Nom</th>
                          <th scope="col">Telephone</th>
                          @can('mange')
                          <th scope="col">Vendeur</th> 
                          @endcan
                          <th scope="col">Mesures</th>
                          <th scope="col">Qroquis</th>
                          <th scope="col">Devis</th>
                          <th scope="col">Factures</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($clients as $client)
                         
                          <tr style="">
                            <td scope="row"><b>{{$client->name}}</b></td>
                           
                            <td scope="row">{{$client->numero}}</a></td>

                            @can('mange')
                            <td scope="row" class="text-center ">{{$client->vendeur}}</a></td>
                          @endcan
                            <td scope="row">
                             @foreach ($client->type_mesure as $type)
                              <span class=" badge-warning badge-pill ">  {{$type}}  </span> 
                             @endforeach
                             
                            </td>
                            <td scope="row">
                                @foreach ($client->type_mesure as $type)
                                 <span class=" badge-warning badge-pill ">  {{$type}}  </span> 
                                @endforeach
                                
                               </td>
                            <td scope="row">{{$client->numero_devis ?? '0'}}</a></td>
                            <td scope="row">{{$client->numero_facture ?? '0'}}</a></td>
                            <td scope="row"><button class="btn btn-sm btn-primary"><span class=""><i class=" center fas fa-plus " style="color:white"></i> Devis</span></button></td>
                            <td scope="row"><button class="btn btn-sm btn-success"><span class=""><i class=" center fas fa-plus " style="color:white"></i> Facture</span></button></td>
                            <td scope="row"><a class="btn btn-sm btn-warning"><span class=""><i class=" center fas fa-edit " style="color:white"></i> </span></a></td>
                            <td scope="row"><a class="btn btn-sm btn-success"><span class=""><i class=" center fas fa-check " style="color:white"></i> </span></a></td>
                            <td scope="row"><a class="btn btn-sm btn-danger"><span class=""><i class=" center fas fa-trash-alt " style="color:white"></i> </span></a></td>

                            <!-- <td scope="row" >
                                <a class="dropdown-item" href="#"> <span class=""><i class=" center fas fa-plus "></i></span>  Ajouter un devis </a>
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                      <button class="btn btn-outline-primary dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Plus</button>
                                      <div class="dropdown-menu">
                                        <button class="dropdown-item" href="#"><span class=" btn btn-success btn-block btn-sm">Details</span></button>

                                        <div role="separator" class="dropdown-divider"></div>
                                        
                                      
                                        <a class="dropdown-item" href="#"> <span class=""><i class=" center fas fa-plus "></i></span>  Ajouter un devis </a>
                                        <a class="dropdown-item" href="#"><span class=""><i class=" center fas fa-plus "></i></span> Ajouter une facture </a>
                                       
                                        <div role="separator" class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Editer <span class="float-right"><i class=" center fas fa-edit"></i></span></a>
                                        <a class="dropdown-item" href="#">Supprimer  <span class="float-right"><i class=" center fas fa-trash bg-red"></i></span></a>
                                        
                                      </div>
                                    </div>
                                    
                                  </div>
                                  
                                  

                            </td>
                            
                      </tr> -->
                             
                          @endforeach
                       
                      </tbody>
                    </table> 
                 </div>
            </div>
        </div>
    </div>
</div>
<!-- Trigger the modal with a button -->


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     
      </div>
      <div class="modal-body">
        
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-center"><b>{{ __('Ajouter Un Nouveau Client') }}</b></div>
                          
                        <div class="card-body">
                          @if(session('msg'))
                          <div class="form-group row">
                              <div class="col-md-4"></div>
                              <div class="col-md-6 alert alert-success text-center" role="alert">
                                  {{session('msg')}}
                                </div>
                        
                          </div>
                          @endif
                          
                            <form method="POST" action="{{ route('new-client') }}">
                                @csrf
                                @if(session('msg'))
                                <div class="form-group row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-6">
                                        <p  class="form-control alert alert-success">{{session('msg')}}</p>
                               </div>
                              
                                </div>
                                @endif
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right"><b>{{ __('Nom') }}</b></label>
          
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
          
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
          
                                <div class="form-group row">
                                    <label for="numero" class="col-md-4 col-form-label text-md-right"><b>{{ __('Telephone') }}</b></label>
          
                                    <div class="col-md-6">
                                        <input id="numero" type="number" class="form-control @error('numero') is-invalid @enderror" name="numero" value="{{ old('numero') }}" required autocomplete="numero">
          
                                        @error('numero')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
          
                                <div class="form-group row">
                                    <label for="quartier" class="col-md-4 col-form-label text-md-right"><b>{{ __('Quartier') }}</b></label>
          
                                    <div class="col-md-6">
                                        <input id="quartier" type="text" class="form-control @error('quartier') is-invalid @enderror" name="quartier" value="{{ old('quartier') }}" required autocomplete="quartier">
          
                                        @error('quartier')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
          
                                <div class="form-group row">
                                  <div class="col-md-4"></div>
                                  <div class="col-md-6">
                                    <div class="input-group mb-4">
                                      <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01"><b>Vendeur</b></label>
                                      </div>
                                      <select class="custom-select" id="inputGroupSelect01" name="n_v">
                                        <option selected >Choisir ...</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="05">06</option>
                                        <option value="11">Reclamation</option>
                                      </select>
                                    </div>
                                  </div>
          
                              </div>
          
                                
                       
          
                                <div class="form-group row">
                                    <label for="type_mesure" class="col-md-4 col-form-label text-md-right"><b>{{ __('Type De Mesure') }}</b></label>
          
                                    <div class="col-md-6">
                                        <div class="row">
                                        <div class="col-md-3">
                                            <input id="checkbox" type="checkbox" class="" name="type_mesure[]" value="protes">Portes 
                                        </div>  
                                        <div class="col-md-4">
                                            <input id="checkbox" type="checkbox" class="" name="type_mesure[]" value="cuisine">Cuisisne 
                                        </div>
                                        <div class="col-md-4">
                                            <input id="checkbox" type="checkbox" class="" name="type_mesure[]" value="decoration">Decoration 
                                        </div>
                                        <div class="col-md-7">
                                            <input id="checkbox" type="checkbox" class="" name="type_mesure[]" value="chambre à coucher">Chambre à coucher
                                        </div>
                                        <div class="col-md-5">
                                            <input id="checkbox" type="checkbox" class="" name="type_mesure[]" value="pergola">Pergola 
                                        </div> 
                                        @error('type_mesure')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
          
                                        
                                    </div>
                                </div>
                            </div>
          
                              
          
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary btn-block">
                                            {{ __('Ajouter') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
          </div>


      </div>
      
    </div>

  </div>

  
</div>
<div id="app">
<example-component></example-component>

</div>
@endsection
