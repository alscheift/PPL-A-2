<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>RoadSafety | Lapor Jalan Rusak</title>
    <meta name="author" content="Themeholy">
    <meta name="description" content="Webteck - Technology & IT Solutions HTML Template">
    <meta name="keywords" content="Webteck - Technology & IT Solutions HTML Template">
    <meta name="robots" content="INDEX,FOLLOW">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicons - Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" sizes="57x57" href="../../download-version/assets/img/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../../download-version/assets/img/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../../download-version/assets/img/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../../download-version/assets/img/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../../download-version/assets/img/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../../download-version/assets/img/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../../download-version/assets/img/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../../download-version/assets/img/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../../download-version/assets/img/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" href="https://i.postimg.cc/fbG8hv3W/logo-mobil.png">
    <link rel="manifest" href="../../download-version/assets/img/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="../../download-version/assets/img/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!--==============================
	  Google Fonts
	============================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,700&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <!--==============================
	    All CSS File
	============================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../../download-version/assets/css/bootstrap.min.css">
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="../../download-version/assets/css/fontawesome.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="../../download-version/assets/css/magnific-popup.min.css">
    <!-- Swiper Slider -->
    <link rel="stylesheet" href="../../download-version/assets/css/swiper-bundle.min.css">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="../../download-version/assets/css/style.css">
    <!-- Leaflet CSS -->
    <link href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" rel="stylesheet">

</head>

<body>

    <!-- <div class="cursor"></div>
	<div class="cursor2"></div>  -->


    <!--[if lte IE 9]>
    	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->



    <!--********************************
   		Code Start From Here 
	******************************** -->

    <!--==============================
    Mobile Menu
  ============================== -->
    <div class="th-menu-wrapper">
        <div class="th-menu-area text-center">
            <button class="th-menu-toggle"><i class="fal fa-times"></i></button>
            <div class="mobile-logo">
                <a href="/"><img src="../../download-version/assets/img/logo.svg" alt="RoadSafety"></a>
            </div>
            <div class="th-mobile-menu">
                <ul>
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li>
                        <a href="#about-us">About Us</a>
                    </li>
                    <li>
                        <a href="#process">Tutorials</a>
                    </li>
                    <li>
                        <a href="#statistics">Statistics</a>
                    </li>
                    <li>
                        <a href="#faq">FAQ</a>
                    </li>
                    <li>
                        <a href="{{ route("register") }}" class="th-btn shadow-none">Sign Up<i class="fas fa-arrow-right ms-2"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div><!--==============================
	Header Area
==============================-->
    <header class="th-header header-layout2">
        <div class="sticky-wrapper">
            <!-- Main Menu Area -->
            <div class="menu-area">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto">
                            <div class="header-logo">
                                <a class="icon-masking" href="/"><span data-mask-src="https://i.postimg.cc/QCrYcqsY/logo-utuh.png" class="mask-icon"></span><img src="https://i.postimg.cc/QCrYcqsY/logo-utuh.png" alt="RoadSafety" style="max-height: 110px;"></a>
                                {{-- <a class="icon-masking" href="/"><span class="mask-icon">{{ config('app.name') }}</span></a> --}}
                            </div>
                        </div>
                        <div class="col-auto">
                            <nav class="main-menu d-none d-lg-inline-block">
                                <ul>
                                    <li>
                                        <a href="#">Home</a>
                                    </li>
                                    <li>
                                        <a href="#about-us">About Us</a>
                                    </li>
                                    <li>
                                        <a href="#process">Tutorials</a>
                                    </li>
                                    <li>
                                        <a href="#statistics">Statistics</a>
                                    </li>
                                    <li>
                                        <a href="#faq">FAQ</a>
                                    </li>
                                    @auth <!-- Tampilkan link menu dashboard jika pengguna telah login -->
                                        <li>
                                            <a href="{{ route('dashboard') }}" class="text-primary">Dashboard</a>
                                        </li>
                                    @endauth
                                </ul>
                            </nav>
                        </div>
                        <div class="col-auto">
                            <div class="header-button">
                                @auth <!-- Tampilkan ucapan selamat datang -->
                                <span class="welcome-message" onclick="window.location.href='{{ route('dashboard') }}'">Selamat datang, {{ Auth::user()->name }}!</span>
                                @else <!-- Tampilkan tombol "Sign Up" jika pengguna belum login -->
                                    <a href="{{ route("register") }}" class="btn btn-primary shadow-none">Sign Up</a>
                                    <a href="{{ route("login") }}" class="btn btn-outline-primary shadow-none">Login</a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header><!--==============================
