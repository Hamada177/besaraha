@extends('layouts.master')


@section('title')
    {{ __('login.title') }}
@endsection


@section('style')

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ URL::asset('css/main_h.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/responsive.css') }}">
    <!-- Font Awesome Library -->
    <link rel="stylesheet" href="{{ URL::asset('css/all.min.css') }}" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@200;300;400;500;600;700;800&#038;display=swap"
        rel="stylesheet" />

@stop

@section('content')

    <br><br><br><br><br>
    <div class="container col-md-7">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1 class="h_2">{{ __('login.title') }}</h1>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">

                                <!-- Success message -->
                                @if (Session::has('error'))
                                    <div class="alert alert-danger col-12">
                                        {{ __('login.error') }}
                                    </div>
                                @endif

                                <div class="col-md-12">
                                    <input placeholder="{{ __('login.email') }}" id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="form-group row">

                                <div class="col-md-12">
                                    <input placeholder="{{ __('login.password') }}" id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label pr-4" for="remember">
                                            {{ __('login.remember') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0 col-12">
                                <div class="col-12">
                                    <button type="submit" class="btn btn_form_signup btn-block p-2">
                                        {{ __('login.title') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('login.forgotPass') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <br><br>
@endsection
