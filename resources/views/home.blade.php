@extends('layouts.master')


@section('title')
    {{ __('profile.title') }}
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

    <div class="container container_profile col-sm-10 col-md-11 col-lg-10 p-1 pt-4 pb-1 mb-4">
        <div class="shadow m-0">
            <div class="row m-0">

                <div class="box_img col-10 col-md-5 col-lg-3">
                    <figure class="figure">
                        <img src="{{ URL::asset('img/' . Auth::User()->pic) }}" class="figure-img img-fluid rounded"
                            alt="this image for {{ Auth::User()->name }}" data-toggle="tooltip" title="show image" id="myImg">
                    </figure>
                </div>

                <!-- The Modal -->
                <div id="myModal" class="modal modal_user">
                    <span class="close">&times;</span>
                    <img class="modal-content" id="img01">
                    <div id="caption"></div>
                </div>
                <div class="box_info_1 col-11 col-md-7 col-lg-9 m-auto">

                    <p class="lead username"><strong>{{ Auth::User()->name }}</strong><br></p>
                    <small class="col-12">{{ config('app.url') }}/w/{{ Auth::User()->username }}</small>
                    <br>
                    <a href="{{ route('settings') }}">
                        <button class="btn btn-outline-primary"> <i class="fa fa-cogs"></i>&nbsp;
                            {{ __('profile.EditProfile') }}</button>
                    </a>

                    <button data-toggle="modal" data-target="#copy_link_alert" class="btn btn-outline-secondary"> <i
                            class="fa fa-copy"></i>&nbsp; {{ __('profile.copyLink') }}</button>

                </div>

                <br><br>

                <div class="card card-body col-12">
                    <h4 class="h_5">{{ __('profile.brief') }}</h4>
                    <p class="lead">
                        {{ Auth::User()->brief_about_me }}
                    </p>
                </div>

                <div class="box_info col-lg-12">
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.link') }}:&nbsp;</strong><span>{{ config('app.url') }}/w/{{ Auth::User()->username }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.email') }}:&nbsp;</strong><span>{{ Auth::User()->email }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.phone') }}:&nbsp;</strong><span>{{ Auth::User()->phone }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.gender') }}:&nbsp;</strong><span>{{ __('profile.'.Auth::User()->gender) }}</span><br>
                    </p>
                    <p class="lead hover_padding row">
                        <strong>{{ __('profile.birthday') }}:&nbsp;</strong><span>{{ Auth::User()->birthday }}</span><br>
                    </p>
                </div>
            </div>


        </div>

    </div>


    <div class="container mt-4 mb-4 pb-4">
        <div class="card card-body p-1 p-md-3">

            <h2 class="h_2">{{ __('profile.suggested') }}</h2>
            <hr>

            <div class="row col-12 m-auto p-0 m-0">

                @if ($count_users > 0)


                    @foreach ($all_users as $users)

                        <div class="row box_frind col-md-10 col-lg-6 m-auto p-0 p-md-1">

                            <img class="img_user" src="{{ URL::asset('img/' . $users->pic) }}" alt="user image"
                                data-toggle="tooltip" data-placement="top" title="show profile">

                            <h5 class="col-7">{{ $users->name }}</h5>
                            <a href="profile/{{ $users->id }}" class="btn h_btn5">
                                <i class="fa fa-paper-plane"></i>
                            </a>
                        </div>

                    @endforeach

                @endif
                @if ($count_users == 0)
                    <div class="box_no_data">
                        <img src="{{ URL::asset('img/no_data.png') }}" alt="" class="img_no_data">
                        <h3 class="h_3 text_no_data">{{ __('profile.no_date') }}</h3>
                    </div>
                @endif



            </div>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-body p-0 m-0">
                    <img style="width: 100%" src="{{ URL::asset('img/' . Auth::User()->pic) }}" class="img-fluid"
                        alt="image title">

                </div>

            </div>
        </div>
    </div>

    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="copy_link_alert" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header text-info">
                    {{ __('profile.link_desc') }}
                </div>
                <div class="modal-body">
                    <input dir="auto" type="text" name="my_link" id="copyTarget" class="form-control"
                        value="{{ config('app.url') }}/w/{{ Auth::User()->username }}">
                </div>

                <div class="modal-footer">
                    <button id="close_modal" type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ __('profile.close') }}</button>
                    <button id="copyButton" type="button" class="btn btn-primary">{{ __('profile.copyLink') }}</button>
                </div>
            </div>
        </div>
    </div>

@stop

@section('scripts')
    <script>
        document.getElementById("copyButton").addEventListener("click", function() {
            copyToClipboard(document.getElementById("copyTarget"));
        });

        function copyToClipboard(elem) {
            // create hidden text element, if it doesn't already exist
            var targetId = "_hiddenCopyText_";
            var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
            var origSelectionStart, origSelectionEnd;
            if (isInput) {
                // can just use the original source element for the selection and copy
                target = elem;
                origSelectionStart = elem.selectionStart;
                origSelectionEnd = elem.selectionEnd;
            } else {
                // must use a temporary form element for the selection and copy
                target = document.getElementById(targetId);
                if (!target) {
                    var target = document.createElement("textarea");
                    target.style.position = "absolute";
                    target.style.left = "-9999px";
                    target.style.top = "0";
                    target.id = targetId;
                    document.body.appendChild(target);
                }
                target.textContent = elem.textContent;
            }
            // select the content
            var currentFocus = document.activeElement;
            target.focus();
            target.setSelectionRange(0, target.value.length);

            // copy the selection
            var succeed;
            try {
                succeed = document.execCommand("copy");

                $('#close_modal').click();

                swal("{{ __('profile.done') }}", "{{ __('profile.done_desc') }}", "success");

            } catch (e) {
                succeed = false;
            }
            // restore original focus
            if (currentFocus && typeof currentFocus.focus === "function") {
                currentFocus.focus();
            }

            if (isInput) {
                // restore prior selection
                elem.setSelectionRange(origSelectionStart, origSelectionEnd);
            } else {
                // clear temporary content
                target.textContent = "";
            }
            return succeed;

        }
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@stop
