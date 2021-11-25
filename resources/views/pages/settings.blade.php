@extends('layouts.master')
@section('title')
    {{ __('settings.title') }}
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

    <div class="container container_settings col-sm-10 col-md-11 col-lg-10 p-1 pt-4 pb-1 mb-4">
        <div class="shadow m-0 bg-white pb-4">

            <ol class="breadcrumb mb-4">
                <h1 class="pb-md-3 color_h col-md-5">{{ __('settings.settings') }}</h1>
                <div class="col-md-7">
                    <label for="choose_settings">{{ __('settings.choose_one') }}</label>
                    <select id="select_one" class="select_one form-control form-control-lg mt-0">
                        <option value="change_information">{{ __('settings.change_information') }}</option>
                        <option value="change_password">{{ __('settings.change_password') }}</option>

                    </select>

                </div>

            </ol>

            <div class="setting_content p-md-4">

                <!--==============[ Start change information]=========================-->
                <div id="change_information" class="col-lg-11 m-auto pb-4">
                    <h3 class="color_h mb-3">{{ __('settings.change_information') }}</h3>

                    <form action="settings/update" enctype="multipart/form-data" method="post">
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
                                <input required name="birthday" placeholder="Birthday" type="date"
                                    class="form-control @error('birthday') is-invalid @enderror" aria-label="Large"
                                    value="{{ Auth::User()->birthday }}" aria-describedby="inputGroup-sizing-sm">
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
                                    value="{{ Auth::User()->name }}" aria-describedby="inputGroup-sizing-sm">
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
                                    value="{{ Auth::User()->phone }}" aria-describedby="inputGroup-sizing-sm">
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
                                    aria-label="Large">{{ Auth::User()->brief_about_me }}</textarea>
                                @error('brief')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- => End input brief about me  !-->



                            <div class="m-4 col-12 m-auto">
                                <input name="" id="" type="submit" class="btn h_btn5 btn-block p-2 col-12"
                                    value="{{ __('settings.save') }}">
                            </div>

                        </div>

                    </form>
                </div>


                <div id="change_password" class="p-2">
                    <h3 class="color_h mb-3">{{ __('settings.change_password') }}</h3>
                    <form action=" {{ route('update_password') }}" method="post">
                        @csrf
                        @method('POST')

                        @if (session()->has('success_pass'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ __(session()->get('success_pass')) }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if (session()->has('error_pass'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{ __(session()->get('error_pass')) }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <input type="hidden" name="id" id="" value="{{ Auth::User()->id }}">
                        <!-- => start input old password  !-->
                        <div class="input-group input-group-lg mb-3 mt-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg"><i
                                        class="fa fa-key"></i></span>
                            </div>
                            <input name="old_password" placeholder="{{ __('settings.old_password') }}" type="password"
                                class="form-control @error('old_password') is-invalid @enderror" aria-label="Large"
                                aria-describedby="inputGroup-sizing-sm">
                            @error('old_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- => End input old password  !-->

                        <!-- => start input new password  !-->
                        <div class="input-group input-group-lg mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg"><i
                                        class="fa fa-key"></i></span>
                            </div>
                            <input name="new_password" placeholder="{{ __('settings.password') }}" type="password"
                                class="form-control @error('new_password') is-invalid @enderror" aria-label="Large"
                                aria-describedby="inputGroup-sizing-sm">
                            @error('new_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- => End input password  !-->


                        <!-- => start input password  !-->
                        <div class="input-group input-group-lg mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa fa-key"
                                        aria-hidden="true"></i></span>
                            </div>
                            <input name="re_password" placeholder="{{ __('settings.confirm_password') }}" type="password"
                                class="form-control @error('re_password') is-invalid @enderror" aria-label="Large"
                                aria-describedby="inputGroup-sizing-sm">
                            @error('re_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- => End input password  !-->

                        <div class="m-4 col-12 m-auto">
                            <input name="" id="" type="submit" class="btn h_btn5 btn-block p-2 col-12"
                                value="{{ __('settings.save') }}">
                        </div>
                    </form>
                </div>



            </div>
        </div>
    </div>
    </div>
    <br><br>


@stop

@section('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    @if (session()->has('edit'))
        <script>
            swal("{{ __('settings.success') }}", '{{ __(session()->get('edit')) }}', "success");
        </script>
    @endif


    @if (session()->has('password'))
        <script>
            $('#change_password').show();
            $('#change_information').hide();
            $('.select_one option[value="change_password"]').prop('selected', true);
        </script>

    @else
        <script>
            $('#change_password').hide();
        </script>
    @endif


    <script>
        $(document).ready(function() {
            $('.select_gender option[value="{{ Auth::User()->gender }}"]').prop('selected', true)
        });
    </script>
@stop
