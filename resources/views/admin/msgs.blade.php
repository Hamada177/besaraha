@extends('layouts.master_admin')


@section('title')
    messages 
@endsection


@section('style')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="{{ URL::asset('css/styles.css') }}" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
@stop

@section('content')


    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">messages</li>
                </ol>
            
                    <div class="row">
            
                        <div class="col-md-10 m-auto">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5>
                                        <i class="fas fa-lg fa-envelope p-1"></i>
                                        All messages for <b class="text-primary">{{ $user_up->name }}</b>
                                    </h5>
            
                                </div>
                                <div class="card-body">
            
                                    @if ($count == 0)
            
                                        <div class="box_btn_one text-center">
                                            <br>
            
                                            <img src="{{ URL::asset('img/no_msgs.png') }}" alt="" class="img_no_data" width="60%">
            
                                            <br><br>
                                            <h3 class="h_3 mb-4">There are no messages yet</h3>

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
            
                                                    <img src="{{ URL::asset('/uploads/sends/'.$ms->image ) }}" alt="" width="90%">
                                                    <hr>
                                                    <div class="row">
            
                                                        <a class="modal-effect btn btn-danger" data-effect="effect-scale"
                                                            data-id="{{ $ms->id }}" data-img="{{ $ms->image }}"
                                                            data-message="{{ $ms->message }}" data-toggle="modal" href="#modaldemo9"
                                                            title="{{ __('messages.delete') }}">{{ __('messages.delete') }}<i
                                                                class="fas fa-lg fa-trash p-1"></i></a>
            
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
                    </div>

          
            </div>
        </main>

      <!-- delete -->
    <div class="modal fade" id="modaldemo9">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title"> {{ __('messages.delete_message') }}</h6><button aria-label="Close"
                        class="close" data-dismiss="modal" type="button"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <form action="/message/destroy" method="POST">
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


    @stop

    @section('scripts')
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
                integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
                crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

        <script src="{{ URL::asset('js/datatables-demo.js') }}"></script>
        <script src="{{ URL::asset('js/chart-area-demo.js') }}"></script>
        <script src="{{ URL::asset('js/chart-bar-demo.js') }}"></script>
        <script src="{{ URL::asset('js/scripts.js') }}"></script>

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
    
        @if (session()->has('deleted'))
            <script>
                swal("Done", "{{ session()->get('deleted') }}", "success");
            </script>
        @endif
       
    @stop
