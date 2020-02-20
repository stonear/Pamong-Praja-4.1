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
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Bowlby+One+SC" />
    <style>
        .bosc {
            font-family: 'Bowlby One SC', sans-serif !important;
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
        <div class="container pt-3 bosc">
            <div class="d-flex align-content-around flex-wrap mb-3" id="navbar">
                <div class="py-2 pr-2"><h2><a href="{{ url('/') }}" class="text-dark">{{ config('app.name', 'Laravel') }}</a></h2></div>
                @yield('nav-item')
                @guest
                <div class="p-2 ml-auto"><a href="{{ route('login') }}" class="btn btn-warning">Masuk</a></div>
                @if (Route::has('register'))
                <div class="py-2 pl-2"><a href="{{ route('register') }}" class="btn btn-warning">Daftar</a></div>
                @endif
                @else
                <div class="py-2 pl-2 ml-auto">
                    <div class="dropdown">
                        <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
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
                    </div>
                </div>
                @endguest
            </div>
        </div>
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
    @yield('js')
</body>
</html>
