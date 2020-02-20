<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Bowlby+One+SC" />
    <style>
        .bosc {
            font-family: 'Bowlby One SC', sans-serif !important;
        }
        .nav-link {
            color: white;
        }
        .nav-link:hover, .nav-link:focus {
            color: #f3cb17;
        }
        .primary_background {
            background-color: #18499c;
        }
        #navbar_mobile {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 2;
            cursor: pointer;
            font-size: 3em;
        }
        #navbar_mobile .fa {
            font-size: 4rem;
        }
        b {
            color: red;
        }
        body {
            padding-top: 3.5rem;
        }
    </style>
    @yield('css')

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
    <div id="app">
        <div id="navbar_mobile" class="primary_background bosc">
            <div class="col-sm-12 p-0 d-flex flex-column">
                <div class="px-0">
                    <nav class="navbar navbar-expand-lg navbar-dark my-3">
                        <a href="#" class="navbar-brand ml-auto"><i class="fa fa-times" aria-hidden="true" id="fa-times"></i></a>
                    </nav>
                </div>
                <ul class="navbar-nav my-auto text-center">
                    @yield('nav-item')
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Masuk</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Daftar</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ Auth::user()->name }}</a>
                    </li>
                    @if(Auth::user()->role == 'USER')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @endguest
                </ul>     
            </div>   
        </div>
        <nav class="navbar navbar-expand-md primary_background justify-content-center fixed-top" id="navbar">
            <a href="{{ URL::to('/') }}" class="navbar-brand mr-0">
                <img src="{{ URL::to('/') }}/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
                <!-- {{ config('app.name', 'Laravel') }} -->
            </a> 
            <div class="navbar-collapse collapse justify-content-between align-items-center w-100 bosc" id="collapsingNavbar">
                <ul class="navbar-nav mx-auto text-center">
                    @yield('nav-item')
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Masuk</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Daftar</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @if(Auth::user()->role == 'USER')
                            <a class="dropdown-item" href="{{ route('home') }}">Home</a>
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
            <button class="navbar-toggler mr-3 ml-auto text-light" type="button" id="navbar-toggler">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
        <footer class="py-4">
            <div class="container text-center">
                <small>{{ config('app.name', 'Laravel') }} @ {{ date("Y") }}. All Rights Reserved.</small>
                <br/>
                <small>Created by <a href="https://github.com/stonear">A. R. Stone</a></small>
            </div>
        </footer>
    </div>
    <script>
        function show() {
            $("#navbar_mobile").show();
            $("#navbar").hide();
        }
        function hide() {
            $("#navbar_mobile").hide();
            $("#navbar").show();
        }
        $(document).ready(function(){
            hide();
            $("body").scrollspy({target: ".navbar", offset: 50});   
            $("#navbar a, #navbar_mobile a").on('click', function(event) {
                hide();
                if (this.hash !== "") {
                    event.preventDefault();

                    var hash = this.hash;

                    $("html, body").animate({
                        scrollTop: $(hash).offset().top
                    }, 800, function(){
                        window.location.hash = hash;
                    });
                }
            });
            $("#navbar-toggler").on('click', show);
            $("#fa-times").on('click', hide);
        });
    </script>
    @yield('js')
</body>
</html>