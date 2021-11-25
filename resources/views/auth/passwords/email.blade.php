@extends('layouts.master')


@section('title')
{{ __('Reset Password') }}
@endsection


@section('style')
<br><br><br><br>

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
<div class="container col-5">
    <div class="row justify-content-center">

            <div class="card col-12">
                <div class="card-header"><h1 class="h_2">{{ __('Reset Password') }}</h1></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
         
                            <div class="col-md-11 m-auto">
                                <input placeholder="{{ __('E-Mail Address') }}" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                                <button type="submit" class="btn h_btn5 btn-block mt-4 mb-2">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                        
                        </div>
                    </form>
                </div>
            </div>
   
    </div>
</div>

<br><br>
@endsection
