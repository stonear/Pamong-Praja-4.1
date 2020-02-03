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

    <style>
        #about {
            background: #212529;
            color: #fff;
            padding: 60px 0 40px 0;
        }
        .align-middle {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
        }
        body {
            background: #e9ecef;
            padding-top: 56px;
        }
        footer {
            background: #212529;
        }
        .img-sponsors {
            margin: 20px 10px 20px 10px;
        }
        .jumbotron {
            margin-bottom: unset;
            padding-bottom: unset;
        }
        .map-responsive{
            overflow:hidden;
            padding-bottom:56.25%;
            position:relative;
            height:0;
        }
        .map-responsive iframe{
            left:0;
            top:0;
            height:100%;
            width:100%;
            position:absolute;
        }
    </style>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-dark navbar-expand-md bg-dark justify-content-center fixed-top" id="navbar">
        <a href="#" class="navbar-brand mr-0">
            <img src="{{ URL::to('/') }}/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
            <!-- {{ config('app.name', 'Laravel') }} -->
        </a> 
        <button class="navbar-toggler ml-1" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse justify-content-between align-items-center w-100" id="collapsingNavbar">
            <ul class="navbar-nav mx-auto text-center">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#venue">Venue</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#sponsors">Sponsors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#faq">FAQs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
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
                </li>
            </ul>
        </div>
    </nav>
    <section id="home">
        <img src="{{ URL::to('/') }}/banner.png" class="img-fluid" alt="Responsive image">
    </section>
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2>About The Event</h2>
                    <p>Untuk mempererat silaturahmi dan sekaligus napak tilas jejak perjalanan APDN Malang sejak Tahun 1956 hingga sekarang, maka akan dilaksanakan serangkaian kegiatan kreatif sebagai bentuk sumbangsih pemikiran bagi profesi kepamongprajaan dan perkembangan ilmu pemerintahan baru menghadapi Era Revolusi Industri 4.0 di semua lini pemerintahan. Kegiatan ini bertema : "<b>Pamong Praja 4.1: Seorang Pemimpin Harus Selangkah Lebih Maju dari Eranya</b>".</p>
                </div>
                <div class="col-lg-3">
                    <h3>Where</h3>
                    <p>
                        <b>Seminar Nasional:</b><br/>Ballroom Hayam Wuruk Hotel Aria Gajayana Malang, Jawa Timur<br/>
                        <b>Reuni Akbar APDN:</b><br/>Kampus APDN Malang<br/>
                        <b>Pamong Fun Run:</b><br/>Mengelilingi Kampus APDN Malang<br/>
                    </p>
                </div>
                <div class="col-lg-3">
                    <h3>When</h3>
                    <p>
                        <b>Seminar Nasional:</b><br/>Sabtu, 21 Maret 2020, 09.00 WIB - 14.00 WIB<br/>
                        <b>Reuni Akbar APDN:</b><br/>Sabtu, 21 Maret 2020<br/>
                        <b>Pamong Fun Run:</b><br/>Minggu, 22 Maret 2020<br/>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section id="venue" class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Event Venue</h1>
            <p class="lead text-muted">Event venue location info</p>
        </div>
        <div class="map-responsive">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.2080751162466!2d112.62179691475924!3d-7.9774336817424665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd628212a62142d%3A0x8a9a708ff2fc1407!2sHotel%20Aria%20Gajayana%20-%20Malang!5e0!3m2!1sen!2sid!4v1580697073534!5m2!1sen!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>
    </section>
    <section id="sponsors" class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Beloved Sponsor</h1>
            <div class="row justify-content-center flex-wrap align-middle">
                <img src="{{ URL::to('/') }}/sponsor1.png" class="img-sponsors" alt="Responsive image" height="150" width="auto">
                <img src="{{ URL::to('/') }}/sponsor2.png" class="img-sponsors" alt="Responsive image" height="150" width="auto">
                <img src="{{ URL::to('/') }}/sponsor3.png" class="img-sponsors" alt="Responsive image" height="200" width="auto">
                <img src="{{ URL::to('/') }}/sponsor4.png" class="img-sponsors" alt="Responsive image" height="150" width="auto">
                <img src="{{ URL::to('/') }}/sponsor5.png" class="img-sponsors" alt="Responsive image" height="150" width="auto">
            </div>
            <div class="row justify-content-center flex-wrap align-middle">
                <img src="{{ URL::to('/') }}/sponsor6.png" class="img-sponsors" alt="Responsive image" height="150" width="auto">
            </div>
        </div>
    </section>
    <section id="faq" class="jumbotron">
        <div class="container">
            <h1 class="jumbotron-heading text-center">FAQs</h1>
            <div class="pb-4">
                <div>
                    <h4>Q: What is Lorem Ipsum?</h4>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five http://jquery2dotnet.com/ centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    </p>
                </div>
                <div>
                    <h4>Q: What is Lorem Ipsum?</h4>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five http://jquery2dotnet.com/ centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    </p>
                </div>
                <div>
                    <h4>Q: What is Lorem Ipsum?</h4>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five http://jquery2dotnet.com/ centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    </p>
                </div>
                <div>
                    <h4>Q: What is Lorem Ipsum?</h4>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five http://jquery2dotnet.com/ centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    </p>
                </div>
                <div>
                    <h4>Q: What is Lorem Ipsum?</h4>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five http://jquery2dotnet.com/ centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section id="contact" class="jumbotron text-center text-white py-4 bg-dark">
        <div class="container">
            <h1 class="jumbotron-heading">Contact Us</h1>
            <div class="row">
                <div class="col-md-4 border-right">
                    <h4>Address</h4>
                    <p>A108 Adam Street, NY 535022, USA</p>
                </div>
                <div class="col-md-4">
                    <h4>Phone Number (WA)</h4>
                    <p><a href="https://api.whatsapp.com/send?phone=6281888888888" class="text-white">John Doe +6281888888888</a></p>
                </div>
                <div class="col-md-4 border-left">
                    <h4>Email</h4>
                    <p><a href="mailto:info@example.com" class="text-white">info@example.com</a></p>
                </div>
            </div>
        </div>
    </section>
    <footer class="py-4 text-white-50">
        <div class="container text-center">
            <small>{{ config('app.name', 'Laravel') }} @ {{ date("Y") }}. All Rights Reserved.</small>
            <br/>
            <small>Created by <a href="https://github.com/stonear" class="text-white">A. R. Stone</a></small>
        </div>
    </footer>
    <script>
        $(document).ready(function(){
            $('body').scrollspy({target: ".navbar", offset: 50});   
            $("#navbar a").on('click', function(event) {
                if (this.hash !== "") {
                    event.preventDefault();

                    var hash = this.hash;

                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 800, function(){
                        window.location.hash = hash;
                    });
                }f
            });
        });
    </script>
</body>
</html>