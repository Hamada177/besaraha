@extends('layouts.master')


@section('title')
  {{__('privacy.title')}}
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
<div class="container ">
  <h1 class="text-center mb-3 h_2">{{__('privacy.title')}}</h1>

  <div class="card card-body col-12 ">
  
         <p class="lead">{{__('privacy.text1')}}</p><br>

         <h3 class="h_3">{{__('privacy.title1')}}</h3>
         <p class="lead">{{__('privacy.text2')}}</p><br>

         <h3 class="h_3">{{__('privacy.title2')}}</h3>
         <p class="lead">{{__('privacy.text3')}}</p><br>

         <h3 class="h_3">{{__('privacy.title3')}}</h3>
         <p class="lead">{{__('privacy.text4')}}</p><br>

         <h3 class="h_3">{{__('privacy.title4')}}</h3>
         <p class="lead">{{__('privacy.text5')}}</p><br>

         <p class="lead">{{__('privacy.text6')}}</p><br>

         <h3 class="h_3">{{__('privacy.title5')}}</h3>
         <p class="lead">{{__('privacy.text7')}}</p><br>

         <h3 class="h_3">{{__('privacy.title6')}}</h3>
         <p class="lead">{{__('privacy.text8')}}</p><br>

         <h3 class="h_3">{{__('privacy.title7')}}</h3>
         <p class="lead">{{__('privacy.text9')}}</p><br>

         <h3 class="h_3">{{__('privacy.title8')}}</h3>
         <p class="lead">{{__('privacy.text10')}}</p><br>

         <h3 class="h_3">{{__('privacy.title9')}}</h3>
         <p class="lead">{{__('privacy.text11')}}</p><br>

         <h3 class="h_3">{{__('privacy.title10')}}</h3>
         <p class="lead">{{__('privacy.text12')}}</p><br>

         <h3 class="h_3">{{__('privacy.title11')}}</h3>
         <p class="lead">{{__('privacy.text13')}}</p><br>

         <h3 class="h_3">{{__('privacy.title12')}}</h3>
         <p class="lead">{{__('privacy.text14')}}</p><br>

         <h3 class="h_3">{{__('privacy.title13')}}</h3>
         <p class="lead">{{__('privacy.text15')}}</p><br>



   
  </div>


</div>
<br><br><br><br>
@stop