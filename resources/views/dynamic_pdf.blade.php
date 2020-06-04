<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mauribois') }}</title>

    <!-- Scripts -->
  

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style type="text/css">
      .box{
       width:600px;
       margin:0 auto;
      }
     </style>
    </head>
    <body>
     <br />
     <div class="container">
      <h4> <span align="left">MAURIBOIS 2020</span>
        <span style="float:right">SUIVI ET EVALUATION</span></h4>
      <h3 align="center">IPMRESSION</h3><br />
          {{Carbon\Carbon::now()->isoFormat('D-M-Y')}}
      <div class="row">
     
        <div class="col-md-2" >
          <a href="{{ url('dynamic_pdf/pdf') }}" class="btn btn-sm btn-danger">LISTES PORTES</a>
         </div>
       <div class="col-md-2" >
        <a href="{{ url('dynamic_pdf/pdf') }}" class="btn btn-sm btn-danger">LISTES MESURES</a>
       </div>
       <div class="col-md-2" >
        <a href="{{ url('dynamic_pdf/pdf') }}" class="btn btn-sm btn-danger">RECLAMATIONS BOIS</a>
       </div>
       <div class="col-md-2" >
        <a href="{{ url('dynamic_pdf/pdf') }}" class="btn btn-sm btn-danger">RECLAMATIONS PVC</a>
       </div>
      </div>
      <br />
      <div class="table-responsive">
       <table class="table table-striped table-bordered">
        <thead>
         <tr>
          <th>N°</th>
          <th>Nom</th>
          <th>Telephone</th>
          <th>Type</th>
          <th>Date</th>
          <th>Statu</th>
         </tr>
        </thead>
        <tbody>
        @foreach($mesures as $m)
            @if($m->confirmations->count()==0)
         <tr>
          <td>{{ $m->id }}</td>
          <td>{{$m->confirmations->count()}}</td>
          <td>numero</td>
          <td>{{ $m->type }}</td>
          <td>{{ $m->created_at->locale('fr')->isoFormat('d-M-Y') }}</td>
          <td></td>
         </tr>
         @endif
        @endforeach
        </tbody>
       </table>
      </div>
     </div>
    </body>
   </html>
   