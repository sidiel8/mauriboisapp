@extends('layouts.app')

@section('content')
@include('admin.admin-utilities.admin')

<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header"><b>{{ __('Les Clients') }}</b></div>
                
               <div class="card-body">
                <table class="table table-sm ">
                    <thead>
                      <tr>
                        
                        <th scope="col">Nom</th>
                        <th scope="col">Vendeur</th>
                        <th scope="col">Telephone</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client)
                        <tr>
                          <td scope="row"><b>{{$client->name}}</b></td>
                          <td scope="row">{{$client->vendeur == '11' ? 'reclamation' :$client->vendeur }}  </td>
                          <td scope="row">{{$client->numero}}</a></td>
                          <td scope="row"><a href="{{route('admin.client' ,$client->id)}}" class="btn btn-primary">Deteails</a></td>
                          
                    </tr>
                           
                        @endforeach
                     
                    </tbody>
                  </table> 
               </div>
          </div>
      </div>
  </div>
</div>
@endsection