Hero Area
==============================-->
    <div class="th-hero-wrapper hero-4" id="hero">
        <div class="body-particle" id="body-particle"></div>
        {{-- <div class="hero-img tilt-active">
            <img src="../../download-version/assets/img/hero/pothole.png" alt="Hero Image">
        </div> --}}
        <div class="container">
            <div class="hero-style4">
                <div class="ripple-shape">
                    <span class="ripple-1"></span><span class="ripple-2"></span><span class="ripple-3"></span><span class="ripple-4"></span><span class="ripple-5"></span><span class="ripple-6"></span>
                </div>
                <h1 class="hero-title text-white">Laporkan Jalan Rusak Sekarang!</h1>
                <p class="hero-text text-white">Situs ini didedikasikan untuk meningkatkan kesadaran masyarakat tentang masalah jalan rusak serta menyediakan informasi terkait lokasi jalan rusak.</p>
                <div class="btn-group">
                    @auth <!-- Tampilkan tombol "Dashboard" jika pengguna telah login -->
                        <a href="{{ route("dashboard") }}" class="th-btn">Dashboard <i class="fa-regular fa-arrow-right ms-2"></i></a>
                    @else <!-- Tampilkan tombol "Sign Up" jika pengguna belum login -->
                        <a href="{{ route("register") }}" class="th-btn">Sign Up <i class="fa-regular fa-arrow-right ms-2"></i></a>
                    @endauth
                    <a href="/#about-us" class="th-btn">Learn More</a>
                </div>
            </div>
        </div>
        <div class="triangle-1"></div>
        <div class="triangle-2"></div>
    </div>
    <!--======== / Hero Section ========--><!--==============================
Service Area  
==============================-->
    <section class="bg-top-center z-index-common space-top" id="about-us" data-bg-src="../../download-version/assets/img/bg/blog_bg_1.png" style="background-size: cover;">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-sm-9 pe-xl-5">
                    <div class="title-area text-center text-lg-start">
                        <div class="shadow-title color2 text-center">TENTANG KAMI</div>
                        <span class="sub-title text-center">
                            <div class="icon-masking me-2">
                                <span class="mask-icon" data-mask-src="../../download-version/assets/img/theme-img/title_shape_2.svg"></span>
                            </div>
                        </span>
                        <p class="text-center">RoadSafety merupakan sebuah platform pelaporan jalan rusak yang bertujuan untuk meningkatkan keselamatan pengguna jalan dan mengedukasi masyarakat terkait masalah infrastruktur jalan. Kami berkomitmen untuk memberikan solusi yang efektif dan mudah digunakan bagi masyarakat untuk melaporkan kondisi jalan yang memerlukan perbaikan.</p>
                    </div>
                </div>
            </div>

            <div class="slider-area">
                <div class="swiper th-slider has-shadow" id="serviceSlider1" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"4"}}}'>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="service-grid">
                                <div class="service-grid_icon">
                                    <img src="../../download-version/assets/img/icon/service_card_2.svg" alt="Icon">
                                </div>
                                <div class="service-grid_content">
                                    <h3 class="box-title">Validasi AI</h3>
                                    <p class="service-grid_text">Pemanfaatan teknologi deep learning untuk mengidentifikasi jalan rusak dari unggahan pengguna. Hal ini bertujuan agar dapat memberikan hasil yang akurat dan mengurangi data yang tidak relevan.</p>
                                    <div class="bg-shape">
                                        <img src="../../download-version/assets/img/bg/service_grid_bg.png" alt="bg">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="service-grid">
                                <div class="service-grid_icon">
                                    <img src="../../download-version/assets/img/icon/service_card_5.svg" alt="Icon">
                                </div>
                                <div class="service-grid_content">
                                    <h3 class="box-title">PorSi</h3>
                                    <p class="service-grid_text">Fitur laporan dimana user dapat melaporkan kerusakan jalan dengan mengunggah foto jalan yang rusak disertai dengan lokasi kerusakan. Sistem akan menunjukkan apakah keadaan jalan yang dilaporkan benar rusak atau tidak.</p>
                                    <div class="bg-shape">
                                        <img src="../../download-version/assets/img/bg/service_grid_bg.png" alt="bg">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section><!--==============================
