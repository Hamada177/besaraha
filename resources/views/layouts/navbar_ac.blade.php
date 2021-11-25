<!-- Start Nave Bar !-->
<nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color:var(--color-1) !important;">

    <div class="container">
        <a class="navbar-brand" href="../">
            <strong><span>{{ config('app.name') }}</span><span class="last_link"></span></strong>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">

               

                <li class="nav-item">
                    <a class="nav-link hover-bar" href="{{ route('home') }}">

                        <img src="{{ URL::asset('img/' . Auth::User()->pic) }}" class="rounded" alt="image tit"
                            style="width: 25px;border-radius: 50px">

                        {{ __('navbar.profile') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link hover-bar" href="{{ '/messages' }}"><i
                            class="fas fa-lg fa-envelope p-1"></i>{{ __('navbar.messages') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link hover-bar" href="{{ route('settings') }}"><i
                            class="fas fa-lg fa-cogs p-1"></i>{{ __('navbar.settings') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link hover-bar" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i
                            class="fas fa-lg fa-sign-out-alt p-1"></i>{{ __('navbar.logout') }}</a>
                    <form action="{{ route('logout') }}" id="logout-form" method="post" style="display: none">@csrf
                    </form>
                </li>


                <li dir="ltr" class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle hover-bar" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                            class="fa fa-lg fa-language "></i>
                    </a>
                    <div class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
                        @if (App::getLocale() == 'arb')
                            <a class="dropdown-item" href="/locale/en">{{ __('navbar.english') }}</a>
                            <a class="dropdown-item active_lang" href="/locale/arb">{{ __('navbar.arabic') }}</a>
                            <a class="dropdown-item" href="/locale/fre">{{ __('navbar.french') }}</a>
                        @endif

                        @if (App::getLocale() == 'en')
                            <a class="dropdown-item active_lang" href="/locale/en">{{ __('navbar.english') }}</a>
                            <a class="dropdown-item" href="/locale/arb">{{ __('navbar.arabic') }}</a>
                            <a class="dropdown-item" href="/locale/fre">{{ __('navbar.french') }}</a>
                        @endif

                        @if (App::getLocale() == 'fre')
                            <a class="dropdown-item " href="/locale/en">{{ __('navbar.english') }}</a>
                            <a class="dropdown-item" href="/locale/arb">{{ __('navbar.arabic') }}</a>
                            <a class="dropdown-item active_lang" href="/locale/fre">{{ __('navbar.french') }}</a>
                        @endif
                    </div>
                </li>

            </ul>
        </div>
    </div>
</nav>
<!-- End Nave bar !-->
