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
            margin: unset;
            padding: 20px 0px 0px 0px;
        }
        .jumbotron-heading {
            font-family: 'Bowlby One SC', sans-serif !important;
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
        <div class="navbar-collapse collapse justify-content-between align-items-center w-100 bosc" id="collapsingNavbar">
            <ul class="navbar-nav mx-auto text-center">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">Tentang Event</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#venue">Venue</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#sponsors">Sponsor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#faq">FAQs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Kontak</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
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
                    <h2 class="bosc">Tentang Event</h2>
                    <p>Untuk mempererat silaturahmi dan sekaligus napak tilas jejak perjalanan APDN Malang sejak Tahun 1956 hingga sekarang, maka akan dilaksanakan serangkaian kegiatan kreatif sebagai bentuk sumbangsih pemikiran bagi profesi kepamongprajaan dan perkembangan ilmu pemerintahan baru menghadapi Era Revolusi Industri 4.0 di semua lini pemerintahan. Kegiatan ini bertema : "<b>Pamong Praja 4.1: Seorang Pemimpin Harus Selangkah Lebih Maju dari Eranya</b>".</p>
                </div>
                <div class="col-lg-3">
                    <h3 class="bosc">Di mana?</h3>
                    <p>
                        <b>Seminar Nasional:</b><br/>Ballroom Hayam Wuruk Hotel Aria Gajayana Malang, Jawa Timur<br/>
                        <b>Reuni Akbar APDN:</b><br/>Kampus APDN Malang<br/>
                        <b>Pamong Fun Run:</b><br/>Mengelilingi Kampus APDN Malang<br/>
                    </p>
                </div>
                <div class="col-lg-3">
                    <h3 class="bosc">Kapan?</h3>
                    <p>
                        <b>Seminar Nasional:</b><br/>Sabtu, 21 Maret 2020, 09.00 WIB - 14.00 WIB<br/>
                        <b>Reuni Akbar APDN:</b><br/>Sabtu, 21 Maret 2020<br/>
                        <b>Pamong Fun Run:</b><br/>Minggu, 22 Maret 2020<br/>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section id="rute-perlombaan" class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Rute Perlombaan</h1>
            <img src="{{ URL::to('/') }}/route.png" class="img-fluid" alt="Responsive image">
                
        </div>
    </section>
    <section id="racepack" class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Pengambilan Racepack</h1>
            <img src="{{ URL::to('/') }}/racepack.png" class="img-fluid" alt="Responsive image">
            <blockquote class="blockquote px-5">
                <div class="text-left">
                    <ul>
                        <li>Finisher medali akan dibagikan kepada peserta di garis finish dengan menunjukkan gelang yang diperoleh di Posko Manggala.</li>
                        <li>Pengambilan goodiebag seminar nasional dilaksanakan pada hari pelaksanaan disaat melaksanakan registrasi ulang sebelum pelaksanaan seminar dimulai.</li>
                        <li>Pengambilan perlengkapan peserta fun run dapat dilaksanakan mulai tanggal 20 - 21 Maret 2020 bertempat di Eks. Kampus APDN Malang, Jl. Kawi No. 41 Malang.</li>
                    </ul>
                </div>
            </blockquote>
        </div>
    </section>
    <section id="racepack" class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Syarat Pengambilan Racepack</h1>
            <blockquote class="blockquote px-5">
                <div class="text-left">
                    <ul>
                        <li>Membawa dan menunjukkan bukti registrasi.</li>
                        <li>Membawa KTP / Kartu Indentitas asli dan fotokopi</li>
                        <li>Membawa surat kuasa untuk yang diwakilkan.</li>
                    </ul>
                </div>
            </blockquote>
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
                <img src="{{ URL::to('/') }}/sponsor1.png" class="img-sponsors" alt="Responsive image" height="80" width="auto">
                <img src="{{ URL::to('/') }}/sponsor2.png" class="img-sponsors" alt="Responsive image" height="80" width="auto">
                <img src="{{ URL::to('/') }}/sponsor3.png" class="img-sponsors" alt="Responsive image" height="110" width="auto">
                <img src="{{ URL::to('/') }}/sponsor4.png" class="img-sponsors" alt="Responsive image" height="80" width="auto">
                <img src="{{ URL::to('/') }}/sponsor5.png" class="img-sponsors" alt="Responsive image" height="80" width="auto">
            </div>
            <div class="row justify-content-center flex-wrap align-middle">
                <img src="{{ URL::to('/') }}/sponsor6.png" class="img-sponsors" alt="Responsive image" height="80" width="auto">
            </div>
        </div>
    </section>
    <section id="faq" class="jumbotron">
        <div class="container">
            <h1 class="jumbotron-heading text-center">FAQs</h1>
            <blockquote class="blockquote px-5">
                <div class="pb-4">
                    <div>
                        <h4>Q: Kapan kegiatan Pamong Praja 4.1 diselenggarakan?</h4>
                        <p>
                            Sabtu – Minggu, 21 – 22 Maret 2020.
                        </p>
                    </div>
                    <div>
                        <h4>Q: Dimana kegiatan Pamong Praja 4.1 diselenggarakan?</h4>
                        <p>
                            Di Kota Malang, tepatnya di sekitar Eks. Kampus APDN Malang, Jl. Kawi No. 41 Malang.
                        </p>
                    </div>
                    <div>
                        <h4>Q: Kegiatan Pamong Praja 4.1 terdiri dari apa saja?</h4>
                        <p>
                            Pamong Praja 4.1 merupakan serangkaian kegiatan yang terdiri dari:
                            <ol>
                                <li>Seminar Nasional</li>
                                <li>Malam Inaugurasi Pamong Praja</li>
                                <li>Fun Run</li>
                            </ol>
                        </p>
                    </div>
                    <div>
                        <h4>Q: Berapa harga tiket untuk kegiatan Pamong Praja 4.1?</h4>
                        <p>
                            Untuk harga satuan:
                            <ol>
                                <li>Seminar Nasional Rp. 300.000,-</li>
                                <li>Malam Inaugurasi Pamong Praja Rp. 150.000,-</li>
                                <li>Fun Run Rp. 200.000,-</li>
                            </ol>
                            Untuk harga paket:
                            <ol>
                                <li>Paket Lengkap Rp. 550.000,-</li>
                                <li>Paket Seminar Nasional dan Malam Inaugurasi Pamong Praja Rp. 400.000,-</li>
                                <li>Paket Malam Inaugurasi dan Fun Run Rp. 325.000,-</li>
                                <li>Paket Seminar Nasional dan Fun Run Rp. 450.000,-</li>
                            </ol>
                        </p>
                    </div>
                    <div>
                        <h4>Q: Apakah ada harga tiket diskon?</h4>
                        <p>
                            Untuk tiket Fun Run berlaku ketentuan, bagi 41 pendaftar pertama Rp. 150.000,-. Bagi 241 pendaftar berikutnya Rp. 175.000,- dan untuk pendaftar selanjutnya harga tiket normal yaitu Rp. 200.000,-.
                        </p>
                    </div>
                    <div>
                        <h4>Q: Seminar Nasional Pamong Praja 4.1 kapan diselenggarakan?</h4>
                        <p>
                            Sabtu, 21 Maret 2020
                        </p>
                    </div>
                    <div>
                        <h4>Q: Jam berapa Seminar Nasional Pamong Praja 4.1 dimulai?</h4>
                        <p>
                            Registrasi dimulai pukul 08.00 WIB, Acara mulai pukul 09.00 WIB sampai dengan selesai.
                        </p>
                    </div>
                    <div>
                        <h4>Q: Dimana Seminar Nasional Pamong Praja 4.1 diselenggarakan?</h4>
                        <p>
                            Di Ball Room Hayam Wuruk, Hotel Aria Gajayana, Jl. Kawi No. 24, Kauman, Kecamatan Klojen, Kota Malang.
                        </p>
                    </div>
                    <div>
                        <h4>Q: Siapa saja yang menjadi Narasumber dalam Seminar Nasional Pamong Praja 4.1?</h4>
                        <p>
                            Ibu Khofifah Indar Parawansa (Gubernur Jawa Timur).<br/>Bpk. Tito Karnavian (Menteri Dalam Negeri RI).<br/>
                            Bpk. Nadiem Makariem (Menteri Pendidikan dan Kebudayaan RI).<br/>
                            Bpk. Abdullah Azwar Anas (Bupati Banyuwangi).<br/>
                            Bpk. Prof. Rhenald Kasali (Akademisi/Motivator).
                        </p>
                    </div>
                    <div>
                        <h4>Q: Apakah Tema Seminar Nasional Pamong Praja 4.1?</h4>
                        <p>
                            Pamong Praja 4.1 : Seorang Pemimpin Harus Selangkah Lebih Maju dari Eranya.
                        </p>
                    </div>
                    <div>
                        <h4>Q: Siapa saja yang diharapkan menjadi peserta dalam Seminar Nasional Pamong Praja 4.1?</h4>
                        <p>
                            Seluruh Pejabat Pemerintahan mulai dari Gubernur, Bupati/Walikota, Aparatur Sipil Negara, Akademisi, Mahasiswa, Purna Praja dan Masyarakat Umum.
                        </p>
                    </div>
                    <div>
                        <h4>Q: Apa yang akan kita dapatkan dari Acara Seminar Nasional Pamong Praja 4.1?</h4>
                        <p>
                            Peserta mendapat Goodiebag, Seminar Kit, Tumbler, Sertifikat, Coffe Break 1 kali dan Makan Siang.
                        </p>
                    </div>
                    <div>
                        <h4>Q: Kapan Pamong Fun Run diselenggarakan?</h4>
                        <p>
                            Minggu, 22 Maret 2020.
                        </p>
                    </div>
                    <div>
                        <h4>Q: Jam berapa lari dimulai?</h4>
                        <p>
                            Berkumpul di Simpang Balapan pukul 05.30 WIB dan lari akan dimulai pada pukul 06.00 WIB.
                        </p>
                    </div>
                    <div>
                        <h4>Q: Dimana Pamong Fun Run diselenggarakan?</h4>
                        <p>
                            Sekitar Kampus APDN Malang, Jl. Kawi 41 Malang.
                        </p>
                    </div>
                    <div>
                        <h4>Q: Berapa kategori jarak Pamong Fun Run?</h4>
                        <p>
                            4.1 K++ (kurang lebih 5 KM).
                        </p>
                    </div>
                    <div>
                        <h4>Q: Siapa saja yang diharapkan menjadi peserta dalam Pamong Fun Run?</h4>
                        <p>
                            Siapa saja boleh bergabung dalam Pamong Fun Run, Anak-anak, Wanita, Pria, baik masyarakat umum ataupun Purna Praja.
                        </p>
                    </div>
                    <div>
                        <h4>Q: Apa yang akan diperoleh peserta?</h4>
                        <p>
                            BIB (Nomor dada), jersey/kaos dan finisher medal.
                        </p>
                    </div>
                    <div>
                        <h4>Q: Setelah lari akan ada acara apa?</h4>
                        <p>
                            Setelah lari selesai, peserta akan dihibur dengan entertainment, bazaar dan doorprize menarik.
                        </p>
                    </div>
                    <div>
                        <h4>Q: Apakah pengambilan perlengkapan dapat diwakilkan?</h4>
                        <p>
                            Pengambilan racepack dapat diwakilkan dengan surat kuasa bermaterai dan fotocopy pemberi kuasa (pemilik tiket asli yang tertera dalam email tanda terima).
                        </p>
                    </div>
                    <div>
                        <h4>Q: Untuk malam inaugurasi bagaimana?</h4>
                        <p>
                            Malam inaugurasi dilaksanakan pada tanggal 21 Maret 2020, di mulai pukul 18.00 WIB.
                        </p>
                    </div>
                    <div>
                        <h4>Q: Apa yang dilaksanakan pada acara malam inaugurasi Pamong Praja?</h4>
                        <p>
                            Malam inaugurasi merupakan malam berkumpulnya kembali para Pamong Praja dari para Purna Praja untuk mengenang kembali masa-masa di lembaga pendidikan yang dikemas dengan nuansa santai dan kembali ke tempo dulu.
                        </p>
                    </div>
                </div>
            </blockquote>
        </div>
    </section>
    <section id="contact" class="text-center text-white py-4 bg-dark">
        <div class="container bosc">
            <h1>Narahubung</h1>
            <div class="row">
                <div class="col-sm-4">
                    <h4>Pamong Jaga 1</h4>
                    <p><a href="https://api.whatsapp.com/send?phone=628113514141" class="text-white">+628113514141</a></p>
                </div>
                <div class="col-sm-4 border-right border-left">
                    <h4>Pamong Jaga 2</h4>
                    <p><a href="https://api.whatsapp.com/send?phone=628113524141" class="text-white">+628113524141</a></p>
                </div>
                <div class="col-sm-4">
                    <h4>Pamong Sponsor</h4>
                    <p><a href="https://api.whatsapp.com/send?phone=628113544141" class="text-white">+628113544141</a></p>
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