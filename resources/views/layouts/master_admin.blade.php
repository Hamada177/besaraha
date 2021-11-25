<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dashboard | @yield('title','Admin')</title>

    <link rel="icon" href="{{ URL::asset('http://127.0.0.1:8000/img/avatar.png') }}" type="image/x-icon" />

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#333" />
    <meta name="msapplication-navbutton-color" content="#333" />
    <meta name="apple-mobile-web-app-status-bar-style" content="#333" />

    @yield('style');

    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
    crossorigin="anonymous" />
  <script  src="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js') }}"
    crossorigin="anonymous"></script>

</head>

<body class="sb-nav-fixed">

    @include('layouts.navbar_admin')

    @yield('content')

    @include('layouts.footer_admin')                                                           

    @yield('scripts')

    <script src="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js') }}"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous"></script>

    <script src="{{ URL::asset('https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js') }}" crossorigin="anonymous"></script>

    <script src="{{ URL::asset('https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js') }}" crossorigin="anonymous"></script>

    <script src="{{ URL::asset('js/datatables-demo.js') }}"></script>
    <script src="{{ URL::asset('js/chart-area-demo.js') }}"></script>
    <script src="{{ URL::asset('js/chart-bar-demo.js') }}"></script>
    <script src="{{ URL::asset('js/admin_js.js') }}"></script>


</body>

</html>
