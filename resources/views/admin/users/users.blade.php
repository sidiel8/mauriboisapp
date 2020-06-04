@extends('layouts.app')

@section('content')
@include('admin.admin-utilities.admin')

<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header badge-info " style="color:white"><h3>{{ __('Utilisateur') }}</h3></div>
                
               <div class="card-body">
                <table class="table table-sm ">
                    <thead>
                      <tr>
                        
                        <th scope="col">Nom</th>
                        <th scope="col">Numero</th>
                        <th scope="col">Telephone</th>
                        <th scope="col">Roles</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                          <td scope="row"><b>{{$user->name}}</b></td>
                          <td scope="row">{{$user->nv  }}  </td>
                          <td scope="row">{{$user->phone}}</a></td>
                          <td scope="row">{{implode(',' , $user->roles()->pluck('name')->toArray())}}</a></td>
                          <td scope="row"><a href="{{route('admin.edit' , $user->id)}}" class="btn btn-primary">Deteails</a></td>
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