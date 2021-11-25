@extends('layouts.master')


@section('title')
    {{ __('index.title')}}
@endsection


@section('style')

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main_h.css">
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Font Awesome Library -->
    <link rel="stylesheet" href="{{ URL::asset('css/all.min.css') }}" />


    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@200;300;400;500;600;700;800&#038;display=swap"
        rel="stylesheet" />

@stop

@section('content')

    <div class="ground">


        <div class="container container-index">
            <h1>{{ __('index.title2')}}</h1>

            <p class="lead text-white m-0">
                {{ __('index.desc')}}
                <br><br>
                <a href="" class="typewrite" data-period="800" style="color: #fff; font-size: 20px"
                    data-type='[ "{{ __('index.desc1')}}", "{{ __('index.desc2')}}", "{{ __('index.desc3')}}", "{{ __('index.desc4')}}" ]'>
                    <span class="wrap"></span>
                </a>
            </p>


            <div class="row m-auto justify-content-center">
                @auth
                 
                <div class="col-12 col-md-5 col-lg-4 pb-3">
                    <a href="{{ route('home') }}"><button class="btn btn-block btn_register"> <i
                                class="fas fa-user"></i> {{ __('navbar.profile') }}</button></a>
                </div>

                @else

                <div class="col-12 col-md-5 col-lg-4 pb-3">
                    <a href="{{ route('register') }}"><button class="btn btn-block btn_register"> <i
                                class="fas fa-plus-circle"></i> {{ __('index.register')}}</button></a>
                </div>

                <div class="col-12 col-md-5 col-lg-4 pb-3">
                    <a href="{{ route('login') }}"><button class="btn btn-block btn_login"><i
                                class="fas fa-paper-plane mr-1 ml-1"></i>{{ __('index.login')}}</button></a>
                </div>
                @endauth
               


            </div>

        </div>

    </div>


    <svg style="position: relative; top: -5px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#CD00CD" fill-opacity="1" d="M0,288L17.1,256C34.3,224,69,160,103,149.3C137.1,139,171,181,206,181.3C240,181,274,139,309,154.7C342.9,171,377,245,411,277.3C445.7,309,480,299,514,261.3C548.6,224,583,160,617,112C651.4,64,686,32,720,37.3C754.3,43,789,85,823,128C857.1,171,891,213,926,218.7C960,224,994,192,1029,154.7C1062.9,117,1097,75,1131,96C1165.7,117,1200,203,1234,213.3C1268.6,224,1303,160,1337,138.7C1371.4,117,1406,139,1423,149.3L1440,160L1440,0L1422.9,0C1405.7,0,1371,0,1337,0C1302.9,0,1269,0,1234,0C1200,0,1166,0,1131,0C1097.1,0,1063,0,1029,0C994.3,0,960,0,926,0C891.4,0,857,0,823,0C788.6,0,754,0,720,0C685.7,0,651,0,617,0C582.9,0,549,0,514,0C480,0,446,0,411,0C377.1,0,343,0,309,0C274.3,0,240,0,206,0C171.4,0,137,0,103,0C68.6,0,34,0,17,0L0,0Z"></path></svg>


    <section class="section_steps bg-white mb-4">
        <div class="container pt-3">

            <h2 class="h_2 m-4">{{ __('index.steps')}}</h2>
            <br>
            <div class="row">

                <div class="col-md-4 text-center">
                    <img class="img-fluid img_step" src="{{ URL::asset('img/step1.png') }}" alt="img step one">
                    <h3 class="h_4 m-3">{{ __('index.steps_title1')}}</h3>
                    <p class="lead p_step">{{ __('index.steps_desc1')}}</p>
                </div>

                <div class="col-md-4 text-center">
                    <img class="img-fluid img_step" src="{{ URL::asset('img/step2.png') }}" alt=" img step tow">
                    <h3 class="h_4 m-3">{{ __('index.steps_title2')}}</h3>
                    <p class="lead p_step">{{ __('index.steps_desc2')}}</p>
                </div>

                <div class="col-md-4 text-center">
                    <img class="img-fluid img_step" src="{{ URL::asset('img/step3.png') }}" alt= "img step three">
                    <h3 class="h_4 m-3">{{ __('index.steps_title3')}}</h3>
                    <p class="lead p_step">{{ __('index.steps_desc3')}}</p>
                </div>

            </div>
        </div>
    </section>
    <br><br>

    <section class="step2 mb-4">
        <div class="container text-center">
            <h2 class="h_2">{{ __('index.question')}}</h2>

            <div class="col-md-6 m-auto">
                <img class="img-fluid img_step2" src="{{ URL::asset('img/question.svg') }}" alt="">

                <p class="mt-3 lead p_step">
                    {{ __('index.question_desc')}}
                </p>
            </div>
        </div>
    </section>
    <br>


    <!-- [ Start Latest users section ] -->
    <section id="latest users">
        <br>
        <div class="container mt-4 mb-4 pb-4">
          <div class="card card-body p-1 p-md-3">
    
              <h2 class="h_2">{{ __('index.suggested') }}</h2>
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
                                      class="btn h_btn4">
                                      <i class="fa fa-paper-plane"></i>
                                    </a>
                              @endauth
    
                          </div>
    
                      @endforeach
    
                  @endif
                  @if ($count_users == 0)
                      <div class="box_no_data">
                          <img src="{{ URL::asset('img/empty.svg') }}" alt="" class="img_no_data">
                          <h3 class="h_3 text_no_data mt-3">{{ __('index.no_date') }}</h3>
                      </div>
                  @endif
    
    
    
              </div>
    
          </div>
      </div>

        <br>
    </section>
    <!-- [ End contact us section ] -->

    

@stop

@section('scripts')

    <script type="text/javascript">
        var TxtType = function(el, toRotate, period) {
            this.toRotate = toRotate;
            this.el = el;
            this.loopNum = 0;
            this.period = parseInt(period, 10) || 2000;
            this.txt = '';
            this.tick();
            this.isDeleting = false;
        };

        TxtType.prototype.tick = function() {
            var i = this.loopNum % this.toRotate.length;
            var fullTxt = this.toRotate[i];

            if (this.isDeleting) {
                this.txt = fullTxt.substring(0, this.txt.length - 1);
            } else {
                this.txt = fullTxt.substring(0, this.txt.length + 1);
            }

            this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';

            var that = this;
            var delta = 200 - Math.random() * 100;

            if (this.isDeleting) {
                delta /= 2;
            }

            if (!this.isDeleting && this.txt === fullTxt) {
                delta = this.period;
                this.isDeleting = true;
            } else if (this.isDeleting && this.txt === '') {
                this.isDeleting = false;
                this.loopNum++;
                delta = 500;
            }

            setTimeout(function() {
                that.tick();
            }, delta);
        };

        window.onload = function() {
            var elements = document.getElementsByClassName('typewrite');
            for (var i = 0; i < elements.length; i++) {
                var toRotate = elements[i].getAttribute('data-type');
                var period = elements[i].getAttribute('data-period');
                if (toRotate) {
                    new TxtType(elements[i], JSON.parse(toRotate), period);
                }
            }
            // INJECT CSS
            var css = document.createElement("style");
            css.type = "text/css";
            css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
            document.body.appendChild(css);
        };
    </script>
@stop
