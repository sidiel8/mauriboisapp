<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mauribois') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    
<div class="container center ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-top:100px ; background-color:#f8fafc ; border:none">
            <img src="{{asset('img/logo1.png')}}"  style="margin:auto ; margin-top:20px  ; width: 100px; height: 100px"  >
               <h3 style="margin:auto   ">Login  </h3>
            
               <h3 style="margin:auto   "><i class=" center fas fa-lock"></i> </h3>
                <div class="card-body">
                    <form method="POST" action="/login">
                        @csrf

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Utilisateur') }} </label>

                            <div class="col-md-4">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required >
                                <span style="color:red" role="">
                                    <small>{{$msg ?? ''}}</small>
                                </span>
                                @error('nv')
                                    <span class="" role="alert">
                                        <strong>hello{{$msg ?? ''}}</strong>
                                    </span>
                                    
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-4">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required >

                                @if($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    

                        <div class="form-group row mb-0">
                            <div class="col-md-4 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Login') }}
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