Process Area  
==============================-->
    <section class="bg-smoke" id="process" data-bg-src="../../download-version/assets/img/bg/testimonial_bg_7.jpg">
        <div class="container space">
            <div class="title-area text-center">
                <div class="shadow-title">TUTORIALS</div>
                <span class="sub-title">
                    <div class="icon-masking me-2">
                        <span class="mask-icon" data-mask-src="../../download-version/assets/img/theme-img/title_shape_2.svg"></span>
                        <img src="../../download-version/assets/img/theme-img/title_shape_2.svg" alt="shape">
                    </div>
                    PROSES PELAPORAN
                </span>
                <h2 class="sec-title">Bagaimana cara <span class="text-theme">melapor?</span></h2>
            </div>
            <div class="process-card-area">
                <div class="process-line">
                    <img src="../../download-version/assets/img/bg/process_line.svg" alt="line">
                </div>
                <div class="row gy-40">
                    <div class="col-sm-6 col-xl-3 process-card-wrap">
                        <div class="process-card">
                            <div class="process-card_number">01</div>
                            <div class="process-card_icon">
                                <img src="../../download-version/assets/img/icon/process_card_1.svg" alt="icon">
                            </div>
                            <h2 class="box-title">Buat Akun</h2>
                            <p class="process-card_text">Lakukan registrasi akun pada halaman Sign Up yang berada pada pojok atas halaman</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3 process-card-wrap">
                        <div class="process-card">
                            <div class="process-card_number">02</div>
                            <div class="process-card_icon">
                                <img src="../../download-version/assets/img/icon/process_card_2.svg" alt="icon">
                            </div>
                            <h2 class="box-title">Menu Lapor</h2>
                            <p class="process-card_text">Klik menu lapor pada bilah samping halaman dashboard untuk melaporkan jalan rusak</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3 process-card-wrap">
                        <div class="process-card">
                            <div class="process-card_number">03</div>
                            <div class="process-card_icon">
                                <img src="../../download-version/assets/img/icon/process_card_3.svg" alt="icon">
                            </div>
                            <h2 class="box-title">Unggah</h2>
                            <p class="process-card_text">Pilih Lokasi tempat kerusakan pada maps dan unggah foto jalan rusak yang anda temui.</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3 process-card-wrap">
                        <div class="process-card">
                            <div class="process-card_number">04</div>
                            <div class="process-card_icon">
                                <img src="../../download-version/assets/img/icon/process_card_4.svg" alt="icon">
                            </div>
                            <h2 class="box-title">Lapor</h2>
                            <p class="process-card_text">Setelah semua proses selesai, submit laporan anda.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--==============================
        Counter Area  
        ==============================-->
    <div id="statistics">
        <!-- Leaflet Map -->
        <div class="bg-top-center z-index-common space-top" id="about-us" data-bg-src="../../download-version/assets/img/bg/blog_bg_1.png">
            <div class="text-center">
                <div class="shadow-title">STATISTICS</div>
                    <span class="sub-title">
                        <div class="icon-masking me-2">
                            <span class="mask-icon" data-mask-src="../../download-version/assets/img/theme-img/title_shape_2.svg"></span>
                            <img src="../../download-version/assets/img/theme-img/title_shape_2.svg" alt="shape">
                        </div>
                        Potholes Map
                    </span>
                <h2 class="sec-title">Persebaran <span class="text-theme">Jalan Rusak</span></h2>
                <div id="map" style="height: 400px;"></div>
            </div>
        </div>
        </div>
        <div class="bg-theme space-extra" data-bg-src="../../download-version/assets/img/bg/counter_bg_1.png">
            <div class="container py-2">
                <div class="row gy-40 justify-content-between">
                    <div class="col-6 col-lg-auto">
                        <div class="counter-card">
                            <div class="counter-card_icon">
                                <img src="../../download-version/assets/img/icon/counter_1_1.svg" alt="Icon">
                            </div>
                            <div class="media-body">
                                <h2 class="counter-card_number"><span class="counter-number">0</span>+</h2>
                                <p class="counter-card_text">Laporan</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-auto">
                        <div class="counter-card">
                            <div class="counter-card_icon">
                                <img src="../../download-version/assets/img/icon/damage.svg" alt="Icon">
                            </div>
                            <div class="media-body">
                                <h2 class="counter-card_number"><span class="counter-number">250</span>+</h2>
                                <p class="counter-card_text">Jalan Rusak</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-auto">
                        <div class="counter-card">
                            <div class="counter-card_icon">
                                <img src="../../download-version/assets/img/icon/car-crash.svg" alt="Icon">
                            </div>
                            <div class="media-body">
                                <h2 class="counter-card_number"><span class="counter-number">83</span>+</h2>
                                <p class="counter-card_text">Kecelakaan</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-auto">
                        <div class="counter-card">
                            <div class="counter-card_icon">
                                <img src="../../download-version/assets/img/icon/clock.svg" alt="Icon">
                            </div>
                            <div class="media-body">
                                <h2 class="counter-card_number"><span class="counter-number">0.95</span>+</h2>
                                <p class="counter-card_text">Waktu Deteksi</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--==============================
    Faq Area
    ==============================-->
    <div id="faq">
        <div class="space">
            <div class="container">
                <div class="title-area text-center">
                    <div class="shadow-title">FREQUENLTY ASKED QUESTIONS</div>
                    <span class="sub-title">
                        <div class="icon-masking me-2">
                            <span class="mask-icon" data-mask-src="../../download-version/assets/img/theme-img/title_shape_2.svg"></span>
                            <img src="../../download-version/assets/img/theme-img/title_shape_2.svg" alt="shape">
                        </div>
                        FAQ
                    </span>
                    <h2 class="sec-title">Hal yang <span class="text-theme">sering ditanyakan</span></h2>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="accordion-area accordion" id="faqAccordion">


                            <div class="accordion-card style2 ">
                                <div class="accordion-header" id="collapse-item-1">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-1" aria-expanded="false" aria-controls="collapse-1">Bagaimana cara menggunakan aplikasi ini?</button>
                                </div>
                                <div id="collapse-1" class="accordion-collapse collapse " aria-labelledby="collapse-item-1" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p class="faq-text">Pengguna diminta untuk login terlebih dahulu kemudian dapat memilih menu buat laporan. Pengguna dapat mengambil foto kerusakan jalan menggunakan perangkat seluler. Aplikasi kemudian akan memanfaatkan data lokasi untuk memberikan informasi tentang titik rusak tersebut. Laporan kemudian dikirim ke pemerintah untuk tindakan perbaikan.</p>
                                    </div>
                                </div>
                            </div>


                            <div class="accordion-card style2">
                                <div class="accordion-header" id="collapse-item-2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-2" aria-expanded="false" aria-controls="collapse-2">Informasi apa yang perlu saya berikan saat melaporkan kerusakan jalan?</button>
                                </div>
                                <div id="collapse-2" class="accordion-collapse collapse " aria-labelledby="collapse-item-2" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p class="faq-text">Saat melaporkan kerusakan jalan, pengguna harus memberikan informasi berikut: <li>Lokasi kerusakan</li><li>Foto kerusakan jalan</li><li>Deskripsi</li></p>
                                    </div>
                                </div>
                            </div>


                            <div class="accordion-card style2 ">
                                <div class="accordion-header" id="collapse-item-3">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-3" aria-expanded="false" aria-controls="collapse-3">Apa yang terjadi setelah saya melaporkan jalan rusak?</button>
                                </div>
                                <div id="collapse-3" class="accordion-collapse collapse " aria-labelledby="collapse-item-3" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p class="faq-text">Setelah pengguna melaporkan kondisi jalan yang rusak, sistem akan memvalidasi laporan tersebut.</p>
                                    </div>
                                </div>
                            </div>


                            <div class="accordion-card style2 ">
                                <div class="accordion-header" id="collapse-item-4">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-4" aria-expanded="false" aria-controls="collapse-4">Apakah data pribadi saya aman saat menggunakan aplikasi ini?</button>
                                </div>
                                <div id="collapse-4" class="accordion-collapse collapse " aria-labelledby="collapse-item-4" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p class="faq-text">Data pribadi pengguna aman saat menggunakan aplikasi ini. Data yang pengguna kirimkan, seperti foto dan lokasi jalan rusak, digunakan untuk melaporkan kondisi jalan kepada pemerintah. Data pribadi pengguna dilindungi dan tidak akan dibagikan kepada pihak ketiga.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-card style2 ">
                                <div class="accordion-header" id="collapse-item-5">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-5" aria-expanded="false" aria-controls="collapse-5">Bagaimana saya bisa memberikan pertanyaan tentang aplikasi?</button>
                                </div>
                                <div id="collapse-5" class="accordion-collapse collapse " aria-labelledby="collapse-item-4" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p class="faq-text">Untuk pertanyaan lebih lanjut, pengguna dapat menghubungi tim kami melalui email jalanrusak@gmail.com atau hubungi 0812345678910</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--==============================
	Footer Area
