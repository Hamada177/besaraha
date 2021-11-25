@extends('layouts.master')


@section('title')
  About Us
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
  <h1 class="text-center h_2">About Us</h1>

  <h4 class=" mt-4 text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt impedit dolor, fugiat accusamus reiciendis dignissimos nobis ipsum quisquam delectus.</h4>
  
  <div class="card card-body col-12 ">
     <div class="row">
         <div class="col-12 col-sm-10 col-lg-4">
             <img src="img/img(21).jpg" class="img-fluid" alt="">
         </div>

         <div class="col-12 col-sm-10 col-lg-8 m-auto">
             <p class="">
              Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.

              Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio molestiae sit voluptates assumenda omnis dolorem porro non placeat natus iusto modi, reprehenderit voluptatum ducimus ab unde ad quis amet soluta. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.
             </p>
         </div>
     </div>
  </div>


</div>

<br><br><br>
@stop