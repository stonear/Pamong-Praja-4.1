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
        .about {
            text-indent: 50px;
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
        b {
            color: red;
        }
    </style>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container pt-3 bosc">
        <div class="d-flex align-content-around flex-wrap mb-3" id="navbar">
            <div class="py-2 pr-2"><a href="#beranda" class="btn btn-primary">Beranda</a></div>
            <div class="p-2"><a href="#seminar" class="btn btn-primary">Seminar</a></div>
            <div class="p-2"><a href="#mipp" class="btn btn-primary">MIPP</a></div>
            <div class="p-2 mr-auto"><a href="#funrun" class="btn btn-primary">Fun Run</a></div>
            @guest
            <div class="p-2"><a href="{{ route('login') }}" class="btn btn-warning">Masuk</a></div>
            @if (Route::has('register'))
            <div class="py-2 pl-2"><a href="{{ route('register') }}" class="btn btn-warning">Daftar</a></div>
            @endif
            @else
            <div class="py-2 pl-2">
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
    <div class="container">
        <div class="alert alert-danger running_text" role="alert">
            @php
            $now = new DateTime();
            $to = new DateTime("2020-03-21");

            if($now <= $to) $diff = $to->diff($now)->format("%a");
            else $diff = 0;
            @endphp
            <marquee behavior="scroll" direction="left">Counting Down: H – {{ $diff }}</marquee>
        </div>   
    </div>
    <section id="home">
        <div class="container">
            <img src="{{ URL::to('/') }}/19.02.2020/01.png" class="img-fluid" alt="Responsive image">
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
            <h1 class="text-center bosc">FAQs</h1>
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
                <h4>Q: Surat Undangan bisa diunduh dimana?</h4>
                <p>
                    Surat Undangan bisa diunduh <a href="#">di sini.</a>
                </p>
            </div>
        </div>
    </section>
    <section id="seminar">
        <div class="container">
            <img src="{{ URL::to('/') }}/19.02.2020/02.png" class="img-fluid" alt="Responsive image">
            <ul>
                <li>Pengambilan goodiebag seminar nasional dilaksanakan pada hari pelaksanaan disaat melaksanakan registrasi ulang sebelum pelaksanaan seminar dimulai.</li>
            </ul>
            <h1 class="text-center bosc">FAQs</h1>
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
                    Ibu Khofifah Indar Parawansa (Gubernur Jawa Timur).<br/>
                    Bpk. Tito Karnavian (Menteri Dalam Negeri RI).<br/>
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
        </div>
    </section>
    <section id="mipp">
        <div class="container">
            <img src="{{ URL::to('/') }}/19.02.2020/03.png" class="img-fluid" alt="Responsive image">
            <h1 class="text-center bosc">FAQs</h1>
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
    </section>
    <section id="funrun">
        <div class="container">
            <img src="{{ URL::to('/') }}/19.02.2020/04.png" class="img-fluid" alt="Responsive image">
            <ul>
                <li>Finisher medali akan dibagikan kepada peserta di garis finish dengan menunjukkan gelang yang diperoleh di Posko Manggala.</li>
                <li>Pengambilan goodiebag seminar nasional dilaksanakan pada hari pelaksanaan disaat melaksanakan registrasi ulang sebelum pelaksanaan seminar dimulai.</li>
                <li>Pengambilan perlengkapan peserta fun run dapat dilaksanakan mulai tanggal 20 - 21 Maret 2020 bertempat di Eks. Kampus APDN Malang, Jl. Kawi No. 41 Malang.</li>
            </ul>
            <h4>Syarat Pengambilan Racepack</h4>
            <ul>
                <li>Membawa dan menunjukkan bukti registrasi.</li>
                <li>Membawa KTP / Kartu Indentitas asli dan fotokopi</li>
                <li>Membawa surat kuasa untuk yang diwakilkan.</li>
            </ul>
            Untuk surat kuasa dapat diunduh <a href="#">di sini.</a>
            <h1 class="text-center bosc">FAQs</h1>
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
        </div>
    </section>
    <section id="idk">
        <div class="container">
            <img src="{{ URL::to('/') }}/19.02.2020/05.png" class="img-fluid pb-3" alt="Responsive image">
            <h1 class="text-center bosc">FAQs</h1>
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
            <h1 class="text-center bosc">Lokasi</h1>
            <div class="map-responsive">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.2080751162466!2d112.62179691475924!3d-7.9774336817424665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd628212a62142d%3A0x8a9a708ff2fc1407!2sHotel%20Aria%20Gajayana%20-%20Malang!5e0!3m2!1sen!2sid!4v1580697073534!5m2!1sen!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
            <img src="{{ URL::to('/') }}/19.02.2020/06.png" class="img-fluid" alt="Responsive image">
            <h1 class="text-center bosc">Narahubung</h1>
            <div class="row text-center">
                <div class="col-sm">
                    <h4>Pamong Jaga 1</h4>
                    <p><a href="https://api.whatsapp.com/send?phone=628113514141">+628113514141</a></p>
                </div>
                <div class="col-sm">
                    <h4>Pamong Jaga 2</h4>
                    <p><a href="https://api.whatsapp.com/send?phone=628113524141">+628113524141</a></p>
                </div>
                <div class="col-sm">
                    <h4>Pamong Sponsor</h4>
                    <p><a href="https://api.whatsapp.com/send?phone=628113544141">+628113544141</a></p>
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