@extends('layouts.master')

@section('title', 'Mssages')

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


    <br><br><br>
    <div class="container pt-4">

        <h2 class="h_2 m-3">{{ __('messages.myMessages') }}</h2>

      

            <div class="col-md-8 m-auto">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5>
                            <i class="fas fa-lg fa-envelope p-1"></i>{{ __('messages.incoming-messages') }}
                        </h5>

                    </div>
                    <div class="card-body">

                        @if ($count == 0)

                            <div class="box_btn_one text-center">
                                <br>

                                <img src="{{ URL::asset('img/no_msgs.png') }}" alt="" class="img_no_data">

                                <br><br>
                                <h3 class="h_3 mb-4">{{ __('messages.no-msgs') }}</h3>

                                <p class="lead">
                                    {{ __('messages.share-link') }}
                                </p>

                                <hr>
                            </div>

                        @endif

                        @if ($count > 0)

                            <h6 class="row"><strong> {{ __('messages.messages') }} : &nbsp;</strong>
                                <span>{{ $count }}</span>
                            </h6>

                            <div class="h_scroll">

                                @foreach ($msgs as $ms)

                                    <div dir="auto" class="card card-body mb-3"
                                        style="background-color: #f5f5f6;border: none;">
                                        <span class="row"><strong> {{ __('messages.ago') }} : &nbsp;</strong>
                                            <i>{{ getTime($ms->created_at) }}</i></span>
                                        <hr>

                                        {{ $ms->message }}

                                        <img class="img-fluid" src="uploads/sends/{{ $ms->image }}" alt="" width="90%">
                                        <hr>
                                        <div class="row">

                                            <a class="modal-effect btn btn-danger" data-effect="effect-scale"
                                                data-id="{{ $ms->id }}" data-img="{{ $ms->image }}"
                                                data-message="{{ $ms->message }}" data-toggle="modal" href="#modaldemo9"
                                                title="{{ __('messages.delete') }}">{{ __('messages.delete') }}<i
                                                    class="fas fa-lg fa-trash p-1"></i></a>

                                            @if ($ms->status == 0)
                                                <form action="{{ url('/public/' . $ms->id . '/' . $ms->status) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="" class="btn btn-primary mr-2 ml-2">
                                                        <i class="fa fa-lg fa-paper-plane p-1"></i>
                                                        {{ __('messages.show') }}
                                                    </button>
                                                </form>
                                            @endif

                                            @if ($ms->status > 0)
                                                <form action="{{ url('/public/' . $ms->id . '/' . $ms->status) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="" class="btn btn-secondary mr-2 ml-2">
                                                        <i class="fa fa-lg fa-eye-slash p-1" aria-hidden="true"></i>
                                                        {{ __('messages.hide') }}
                                                    </button>
                                                </form>
                                            @endif



                                        </div>

                                    </div>


                                @endforeach


                            </div>

                            <div class="d-flex justify-content-center">
                                {!! $msgs->links() !!}
                            </div>

                        @endif

                    </div>
                </div>

            </div>


            {{-- <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>
                            <i class="fa fa-lg fa-paper-plane p-1"></i> {{ __('messages.sent') }}

                        </h5>

                    </div>
                    <div class="card-body">

                        <div class="box_btn_one text-center">
                            <br>

                            <i style="font-size: 56px; color: #FF00FF;" class="fa fa-lg fa-paper-plane p-1"></i>
                            <br><br>

                            <h3 class="h_3 mb-4">{{ __('messages.no-found') }}</h3>

                            <p class="lead">
                                {{ __('messages.msg-users') }}
                            </p>
                            <hr>
                        </div>

                        <h6 class="row"><strong> {{ __('messages.sent-matches') }} :
                                &nbsp;</strong><span>5</span></h6>

                        <div class="h_scroll">

                            <div dir="auto" class="card card-body mb-3" style="background-color: #f5f5f6;border: none;">
                                <span class="row"><strong> {{ __('messages.to') }} username : &nbsp;</strong>
                                    <span>Ago 13 second</span></span>
                                <hr>
                                Here the messages that you have sent to other users of frankness will be saved and you can
                                cancel sending them and keep them strictly confidential
                                <hr>
                                <div class="row">
                                    <button class="btn btn-danger "><i
                                            class="fas fa-lg fa-trash p-1 "></i>{{ __('messages.cancel') }}</button>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>

            </div> --}}


       

     <br><br>
    </div>



    <!-- delete -->
    <div class="modal fade" id="modaldemo9">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title"> {{ __('messages.delete_message') }}</h6><button aria-label="Close"
                        class="close" data-dismiss="modal" type="button"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <form action="message/destroy" method="POST">
                    @csrf

                    <div class="modal-body">
                        <p> {{ __('messages.confiem-delete') }}</p><br>
                        <input type="hidden" name="id" id="id" value="">
                        <input type="hidden" name="img" id="img" value="">

                        <input class="form-control" name="message" id="message" type="text" readonly>
                    </div>

                    <div class="modal-footer">
                        <a href=""></a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            {{ __('messages.cancel-delete') }}</button>
                        <button type="submit" class="btn btn-danger"> {{ __('messages.confirm') }}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>



    <script>
        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var img = button.data('img')
            var message = button.data('message')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #img').val(img);
            modal.find('.modal-body #message').val(message);
        })
    </script>



@stop

@section('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    @if (session()->has('public'))
        <script>
            swal("{{ __('messages.success') }}", '{{ __(session()->get('public')) }}', "success");
        </script>
    @endif
@stop
