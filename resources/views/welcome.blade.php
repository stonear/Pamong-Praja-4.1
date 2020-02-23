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
        .about {
            text-indent: 50px;
        }
        .alert {
            border-radius: 0;
        }
        .bosc {
            font-family: 'Bowlby One SC', sans-serif !important;
        }
        .running_text {
            padding-bottom: 0px;
            padding-top: 5px;
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
            color: #e31e26;
        }
        body {
            padding-top: 3.5rem;
        }
        h1 {
            color: #e31e26;
            font-size: 3rem;
            margin-top: 6rem;
        }
        @media only screen and (min-width: 768px) {
            h1 {
                font-size: 4.5rem;
            }
        }
    </style>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
    <div id="navbar_mobile" class="primary_background bosc">
        <div class="col-sm-12 p-0 d-flex flex-column">
            <div class="px-0">
                <nav class="navbar navbar-expand-lg navbar-dark my-3">
                    <a href="#" class="navbar-brand ml-auto"><i class="fa fa-times" aria-hidden="true" id="fa-times"></i></a>
                </nav>
            </div>
            <ul class="navbar-nav my-auto text-center">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#seminar">Seminar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#mipp">MIPP</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#funrun">Fun Run</a>
                </li>
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
    </div>
    <nav class="navbar navbar-expand-md primary_background justify-content-center fixed-top" id="navbar">
        <a href="#" class="navbar-brand mr-0">
            <img src="{{ URL::to('/') }}/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
            <!-- {{ config('app.name', 'Laravel') }} -->
        </a> 
        <div class="navbar-collapse collapse justify-content-between align-items-center w-100 bosc" id="collapsingNavbar">
            <ul class="navbar-nav mx-auto text-center">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#seminar">Seminar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#mipp">MIPP</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#funrun">Fun Run</a>
                </li>
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
    <div class="alert alert-danger mb-0 running_text" role="alert">
        @php
        $now = new DateTime();
        $to = new DateTime("2020-03-21");

        if($now <= $to) $diff = $to->diff($now)->format("%a");
        else $diff = 0;
        @endphp
        <marquee behavior="scroll" direction="left" class=""><h3><b>Counting Down: H – {{ $diff }}</b></h3></marquee>
    </div>
    <section id="home">
        <img src="{{ URL::to('/') }}/20.02.2020/01.png" class="img-fluid" alt="Responsive image" width="100%" height="auto" />
        <div class="container">
            <div class="text-center">
                <img src="{{ URL::to('/') }}/20.02.2020/06.png" class="img-fluid" alt="Responsive image" />
            </div>
            <h3 class="text-center bosc">Tentang Event</h3>
            <p class="text-justify about">
                Kemajuan zaman yang ditandai dengan hadirnya Revolusi Industri 4.0 menjadi peluang sekaligus ancaman, namun bagi seorang Pamong Praja dituntut untuk selalu dapat mengikuti perkembangan zaman, sehingga penguasaan dan kemampuan dalam kompetensi, kepemimpinan dan integritas adalah sebuah keniscayaan yang WAJIB dimiliki oleh seorang Pamong Praja. Perpaduan, kolaborasi, integrasi dan sinergi Ilmu Pemerintahan Baru atau <b>KYBERNOLOGI</b> dengan Kemampuan dalam penguasaan teknologi informasi digital/cyber atau <b>CYBERTECHNOLOGY</b>, menjadi trend baru dalam praktek kepemimpinan kepemerintahan saat ini, yang diharapkan dapat menghasilkan inovasi-inovasi baru dalam pelayanan publik bagi masyarakat. Purna Praja yang notabene adalah Pamong Praja dituntut untuk selalu selangkah lebih maju dari eranya, yang kemudian kami deklarasikan dengan istilah <b>PAMONG PRAJA 4.1</b>, yang mengandung makna bahwa seorang Pamong Praja saat ini harus memiliki kompetensi, kepemimpinan dan integritas yang selangkah lebih maju dalam bersiap-siap menghadapi era Revolusi Industri 4.0.
            </p>
            <p class="text-justify about">
                Dewan  Pengurus  Provinsi  Ikatan  Keluarga  Alumni  Pendidikan  Tinggi Kepamongprajaan (DPP IKAPTK) Jawa Timur akan melaksanakan serangkaian kegiatan kreatif sebagai bentuk sumbangsih pemikiran bagi profesi kepamongprajaan dan perkembangan ilmu pemerintahan baru menghadapi Era Revolusi Industri 4.0 di semua lini pemerintahan. Kegiatan ini bertema <b>“Pamong Praja 4.1 : Seorang Pemimpin Harus Selangkah Lebih Maju dari Eranya.”</b>
            </p>
            <p class="text-justify about">
                Kegiatan tersebut diharapkan layak untuk diikuti oleh segenap Unsur Aparatur Pemerintahan, Akademisi, Mahasiswa, Masyarakat Umum utamanya dalam ruang lingkup rumpun ilmu pemerintahan serta Purna Praja yang diharapkan dapat menjadi media sosialisasi dan kolaborasi untuk bekerja bersama bergotong royong membangun masyarakat, membangun Indonesia.
            </p>
        </div>
    </section>
    <section id="faq">
        <div class="container">
            <h4 class="text-center bosc">FAQs</h4>
            <div>
                <b>Q: Kapan kegiatan Pamong Praja 4.1 diselenggarakan?</b>
                <p>
                    Sabtu – Minggu, 21 – 22 Maret 2020.
                </p>
            </div>
            <div>
                <b>Q: Dimana kegiatan Pamong Praja 4.1 diselenggarakan?</b>
                <p>
                    Di Kota Malang, tepatnya di sekitar Eks. Kampus APDN Malang, Jl. Kawi No. 41 Malang.
                </p>
            </div>
            <div>
                <b>Q: Kegiatan Pamong Praja 4.1 terdiri dari apa saja?</b>
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
                <b>Q: Surat Undangan bisa diunduh dimana?</b>
                <p>
                    Surat Undangan bisa diunduh <a href="#">di sini.</a>
                </p>
            </div>
        </div>
    </section>
    <section id="seminar">
        <div class="container">
            <h1 class="text-center bosc">Seminar Nasional</h1>
            <img src="{{ URL::to('/') }}/20.02.2020/02.png" class="img-fluid" alt="Responsive image">
            <h4 class="text-center bosc">Pengambilan Goodiebag</h4>
            <ul>
                <li>Pengambilan goodiebag seminar nasional dilaksanakan pada hari pelaksanaan disaat melaksanakan registrasi ulang sebelum pelaksanaan seminar dimulai.</li>
            </ul>
            <h4 class="text-center bosc">FAQs</h4>
            <div>
                <b>Q: Seminar Nasional Pamong Praja 4.1 kapan diselenggarakan?</b>
                <p>
                    Sabtu, 21 Maret 2020
                </p>
            </div>
            <div>
                <b>Q: Jam berapa Seminar Nasional Pamong Praja 4.1 dimulai?</b>
                <p>
                    Registrasi dimulai pukul 08.00 WIB, Acara mulai pukul 09.00 WIB sampai dengan selesai.
                </p>
            </div>
            <div>
                <b>Q: Dimana Seminar Nasional Pamong Praja 4.1 diselenggarakan?</b>
                <p>
                    Di Ball Room Hayam Wuruk, Hotel Aria Gajayana, Jl. Kawi No. 24, Kauman, Kecamatan Klojen, Kota Malang.
                </p>
            </div>
            <div>
                <b>Q: Siapa saja yang menjadi Narasumber dalam Seminar Nasional Pamong Praja 4.1?</b>
                <p>
                    Ibu Khofifah Indar Parawansa (Gubernur Jawa Timur).<br/>
                    Bpk. Tito Karnavian (Menteri Dalam Negeri RI).<br/>
                    Bpk. Nadiem Makariem (Menteri Pendidikan dan Kebudayaan RI).<br/>
                    Bpk. Abdullah Azwar Anas (Bupati Banyuwangi).<br/>
                    Bpk. Prof. Rhenald Kasali (Akademisi/Motivator).
                </p>
            </div>
            <div>
                <b>Q: Apakah Tema Seminar Nasional Pamong Praja 4.1?</b>
                <p>
                    Pamong Praja 4.1 : Seorang Pemimpin Harus Selangkah Lebih Maju dari Eranya.
                </p>
            </div>
            <div>
                <b>Q: Siapa saja yang diharapkan menjadi peserta dalam Seminar Nasional Pamong Praja 4.1?</b>
                <p>
                    Seluruh Pejabat Pemerintahan mulai dari Gubernur, Bupati/Walikota, Aparatur Sipil Negara, Akademisi, Mahasiswa, Purna Praja dan Masyarakat Umum.
                </p>
            </div>
            <div>
                <b>Q: Apa yang akan kita dapatkan dari Acara Seminar Nasional Pamong Praja 4.1?</b>
                <p>
                    Peserta mendapat Goodiebag, Seminar Kit, Tumbler, Sertifikat, Coffe Break 1 kali dan Makan Siang.
                </p>
            </div>
        </div>
    </section>
    <section id="mipp">
        <div class="container">
            <h1 class="text-center bosc">Malam Inaugurasi Pamong Praja 4.1</h1>
            <img src="{{ URL::to('/') }}/20.02.2020/03.png" class="img-fluid" alt="Responsive image">
            <h4 class="text-center bosc">FAQs</h4>
            <div>
                <b>Q: Untuk malam inaugurasi bagaimana?</b>
                <p>
                    Malam inaugurasi dilaksanakan pada tanggal 21 Maret 2020, di mulai pukul 18.00 WIB.
                </p>
            </div>
            <div>
                <b>Q: Apa yang dilaksanakan pada acara malam inaugurasi Pamong Praja?</b>
                <p>
                    Malam inaugurasi merupakan malam berkumpulnya kembali para Pamong Praja dari para Purna Praja untuk mengenang kembali masa-masa di lembaga pendidikan yang dikemas dengan nuansa santai dan kembali ke tempo dulu.
                </p>
            </div>
        </div>
    </section>
    <section id="funrun">
        <div class="container">
            <h1 class="text-center bosc">Pamong Fun Run</h1>
            <img src="{{ URL::to('/') }}/22.02.2020/04.png" class="img-fluid" alt="Responsive image">
            <h4 class="text-center bosc">Rute Perlombaan</h4>
            <img src="{{ URL::to('/') }}/route.png" class="img-fluid mb-5" alt="Responsive image">
            <h4 class="text-center bosc">Pengambilan Racepack</h4>
            <center><img src="{{ URL::to('/') }}/racepack.png" class="img-fluid" alt="Responsive image"></center>
            <ul>
                <li>Finisher medali akan dibagikan kepada peserta di garis finish dengan menunjukkan gelang yang diperoleh di Posko Manggala.</li>
                <li>Pengambilan perlengkapan peserta fun run dapat dilaksanakan mulai tanggal 20 - 21 Maret 2020 bertempat di Eks. Kampus APDN Malang, Jl. Kawi No. 41 Malang.</li>
            </ul>
            <h4>Syarat Pengambilan Racepack</h4>
            <ul>
                <li>Membawa dan menunjukkan bukti registrasi.</li>
                <li>Membawa KTP / Kartu Indentitas asli dan fotokopi</li>
                <li>Membawa surat kuasa untuk yang diwakilkan.</li>
            </ul>
            Untuk surat kuasa dapat diunduh <a href="{{ URL::to('/') }}/21.02.2020/surat_kuasa.pdf">di sini.</a>
            <h4 class="text-center bosc">FAQs</h4>
            <div>
                <b>Q: Kapan Pamong Fun Run diselenggarakan?</b>
                <p>
                    Minggu, 22 Maret 2020.
                </p>
            </div>
            <div>
                <b>Q: Jam berapa lari dimulai?</b>
                <p>
                    Berkumpul di Simpang Balapan pukul 05.30 WIB dan lari akan dimulai pada pukul 06.00 WIB.
                </p>
            </div>
            <div>
                <b>Q: Dimana Pamong Fun Run diselenggarakan?</b>
                <p>
                    Sekitar Kampus APDN Malang, Jl. Kawi 41 Malang.
                </p>
            </div>
            <div>
                <b>Q: Berapa kategori jarak Pamong Fun Run?</b>
                <p>
                    4.1 K++ (kurang lebih 5 KM).
                </p>
            </div>
            <div>
                <b>Q: Siapa saja yang diharapkan menjadi peserta dalam Pamong Fun Run?</b>
                <p>
                    Siapa saja boleh bergabung dalam Pamong Fun Run, Anak-anak, Wanita, Pria, baik masyarakat umum ataupun Purna Praja.
                </p>
            </div>
            <div>
                <b>Q: Apa yang akan diperoleh peserta?</b>
                <p>
                    BIB (Nomor dada), jersey/kaos dan finisher medal.
                </p>
            </div>
            <div>
                <b>Q: Setelah lari akan ada acara apa?</b>
                <p>
                    Setelah lari selesai, peserta akan dihibur dengan entertainment, bazaar dan doorprize menarik.
                </p>
            </div>
            <div>
                <b>Q: Apakah pengambilan perlengkapan dapat diwakilkan?</b>
                <p>
                    Pengambilan racepack dapat diwakilkan dengan surat kuasa bermaterai dan fotocopy pemberi kuasa (pemilik tiket asli yang tertera dalam email tanda terima).
                </p>
            </div>
        </div>
    </section>
    <section id="idk">
        <div class="container">
            <img src="{{ URL::to('/') }}/19.02.2020/05.png" class="img-fluid pb-3" alt="Responsive image">
            <h4 class="text-center bosc">FAQs</h4>
            <div>
                <b>Q: Berapa harga tiket untuk kegiatan Pamong Praja 4.1?</b>
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
{{--             <div>
                <b>Q: Apakah ada harga tiket diskon?</b>
                <p>
                    Untuk tiket Fun Run berlaku ketentuan, bagi 41 pendaftar pertama Rp. 150.000,-. Bagi 241 pendaftar berikutnya Rp. 175.000,- dan untuk pendaftar selanjutnya harga tiket normal yaitu Rp. 200.000,-.
                </p>
            </div> --}}
            <h3 class="text-center bosc">Lokasi</h3>
            <div class="map-responsive mb-5">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.2080751162466!2d112.62179691475924!3d-7.9774336817424665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd628212a62142d%3A0x8a9a708ff2fc1407!2sHotel%20Aria%20Gajayana%20-%20Malang!5e0!3m2!1sen!2sid!4v1580697073534!5m2!1sen!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
            <h3 class="text-center bosc">Tata Cara Pendaftaran</h3>
            <div class="map-responsive mb-5">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/R77DpAP98PU?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <h3 class="text-center bosc">Narahubung</h3>
            <div class="row text-center">
                <div class="col-sm">
                    <b class="text-dark">Pamong Jaga 1</b>
                    <p><a href="https://api.whatsapp.com/send?phone=628113514141" class="text-dark">+628113514141</a></p>
                </div>
                <div class="col-sm">
                    <b class="text-dark">Pamong Jaga 2</b>
                    <p><a href="https://api.whatsapp.com/send?phone=628113524141" class="text-dark">+628113524141</a></p>
                </div>
                <div class="col-sm">
                    <b class="text-dark">Pamong Sponsor</b>
                    <p><a href="https://api.whatsapp.com/send?phone=628113544141" class="text-dark">+628113544141</a></p>
                </div>
            </div>
        </div>
    </section>
    <footer class="py-4">
        <div class="container text-center">
            <small>{{ config('app.name', 'Laravel') }} @ {{ date("Y") }}. All Rights Reserved.</small>
            <br/>
            <small>Created by <a href="https://github.com/stonear">A. R. Stone</a></small>
        </div>
    </footer>
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
            var navHeight = $("nav#navbar").height();

            // $("body").scrollspy({target: ".navbar", offset: 50});   
            $("#navbar a, #navbar_mobile a").on('click', function(event) {
                hide();
                if (this.hash !== "") {
                    event.preventDefault();

                    var hash = this.hash;

                    $("html, body").animate({
                        scrollTop: $(hash).offset().top - navHeight - 20
                    }, 800);
                }
            });
            $("#navbar-toggler").on('click', show);
            $("#fa-times").on('click', hide);
        });
    </script>
</body>
</html>