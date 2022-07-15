<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{env('APP_URL')}}" />
    <meta property="og:title" content="ZuriCash" />
    <meta property="og:description" content="ZuriCash Agency - Earn with Us" />
    <meta property="og:image" content="{{ asset('assets/img/logo4.jpeg')}}" />
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="{{env('APP_URL')}}" />
    <meta property="twitter:title" content="" />
    <meta property="twitter:description" content="ZuriCash Agency - Earn with Us" />
    <meta property="twitter:image" content="{{ asset('assets/img/logo4.jpeg')}}" />
    <meta property="twitter:image:alt" content="Company logo" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ZURICASH') }}</title>

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets_landing/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_landing/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_landing/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_landing/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_landing/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_landing/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets_landing/css/style.css') }}" rel="stylesheet">
    <link rel='shortcut icon' type='image/x-icon' href="{{ asset('assets/img/favicon.png')}}" />
</head>

<body class="antialiased">
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="#" class="logo d-flex align-items-center">
                <img src="{{ asset('assets/img/zuri1.png')}}" width="100" height="100" alt="">
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    <li><a class="nav-link scrollto" href="#features">Features</a></li>
                    <li><a class="getstarted scrollto" href="{{ route('register') }}">Sign Up</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Your new earning experience with ZuriCash</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">Refer, watch videos, answer questions and many more to earn.</h2>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                            <a href="{{ route('login') }}" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Login</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ asset('assets_landing/img/hero-img.png')}}" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about">

            <div class="container" data-aos="fade-up">
                <div class="row gx-0">

                    <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                        <div class="content">
                            <h3>Who We Are</h3>
                            <h4>{{ ucfirst(strtolower('ON OUR PLATFORM WE HAVE PREMIUM CRYPTO CURRENCY TEACHINGS AND MANY OTHER BENEFICIAL FEATURES WHICH WILL HELP YOUTH TO GET IN TOUCH WITH THE GROTH OF THIS NEW ERA OF TECHNOLOGY WHICH HELP MOST OF PEOPLE TO GAIN INCOME IN THEIR COMFORT ZONE.')) }}</h4>
                            <p>
                                We provide services  24 hours / 7🔥 all client have equality  and we   appreciate you  all 😇👏
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-6 text-center d-flex" data-aos="zoom-out" data-aos-delay="200">
                        <img src="{{ asset('assets_landing/img/values-1.png')}}" class="img-fluid" style="width: 100%;" alt="">
                    </div>

                </div>
            </div>

        </section><!-- End About Section -->

        <!-- ======= Features Section ======= -->
        <section id="features" class="features">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Features</h2>
                    <p>How to make money and various features available in ZuriCash</p>
                </header>

                <!-- Feature Icons -->
                <div class="row feature-icons" data-aos="fade-up">

                    <div class="row">

                        <div class="col-xl-4 align-self-center text-center" data-aos="fade-right" data-aos-delay="100">
                            <img src="{{ asset('assets_landing/img/values-2.png')}}" class="img-fluid" style="width: 100%;" alt="">
                        </div>

                        <div class="col-xl-8 d-flex content">
                            <div class="row align-self-center gy-4">

                                <div class="col-md-6 icon-box" data-aos="fade-up">
                                    <i class="ri-bit-coin-line"></i>
                                    <div>
                                        <h4>FREE CRYPTOCURRENCY LESSONS</h4>
                                        <p>This training will be provided to our customers with active ZURICASH accounts.  Here you will learn what Is crypto currency  and how it works. Also you will   be provided with signals via our company📡</p>
                                    </div>
                                </div>

                                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                                    <i class="ri-newspaper-line"></i>
                                    <div>
                                        <h4>ENTREPRENEURSHIP TRAINING</h4>
                                        <p>Here as a member of ZURICASH you will have the opportunity to learn various aspects of entrepreneurship and this Education you will get through your Activation fee which is paid only once.💳</p>
                                    </div>
                                </div>

                                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                                    <i class="ri-question-mark"></i>
                                    <div>
                                        <h4>Trivia Questions</h4>
                                        <p>These are simple questions related to the community Sarounding us and if you answer these questions fluently within a specified time you will be paid🤩😌</p>
                                    </div>
                                </div>

                                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                                    <i class="ri-advertisement-line"></i>
                                    <div>
                                        <h4>ADs Click</h4>
                                        <p>There will be  available  ads that will be placed on your account where each time you click on the ads you will be paid💰🍿</p>
                                    </div>
                                </div>

                                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                                    <i class="ri-whatsapp-line"></i>
                                    <div>
                                        <h4>WhatsApp Status</h4>
                                        <p>Here our management provided you with various posters which u will  advertise via your  status and   you will get paid according to  the number of viewers you have.🥳</p>
                                    </div>
                                </div>

                                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="500">
                                    <i class="ri-video-line"></i>
                                    <div>
                                        <h4>Videos Watching</h4>
                                        <p>Watch various videos which will be uploaded in our platform  and get paid.  Earn via short videos  and get paid 💰🔖</p>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div><!-- End Feature Icons -->

            </div>

        </section><!-- End Features Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>ZuriCash Agency ({{$year}})</span></strong>. All Rights Reserved
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


    <!-- Vendor JS Files -->
    <script src="{{ asset('assets_landing/vendor/purecounter/purecounter.js') }}"></script>
    <script src="{{ asset('assets_landing/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets_landing/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets_landing/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets_landing/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets_landing/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets_landing/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets_landing/js/main.js') }}"></script>
</body>

</html>