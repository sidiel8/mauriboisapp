@extends('layouts.app')

@section('content')
@include('admin.admin-utilities.admin')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b> Edit {{  $user->name}}</b></div>
                <div class="card-body">
                  <form method="POST" action="{{ route('admin.update' , $user) }}">
                    @csrf
                          {{method_field('POST')}}
                    <div class=" row">
                      @foreach ($roles as $role)
                      <div class="form-check col-md-12">
                        <input id="checkbox" type="checkbox" class="" name="roles[]" value="{{$role->id}}"> {{$role->name}} 
                      </div>
                      @endforeach
                      <div class=" ">
                        <button type="submit" class="btn btn-success ">
                            {{ __('Update') }}
                        </button>

                    </div>
                    </div>
                  </form>
                </div>
            <div class="card-body">
              <form method="POST" action="{{ route('login') }}">
                @csrf
                      {{method_field('PUT')}}
                <div class="form-group row">
                    <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                    <div class="col-md-6">
                        <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ $user->name }}"  autofocus>

                        @error('nom')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                  <label for="nv" class="col-md-4 col-form-label text-md-right">{{ __('N° Vendeur') }}</label>

                  <div class="col-md-6">
                      <input id="nv" type="text" class="form-control @error('nv') is-invalid @enderror" name="nv" value="{{$user->nv}}" autofocus>

                      @error('nv')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>

              <div class="form-group row">
                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Telephone') }}</label>

                <div class="col-md-6">
                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}"  autofocus>

                    @error('nv')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

               

               

                <!-- <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-success btn-block">
                            {{ __('Edit') }}
                        </button>

                    </div> -->
                </div>
            </form>
 
            </div>
                  
            </div>
        </div>
    </div>
</div>
@endsection