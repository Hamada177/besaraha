@extends('layouts.master')


@section('title')
    {{ __('contact.title') }}
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
    <div class="container container_contact">
        <h1 class="h_2">{{ __('contact.title') }}</h1>
        <div class="row">

            <div class="col-md-6 container_box_one">

                <p class="lead mb-4">
                    {{ __('contact.title2') }}
                </p>

                <div class="row p-2">
                    <strong><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;{{ __('contact.email') }}: </strong>
                    <span>&nbsp;test@gmail.com</span>
                </div>

                <div class="row p-2">
                    <strong><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;{{ __('contact.phone') }} : </strong>
                    <span>&nbsp;01029500566</span>
                </div>

                <div class="p-3 mt-4">
                    <!-- Section: Social media -->
                    <section class="mb-4">
                        <!-- Facebook -->
                        <a class="btn btn-dark btn-floating m-1 shadow" style="background-color: #3b5998;" href="#!"
                            role="button"><i class="fab fa-facebook-f"></i></a>

                        <!-- Twitter -->
                        <a class="btn btn-dark btn-floating m-1" style="background-color: #55acee;" href="#!"
                            role="button"><i class="fab fa-twitter"></i></a>

                        <!-- Google -->
                        <a class="btn btn-dark btn-floating m-1" style="background-color: #dd4b39;" href="#!"
                            role="button"><i class="fab fa-google"></i></a>

                        <!-- Instagram -->
                        <a class="btn btn-dark btn-floating m-1" style="background-color: #ac2bac;" href="#!"
                            role="button"><i class="fab fa-instagram"></i></a>

                        <!-- Linkedin -->
                        <a class="btn btn-dark btn-floating m-1" style="background-color: #0082ca;" href="#!"
                            role="button"><i class="fab fa-linkedin-in"></i></a>
                        <!-- Github -->
                        <a class="btn btn-dark btn-floating m-1" style="background-color: #333333;" href="#!"
                            role="button"><i class="fab fa-github"></i></a>
                    </section>
                    <!-- Section: Social media -->

                </div>


            </div>

            <div class="col-md-6 container_box_tow">
                <p class="lead">
                    {{ __('contact.title3') }}
                </p>

                <!-- Success message -->
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <form method="post" action="{{ route('send_contact') }}">

                    <!-- CROSS Site Request Forgery Protection -->
                    @csrf
                    <input name="name" type="text" class="form-control form-lg mb-2 @error('name') is-invalid @enderror"
                        placeholder="{{ __('contact.name') }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input name="email" type="email" class="form-control form-lg mb-2 @error('email') is-invalid @enderror"
                        placeholder="{{ __('contact.email') }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input name="phone" type="tel" class="form-control form-lg mb-2 @error('phone') is-invalid @enderror"
                        placeholder="{{ __('contact.phone') }}">
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input name="subject" type="text"
                        class="form-control form-lg mb-2 @error('subject') is-invalid @enderror"
                        placeholder="{{ __('contact.subject') }}">
                    @error('subject')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <textarea name="message" placeholder="{{ __('contact.message_here') }}"
                        class="form-control @error('message') is-invalid @enderror" name="" id="" cols="30"
                        rows="5"></textarea>
                    @error('message')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <button class="btn h_btn1 btn-block btn-lg mt-3">{{ __('contact.send') }}</button>
                </form>

            </div>

        </div>
    </div>
@stop

@section('scripts')
@stop
