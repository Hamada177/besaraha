@extends('layouts.master')


@section('title')
{{ __('register.title') }} 
@endsection


@section('style')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="{{URL::asset('css/main_h.css')}}">
<link rel="stylesheet" href="{{URL::asset('css/responsive.css')}}">
 <!-- Font Awesome Library -->
 <link rel="stylesheet" href="{{URL::asset('css/all.min.css')}}" />

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link
    href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@200;300;400;500;600;700;800&#038;display=swap"
    rel="stylesheet"
  />

@stop

@section('content')
<br><br><br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1 class="h_2">{{ __('register.title') }} </h1></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        
                        <div class="row">

                            <div class="input-group input-group-lg mb-3 col-md-6">

                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" 
                                    placeholder="{{ __('register.fullname') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                
                            </div>

                            <div class="input-group input-group-lg mb-3 col-md-6" >

                                    <input id="username" type="text" class="form-control col-12 @error('username') is-invalid @enderror" name="username" 
                                    placeholder="{{ __('register.username') }}" required autocomplete="username" autofocus>

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                
                            </div>

                             <div class="input-group input-group-lg mb-3 col-md-6" >
  
                                    <input id="email" type="email" placeholder="{{ __('register.email') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                               
                            </div>

                            <div class="input-group input-group-lg mb-3 col-md-6" >
  
                                    <input id="phone" type="tel" placeholder="{{ __('register.phone') }}" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="email">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                               
                            </div>

                            <div class="input-group input-group-lg mb-3 col-md-6" >
                               
                                    <input id="password" placeholder="{{ __('register.password') }}" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            
                            </div>

                            <div class="input-group input-group-lg mb-3 col-md-6" >
                                    <input id="password-confirm" placeholder="{{ __('register.confirmPassword') }}" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                
                            </div>

                            <div class="form-group col-md-6">
                                <select id="gender" name="gender" required class="form-control form-control-lg @error('gender') is-invalid @enderror" id="exampleFormControlSelect1">
                                  <option value="" sellected>{{ __('register.gender') }}</option>
                                  <option value="male">{{ __('register.male') }}</option>
                                  <option value="female">{{ __('register.female') }}</option>
                                </select>

                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="form-group col-12 mt-3">
                               
                                    <button type="submit" class="btn h_btn5 btn-block m-auto btn-lg">
                                        {{ __('register.title') }}
                                    </button>
                                
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