==============================-->
    <footer class="footer-wrapper footer-layout3" data-bg-src="../../download-version/assets/img/bg/footer_bg_2.jpg">
        <div class="copyright-wrap">
            <div class="container">
                <div class="row justify-content-between align-items-center text-center">
                    <div>
                        <p class="copyright-text">Copyright <i class="fal fa-copyright"></i> 2024 <a href="https://themeforest.net/user/themeholy">RoadSafety</a>. All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!--********************************
			Code End  Here 
	******************************** -->

    <!-- Scroll To Top -->
    <div class="scroll-top">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
        </svg>
    </div>

    <!--==============================
    All Js File
============================== -->
    <!-- Jquery -->
    <script src="../../download-version/assets/js/vendor/jquery-3.7.1.min.js"></script>
    <!-- Swiper Slider -->
    <script src="../../download-version/assets/js/swiper-bundle.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../download-version/assets/js/bootstrap.min.js"></script>
    <!-- Magnific Popup -->
    <script src="../../download-version/assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Counter Up -->
    <script src="../../download-version/assets/js/jquery.counterup.min.js"></script>
    <!-- Circle Progress -->
    <script src="../../download-version/assets/js/circle-progress.js"></script>
    <!-- Range Slider -->
    <script src="../../download-version/assets/js/jquery-ui.min.js"></script>
    <!-- Isotope Filter -->
    <script src="../../download-version/assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="../../download-version/assets/js/isotope.pkgd.min.js"></script>
    <!-- Tilt JS -->
    <script src="../../download-version/assets/js/tilt.jquery.min.js"></script>

    <!-- gsap -->
    <script src="../../download-version/assets/js/gsap.min.js"></script>
    <!-- ScrollTrigger -->
    <script src="../../download-version/assets/js/ScrollTrigger.min.js"></script>
    <script src="../../download-version/assets/js/smooth-scroll.js"></script>

    <!-- Particles JS -->
    <script src="../../download-version/assets/js/particles.min.js"></script>

    <script src="../../download-version/assets/js/particles-config.js"></script>
    <!-- Main Js File -->
    <script src="../../download-version/assets/js/main.js"></script>

    <!-- Icon -->
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <!-- Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    
    <!-- Leaflet Map -->
    <script>
        // Inisialisasi peta
        var map = L.map('map').setView([-7.535947456790532, 110.74740073685324], 11); // Ganti koordinat dan zoom level sesuai kebutuhan

        // Tambahkan layer tile dari OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // https://github.com/pointhi/leaflet-color-markers
        var redIcon = new L.Icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });
        
        var myIcon = L.icon({
            iconUrl: 'https://i.postimg.cc/bJWg7MTf/Untitled-2.png',
            iconSize: [62, 93], // Sesuaikan dengan ukuran ikon Anda
        });

        @foreach($potholes as $pothole)
        @if($pothole->is_damaged == 1 && $pothole->is_approved == 'Approved')
            // Membuat string yang berisi tag img dengan src dari segmented_image_path
            var popupContent = '<div><strong>Deskripsi:</strong> {{ $pothole->desc }}</div>' +
                            '<div><strong>Alamat:</strong> {{ $pothole->address }}</div>' +
                            '<div><strong>Kondisi Jalan:</strong> </div>' +
                            '<img src="{{ 'http://34.128.72.61:8080/result/' . $pothole->segmented_image_path }}" alt="Segmented Image" style="max-width: 100%;">'


            // Menambah marker ke peta dengan popup yang berisi deskripsi, alamat, dan gambar
            L.marker([{{ $pothole->lat }}, {{ $pothole->long }}], { icon: redIcon }).addTo(map)
                .bindPopup(popupContent);
        @endif
    @endforeach

    </script>
</body>

</html>