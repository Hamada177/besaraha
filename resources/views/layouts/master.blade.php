<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }} | @yield('title','profile')</title>

    <link rel="icon" href="{{ asset('http://127.0.0.1:8000/img/avatar.png') }}" type="image/x-icon" />
  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#CD00CD" />
    <meta name="msapplication-navbutton-color" content="#CD00CD" />
    <meta name="apple-mobile-web-app-status-bar-style" content="#CD00CD" />

    @yield('style');

    @if (App::getLocale() == 'arb')
        <link rel="stylesheet" href="{{ asset('css/rtl.css') }}">
    @endif

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>

<body>

    @include('layouts.navbar')
 
    @yield('content')
    @include('layouts.footer')

    @yield('scripts')
    <script src="{{ URL::asset('js/scripts.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
        integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ=="
        crossorigin="anonymous"></script>

</body>
</html>
