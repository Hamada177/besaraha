@extends('layouts.master_admin')


@section('title')
    Update users
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
                <h1 class="mt-4">Update users</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">update [ {{ $user_up->name }} ]</li>
                </ol>

                <div id="change_information" class="col-lg-11 m-auto pb-4">
                    <h3 class="color_h mb-3">{{ __('settings.change_information') }}</h3>

                    <form action="/users_update/update_form_user" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('POST')
                        <div class="row">

                            <div class="input-group input-group-lg mb-3 mt-3 col-12 ">
                                <label for="exampleFormControlFile1">{{ __('settings.change_image') }}</label>
                                <input name="file" type="file" class="form-control-file" id="file" class="form-control"
                                    aria-label="Large" aria-describedby="inputGroup-sizing-sm" accept="png,jpg,svg,jpeg">
                            </div>


                            <!-- => start input Birthday !-->
                            <div class="input-group input-group-lg  mt-3 col-md-6">
                                <label class="col-12"
                                    for="exampleFormControlFile1">{{ __('settings.birthday') }}</label>
                                <input name="birthday" placeholder="Birthday" type="date"
                                    class="form-control @error('birthday') is-invalid @enderror" aria-label="Large"
                                    value="{{ $user_up->birthday }}" aria-describedby="inputGroup-sizing-sm">
                                @error('birthday')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- => End input Birthday  !-->

                            <!-- => start input fullname !-->
                            <div class="input-group input-group-lg mb-3 mt-3 col-md-6">
                                <label class="col-12"
                                    for="exampleFormControlFile1">{{ __('settings.fullname') }}</label>
                                <input required name="name" placeholder="fullname" type="text"
                                    class="form-control @error('name') is-invalid @enderror" aria-label="Large"
                                    value="{{ $user_up->name }}" aria-describedby="inputGroup-sizing-sm">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- => End input fullname  !-->


                            <!-- => start input phone  !-->
                            <div class="input-group input-group-lg mb-3 col-md-6">
                                <label class="col-12"
                                    for="exampleFormControlFile1">{{ __('settings.phone') }}</label>
                                <input required name="phone" placeholder="phone" type="tel"
                                    class="form-control @error('phone') is-invalid @enderror" aria-label="Large"
                                    value="{{ $user_up->phone }}" aria-describedby="inputGroup-sizing-sm">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- => End input phone  !-->


                            <!-- => [ Start select box gender ] !-->
                            <div class="input-group input-group-lg mb-3 col-md-6">
                                <label class="col-12"
                                    for="exampleFormControlFile1">{{ __('settings.gender') }}</label>

                                <select name="gender" required="required"
                                    class="form-control form-control-lg select_gender @error('gender') is-invalid @enderror">
                                    <option value="">{{ __('settings.gender') }}</option>
                                    <option value="male">{{ __('settings.male') }}</option>
                                    <option value="female">{{ __('settings.female') }}</option>
                                </select>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- => [ End select box gender ] !-->

                            <!-- => start brief about me  !-->
                            <div class="input-group input-group-lg mb-3 col-12 mb-4">
                                <label class="col-12" for="">{{ __('settings.brief_about_me') }}</label>
                                <textarea rows="3" name="brief" type="text"
                                    class="form-control @error('brief') is-invalid @enderror" required
                                    aria-label="Large">{{ $user_up->brief_about_me }}</textarea>
                                @error('brief')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- => End input brief about me  !-->
                            <input type="hidden" name="id" id="" value="{{ $user_up->id }}">
                            <div class="m-4 col-12 m-auto">
                                <input name="" id="" type="submit" class="btn btn-info btn-block p-2 col-12"
                                    value="save">
                            </div>
                            
                        </div>

                    </form>
                </div>
        </main>


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
            $(document).ready(function() {
                $('.select_gender option[value="{{ $user_up->gender }}"]').prop('selected', true)
            });
        </script>


        @if (session()->has('success'))
            <script>
                swal("success", "{{ session()->get('success') }}", "success");
            </script>
        @endif

    @stop
