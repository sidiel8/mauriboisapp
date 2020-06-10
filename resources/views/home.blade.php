@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="container nav  " id="v-pills-tab" role="tablist" aria-orientation="vertical">
   
        <router-link class="nav-link active" id="v-pills-client-tab" data-toggle="pill" to="/" role="tab" aria-controls="v-pills-client" aria-selected="true">MAURIBOIS</router-link>
        <router-link class="nav-link active" id="v-pills-client-tab" data-toggle="pill" to="/clients" role="tab" aria-controls="v-pills-client" aria-selected="true">Clients <i class="fas fa-users"></i></router-link>
        @can('actiu')<router-link class="nav-link" id="v-pills-user-tab" data-toggle="pill" to="/actiu" role="tab" aria-controls="v-pills-user" aria-selected="flase"><b style="color:red">Actiu   </b></router-link>@endcan
        @can('mange')<router-link class="nav-link" id="v-pills-user-tab" data-toggle="pill" to="/mesures" role="tab" aria-controls="v-pills-user" aria-selected="flase">Meusres  <i class="fas fa-ruler"></i> </router-link>@endcan
        <router-link class="nav-link" id="v-pills-user-tab" data-toggle="pill" to="/faireundevis" role="tab" aria-controls="v-pills-user" aria-selected="flase">Faire Un Devis  <i class="fas fa-ruler"></i> </router-link>
       
        @can('mange')<router-link class="nav-link" id="v-pills-user-tab" data-toggle="pill" to="/liste_decharge" role="tab" aria-controls="v-pills-user" aria-selected="flase">Liste Decharge <i class="fas fa-list"></i></router-link>@endcan
        @can('mange')<router-link class="nav-link" id="v-pills-user-tab" data-toggle="pill" to="/reclamation" role="tab" aria-controls="v-pills-user" aria-selected="flase">Reclamation <i class="fas fa-hammer"></i></router-link>@endcan
       

        @can('mange')<router-link class="nav-link" id="v-pills-user-tab" data-toggle="pill" to="/devis" role="tab" aria-controls="v-pills-user" aria-selected="flase"> Devis <i class="fas fa-fas fa-dollar-sign"></i></router-link>@endcan
       @can('mange')<router-link class="nav-link" id="v-pills-user-tab" data-toggle="pill" to="/factures" role="tab" aria-controls="v-pills-user" aria-selected="flase">Factures <i class="fas fa-dollar-sign"></i></router-link>@endcan
       @can('mange')<router-link class="nav-link" id="v-pills-user-tab" data-toggle="pill" to="/operations" role="tab" aria-controls="v-pills-user" aria-selected="flase">Operations <i class="fas fa-dollar-sign"></i></router-link>@endcan
        @can('mange')<router-link class="nav-link" id="v-pills-user-tab" data-toggle="pill" to="/stockageEtlivraison" role="tab" aria-controls="v-pills-user" aria-selected="flase">Stockage Et Livraison  <i class="fas fa-truck"></i></router-link>@endcan
        @can('mange')<router-link class="nav-link" id="v-pills-user-tab" data-toggle="pill" to="/installation" role="tab" aria-controls="v-pills-user" aria-selected="flase">Installation  <i class="fas fa-tools"></i></router-link>@endcan
    </div>
  
  
<div class="container" id="app">
    <ul>
        <li v-for="message in messages">
          
        </li>
      </ul>
    <hr>
    <br>
 <router-view></router-view>
    </div>
  
  

        <div>
            
         
        </div>
    </div>
</div>

@endsection
