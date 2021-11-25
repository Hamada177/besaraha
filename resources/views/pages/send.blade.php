@extends('layouts.master')

@section('title')
    {{ __('messages.title2') }}
@stop

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



    <section class="send_message_box">
        <div class="container">
            <div class="m-auto text-center send_message">
                <img src="{{ URL::asset('img/' . $user->pic) }}" alt="this image for {{ $user->name }}"
                    data-toggle="tooltip" title="show image" id="myImg">
            </div>

            <!-- The Modal -->
            <div id="myModal" class="modal modal_user">
                <span class="close">&times;</span>
                <img class="modal-content" id="img01">
                <div id="caption"></div>
            </div>

            <div class="card card_one card-body col-md-10 m-auto">

                <h3 class="h_3">{{ $user->name }}</h3>

                <form action='/{{ $user->username }}' method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    @if (session()->has('Add'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ __(session()->get('Add')) }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <input type="hidden" name="user_id" id="user_id" value="{{ $user->id }} ">
                    <input type="hidden" name="username" id="username" value="{{ $user->username }} ">

                    <textarea
                        placeholder="{{ __('messages.placeholdeTextarea1') }} {{ $user->name }} {{ __('messages.placeholdeTextarea2') }}"
                        class="form-control @error('message') is-invalid @enderror" name="message" id="message" cols="30"
                        rows="10"></textarea>

                    @error('message')
                        <span class="invalid-feedback tilte_send_image" role="alert">
                            <strong>{{ __($message) }}</strong>
                        </span>
                    @enderror

                    <!-- => start input img  !-->
                    <div class="input-group input-group-lg mb-3 mt-3">
                        <label class="col-12 text-info tilte_send_image">{{ __('messages.new_p') }}</label>
                        <input class="form-control" type="file" name="file" id="file" accept=".jpeg,.jpg,.png,svg"
                            aria-label="Large">
                    </div>
                    <!-- => End input img  !-->
                    <br>

                    <button type="submit"
                        class="btn h_btn5 btn-block m-auto btn-lg">{{ __('messages.send_now') }}</button>
                </form>

                <hr>
                <h5 class="row p-3"><strong>{{ __('messages.hits') }} :
                        &nbsp;</strong><span>{{ $coun_v_link }}</span></h5>

            </div>
            <br>

            <div class="card card-body col-md-10 m-auto text-center p-md-4">
                <br>

                @if ($count == 0)

                    <i style="font-size: 70px; color: #FF00FF;" class="fa fa-globe m-auto"></i>
                    <br>
                    <h3 class="h_3 m-3">{{ __('messages.no_public_msgs') }} </h3>
                    <br>
                    <p class="lead m-0"> <b> {{ $user->name }}</b> {{ __('messages.public_desc1') }} </p>
                    <p class="lead m-0">{{ __('messages.public_desc2') }} </p>

                @endif

                @if ($count > 0)

                    <h3 class="h_3 mb-3">
                        {{ __('messages.public_desc3') }} <i class="text-primary">{{ $user->name }}</i>
                        {{ __('messages.public_desc4') }}
                    </h3>
                    <hr>

                    @foreach ($msgs as $ms)

                        <div dir="auto" class="card card_public_msg card-body mb-3 col-md-10"
                            style="background-color: #f5f5f6;border: none; margin: 0px auto">
                            <span class="row"><strong> {{ __('messages.ago') }} : &nbsp;</strong>
                                <i>{{ getTime($ms->created_at) }}</i></span>
                            <hr>

                            @if ($ms->image != '')
                                <p class="lead">{{ $ms->message }}</p>
                                <img src="/uploads/sends/{{ $ms->image }}" alt="" class="img-fluid">

                            @endif

                            @if ($ms->image == '')

                                <p class="lead">{{ $ms->message }}</p>

                            @endif

                            <hr>
                        </div>


                    @endforeach

                @endif

                <br>

                <div class="d-flex justify-content-center">
                    {!! $msgs->links() !!}
                </div>
            </div>





            <br>

            <div class="card card-body col-md-10 m-auto p-md-4">
                <br>
                <i style="font-size: 100px; color: #FF00FF;" class="fa fa-lightbulb m-auto"></i>

                <br>
                <h3 class="h_2 m-3">{{ __('messages.time_honest') }}</h3>
                <br><br>
                <h5> {{ __('messages.honest_title') }}</h5>


                <p class="lead mt-3">{{ __('messages.honest_desc1') }}</p>
                <p class="lead p-0">{{ __('messages.honest_desc2') }}</p>
                <p class="lead p-0">{{ __('messages.honest_desc3') }}</p>
                <p class="lead p-0">{{ __('messages.honest_desc4') }}</p>

                <a class="btn h_btn5 mt-4 btn-lg"
                    href="{{ route('register') }}">{{ __('messages.honest_button') }}</a>
                <br>
            </div>


        </div>


        <div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="modalIMG" role="dialog"
            tabindex="-1">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body mb-0 p-0">
                        <img src="https://i3.ytimg.com/vi/vr0qNXmkUJ8/maxresdefault.jpg" alt="" style="width:100%">
                    </div>
                    <div class="modal-footer">
                        <div><a href="https://i3.ytimg.com/vi/vr0qNXmkUJ8/maxresdefault.jpg" target="_blank">Download</a>
                        </div>
                        <button class="btn btn-outline-primary btn-rounded btn-md ml-4 text-center" data-dismiss="modal"
                            type="button">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <div class="container mt-4 mb-4 pb-4">
        <div class="card card-body p-1 p-md-3">

            <h2 class="h_2">{{ __('messages.suggested') }}</h2>
            <hr>

            <div class="row col-12 m-auto p-0 m-0">

                @if ($count_users > 0)


                    @foreach ($all_users as $users)

                        <div class="row box_frind col-md-10 col-lg-6 m-auto p-0 p-md-1 ml-0">

                            <img class="img_user" src="{{ URL::asset('img/' . $users->pic) }}" alt="user image"
                                data-toggle="tooltip" data-placement="top" title="profile image">

                            <h5 class="col-6 col-md-7">{{ $users->name }}</h5>

                            @auth
                                <a href="/profile/{{ $users->id }}" class="btn h_btn4"><i class="fa fa-paper-plane"></i></a>
                            @else
                                <a href="/sarh/{{ $users->username }}"
                                    class="btn h_btn4"><i class="fa fa-paper-plane"></i>
                                </a>
                            @endauth

                        </div>

                    @endforeach

                @endif
                @if ($count_users == 0)
                    <div class="box_no_data">
                        <img src="{{ URL::asset('img/no_data.png') }}" alt="" class="img_no_data">
                        <h3 class="h_3 text_no_data">{{ __('messages.no_date') }}</h3>
                    </div>
                @endif



            </div>

        </div>
    </div>



@section('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    @if (session()->has('Add'))
        <script>
            swal("{{ __('messages.success') }}", '{{ __(session()->get('Add')) }}', "success");
        </script>
    @endif


@stop
