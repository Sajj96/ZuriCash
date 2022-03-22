@extends('layouts.app')

@section('content')
@include('layouts.header')
<!-- Banner Section -->
<section class="banner-section">
    <div class="swiper-container banner-slider">
        <div class="swiper-wrapper">
            <!-- Slide Item -->
            <div class="swiper-slide" style="background-image: url(assets/images/main-slider/1.jpg);">
                <div class="content-outer">
                    <div class="content-box justify-content-center">
                        <div class="inner text-center">
                            <h4><span class="border-shape-left"></span>6 million out of 36 million Nigerian <span class="border-shape-right"></span></h4>
                            <h1>Childrens out of school</h1>
                            <div class="text">To improve the learning environment in primary schools by holistically creating world-class <br>basic education systems to the community.</div>
                            <div class="link-box"><a href="#" class="theme-btn btn-style-one donate-box-btn"><span>Donate Now</span></a></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide Item -->
            <div class="swiper-slide" style="background-image: url(assets/images/main-slider/2.jpg);">
                <div class="content-outer">
                    <div class="content-box justify-content-center">
                        <div class="inner text-center">
                            <div class="link-box-two"><a href="#" class="theme-btn default-btn">help the needy</a></div>
                            <h3>To improve learning environment in primary schools</h3>
                            <h1>Together we can make <br>a Difference</h1>
                            <div class="link-box"><a href="#" class="theme-btn btn-style-one donate-box-btn"><span>Donate Now</span></a></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide Item -->
            <div class="swiper-slide" style="background-image: url(assets/images/main-slider/3.jpg);">
                <div class="content-outer">
                    <div class="content-box justify-content-center">
                        <div class="inner text-center">
                            <h1>Healing & Caring</h1>
                            <div class="text">To improve the learning environment in primary schools by <br>holistically creating world-class.</div>
                            <div class="link-box"><a href="#" class="theme-btn btn-style-one donate-box-btn"><span>Donate Now</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-slider-pagination style-two"></div>
        <div class="banner-slider-nav style-one">
            <div class="banner-slider-control banner-slider-button-prev"><span class="fa fa-angle-left"></span></div>
            <div class="banner-slider-control banner-slider-button-next"><span class="fa fa-angle-right"></span> </div>
        </div>
    </div>
</section>
<!-- End Bnner Section -->

<!-- About Section -->
<section class="about-section">
    <div class="auto-container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-content-block">
                    <h1>Be part of a change <br>you want to see in the world</h1>
                    <h4>“Generosity consists not of the sum given, but the manner in <br>which it is bestowed.”</h4>
                    <div class="text wow fadeInUp" data-wow-delay="200ms">How all this mistaken idea of denouncing pleasure and praising pain was born <br>and I will give you a complete account of the system expound the actually <br>teachings of the great explorer of the truth pursues.</div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="link-btn wow fadeInLeft" data-wow-delay="500ms"><a href="#" class="theme-btn btn-style-two"><i class="flaticon-next"></i><span>Our Mission</span></a></div>
                            <div class="text">Beguiled and demoralized by the charms off pleasure the moments, so by desire trouble.</div>
                        </div>
                        <div class="col-md-6">
                            <div class="link-btn wow fadeInRight" data-wow-delay="900ms"><a href="#" class="theme-btn btn-style-three"><i class="flaticon-next"></i><span>Our Vision</span></a></div>
                            <div class="text">The great explorer of the truth, theats masters builders off human happiness no one rejects.</div>
                        </div>
                    </div>
                    <div class="link-btn-two">
                        <a href="#" class="theme-btn btn-style-one"><span>More About Us</span></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-image-block">
                    <div class="logo-box">
                        <div class="image wow zoomIn" data-wow-delay="500ms"><img src="assets/images/resource/logo-icon.png" alt=""></div>
                    </div>
                    <div class="image-one wow fadeInUp" data-wow-delay="200ms"><img src="assets/images/resource/image-1.jpg" alt=""></div>
                    <div class="image-two"><img src="assets/images/resource/image-2.jpg" alt=""><a href="https://www.youtube.com/watch?v=nfP5N9Yc72A&amp;t=28s" class="overlay-link lightbox-image video-fancybox"><span class="flaticon-multimedia"></span></a></div>
                    <div class="image-three wow fadeInRight" data-wow-delay="200ms"><img src="assets/images/resource/image-3.jpg" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Causes Section -->
<section class="causes-section">
    <div class="auto-container">
        <div class="sec-title text-center">
            <h1>Causes we care about</h1>
            <div class="text">We connects nonprofits, donors, and companies in nearly every country around the world.</div>
        </div>
        <div class="cause-carousel-wrapper">
            <div class="cause-carousel owl-theme owl-carousel owl-dots-none owl-nav-style-three">
                <!-- Cause Block One -->
                @foreach($causes as $key=>$rows)
                <div class="cause-block-one">
                    <div class="inner-box">
                        <div class="image"><a href="{{ route('cause.show', $rows->id) }}"><img src="{{ asset('storage/images/'.$rows->media)}}" style="height: 230px;" alt="cause-media"></a></div>
                        <div class="lower-content">
                            <h4><a href="{{ route('cause.show', $rows->id) }}">{{ $rows->title }}</a></h4>
                            <div class="category"><a href="#"><span class="flaticon-book"></span>{{ $rows->category_id }}</a></div>
                            <div class="text">{{ substr($rows->description,0,75) }}...</div>
                            <div class="info-box">
                                <a href="#"><span>Raised:</span> $72000</a>
                                <a href="#"><span>Goal:</span> TZS {{ $rows->amount }}</a>
                            </div>
                            <!--Progress Levels-->
                            <div class="progress-levels">

                                <!--Skill Box-->
                                <div class="progress-box wow fadeInRight" data-wow-delay="100ms" data-wow-duration="1500ms">
                                    <div class="inner">
                                        <div class="bar">
                                            <div class="bar-innner">
                                                <div class="bar-fill" data-percent="60">
                                                    <div class="percent"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text">Raised by 84 people in 12 days</div>
                            <div class="bottom-content">
                                <div class="link-btn"><a href="cause-details.html" class="theme-btn btn-style-one donate-box-btn"><span>Donate Now</span></a></div>
                                <div class="share-icon post-share-icon">
                                    <div class="share-btn"><i class="flaticon-share"></i></div>
                                    <ul>
                                        <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                                        <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- Cause Block One -->
                <div class="cause-block-one">
                    <div class="inner-box">
                        <div class="image"><a href="cause-details.html"><img src="assets/images/resource/cause-2.jpg" alt=""></a></div>
                        <div class="lower-content">
                            <h4><a href="cause-details.html">Help bolanile fight cancer</a></h4>
                            <div class="category"><a href="#"><span class="flaticon-heart"></span>Helth & Diseases</a></div>
                            <div class="text">Our power of choice is untrammelled and nothing prevents like best.</div>
                            <div class="info-box">
                                <a href="#"><span>Raised:</span> $40000</a>
                                <a href="#"><span>Goal:</span> $80000</a>
                            </div>
                            <!--Progress Levels-->
                            <div class="progress-levels">

                                <!--Skill Box-->
                                <div class="progress-box wow fadeInRight" data-wow-delay="100ms" data-wow-duration="1500ms">
                                    <div class="inner">
                                        <div class="bar">
                                            <div class="bar-innner">
                                                <div class="bar-fill" data-percent="60">
                                                    <div class="percent"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text">Raised by 36 people in 08 days</div>
                            <div class="bottom-content">
                                <div class="link-btn"><a href="cause-details.html" class="theme-btn btn-style-one donate-box-btn"><span>Donate Now</span></a></div>
                                <div class="share-icon post-share-icon">
                                    <div class="share-btn"><i class="flaticon-share"></i></div>
                                    <ul>
                                        <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                                        <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Cause Block One -->
                <div class="cause-block-one">
                    <div class="inner-box">
                        <div class="image"><a href="cause-details.html"><img src="assets/images/resource/cause-1.jpg" alt=""></a></div>
                        <div class="lower-content">
                            <h4><a href="cause-details.html">Donation for helpless people</a></h4>
                            <div class="category"><a href="#"><span class="flaticon-fruit"></span>Hunger & Nutrition</a></div>
                            <div class="text">Obligations of business it will frequently have to repudiated.</div>
                            <div class="info-box">
                                <a href="#"><span>Raised:</span> $92000</a>
                                <a href="#"><span>Goal:</span> $120000</a>
                            </div>
                            <!--Progress Levels-->
                            <div class="progress-levels">

                                <!--Skill Box-->
                                <div class="progress-box wow fadeInRight" data-wow-delay="100ms" data-wow-duration="1500ms">
                                    <div class="inner">
                                        <div class="bar">
                                            <div class="bar-innner">
                                                <div class="bar-fill" data-percent="60">
                                                    <div class="percent"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text">Raised by 56 people in 15 days</div>
                            <div class="bottom-content">
                                <div class="link-btn"><a href="cause-details.html" class="theme-btn btn-style-one donate-box-btn"><span>Donate Now</span></a></div>
                                <div class="share-icon post-share-icon">
                                    <div class="share-btn"><i class="flaticon-share"></i></div>
                                    <ul>
                                        <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                                        <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Cause Block One -->
                <div class="cause-block-one">
                    <div class="inner-box">
                        <div class="image"><a href="cause-details.html"><img src="assets/images/resource/cause-1.jpg" alt=""></a></div>
                        <div class="lower-content">
                            <h4><a href="cause-details.html">Help nigerian girls education</a></h4>
                            <div class="category"><a href="#"><span class="flaticon-book"></span>Education</a></div>
                            <div class="text">Indignation and dislike men who are like beguiled and demoralized.</div>
                            <div class="info-box">
                                <a href="#"><span>Raised:</span> $72000</a>
                                <a href="#"><span>Goal:</span> $100000</a>
                            </div>
                            <!--Progress Levels-->
                            <div class="progress-levels">

                                <!--Skill Box-->
                                <div class="progress-box wow fadeInRight" data-wow-delay="100ms" data-wow-duration="1500ms">
                                    <div class="inner">
                                        <div class="bar">
                                            <div class="bar-innner">
                                                <div class="bar-fill" data-percent="60">
                                                    <div class="percent"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text">Raised by 84 people in 12 days</div>
                            <div class="bottom-content">
                                <div class="link-btn"><a href="cause-details.html" class="theme-btn btn-style-one donate-box-btn"><span>Donate Now</span></a></div>
                                <div class="share-icon post-share-icon">
                                    <div class="share-btn"><i class="flaticon-share"></i></div>
                                    <ul>
                                        <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                                        <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Cause Block One -->
                <div class="cause-block-one">
                    <div class="inner-box">
                        <div class="image"><a href="cause-details.html"><img src="assets/images/resource/cause-2.jpg" alt=""></a></div>
                        <div class="lower-content">
                            <h4><a href="cause-details.html">Help bolanile fight cancer</a></h4>
                            <div class="category"><a href="#"><span class="flaticon-heart"></span>Helth & Diseases</a></div>
                            <div class="text">Our power of choice is untrammelled and nothing prevents like best.</div>
                            <div class="info-box">
                                <a href="#"><span>Raised:</span> $40000</a>
                                <a href="#"><span>Goal:</span> $80000</a>
                            </div>
                            <!--Progress Levels-->
                            <div class="progress-levels">

                                <!--Skill Box-->
                                <div class="progress-box wow fadeInRight" data-wow-delay="100ms" data-wow-duration="1500ms">
                                    <div class="inner">
                                        <div class="bar">
                                            <div class="bar-innner">
                                                <div class="bar-fill" data-percent="60">
                                                    <div class="percent"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text">Raised by 36 people in 08 days</div>
                            <div class="bottom-content">
                                <div class="link-btn"><a href="cause-details.html" class="theme-btn btn-style-one donate-box-btn"><span>Donate Now</span></a></div>
                                <div class="share-icon post-share-icon">
                                    <div class="share-btn"><i class="flaticon-share"></i></div>
                                    <ul>
                                        <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                                        <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Cause Block One -->
                <div class="cause-block-one">
                    <div class="inner-box">
                        <div class="image"><a href="cause-details.html"><img src="assets/images/resource/cause-1.jpg" alt=""></a></div>
                        <div class="lower-content">
                            <h4><a href="cause-details.html">Donation for helpless people</a></h4>
                            <div class="category"><a href="#"><span class="flaticon-fruit"></span>Hunger & Nutrition</a></div>
                            <div class="text">Obligations of business it will frequently have to repudiated.</div>
                            <div class="info-box">
                                <a href="#"><span>Raised:</span> $92000</a>
                                <a href="#"><span>Goal:</span> $120000</a>
                            </div>
                            <!--Progress Levels-->
                            <div class="progress-levels">

                                <!--Skill Box-->
                                <div class="progress-box wow fadeInRight" data-wow-delay="100ms" data-wow-duration="1500ms">
                                    <div class="inner">
                                        <div class="bar">
                                            <div class="bar-innner">
                                                <div class="bar-fill" data-percent="60">
                                                    <div class="percent"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text">Raised by 56 people in 15 days</div>
                            <div class="bottom-content">
                                <div class="link-btn"><a href="cause-details.html" class="theme-btn btn-style-one donate-box-btn"><span>Donate Now</span></a></div>
                                <div class="share-icon post-share-icon">
                                    <div class="share-btn"><i class="flaticon-share"></i></div>
                                    <ul>
                                        <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                                        <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Donor Section -->
<section class="donor-section" style="background-image: url(assets/images/background/bg-1.jpg);">
    <div class="auto-container">
        <div class="row">
            <div class="col-lg-8 left-column">
                <div class="sec-title light">
                    <h1>The trusted choice of donors</h1>
                    <div class="text">We connects nonprofits, donors, and companies in nearly every country around the world.</div>
                </div>
                <div class="row">
                    <div class="col-md-4 donor-block">
                        <div class="inner-box wow fadeInUp" data-wow-delay="200ms">
                            <div class="top-content">
                                <div class="image">
                                    <img src="assets/images/resource/donor-1.jpg" alt="">
                                    <div class="overlay">
                                        <div class="icon"><a href="#"><span class="fa fa-twitter"></span></a></div>
                                    </div>
                                </div>
                                <h4>Austin Leon</h4>
                                <div class="location">San Jose</div>
                            </div>
                            <div class="bottom-content">
                                <div class="text">Donation</div>
                                <div class="price">$250</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 donor-block">
                        <div class="inner-box wow fadeInUp" data-wow-delay="500ms">
                            <div class="top-content">
                                <div class="image">
                                    <img src="assets/images/resource/donor-2.jpg" alt="">
                                    <div class="overlay">
                                        <div class="icon"><a href="#"><span class="fa fa-twitter"></span></a></div>
                                    </div>
                                </div>
                                <h4>Alvina Betty</h4>
                                <div class="location">Liverpool</div>
                            </div>
                            <div class="bottom-content">
                                <div class="text">Donation</div>
                                <div class="price">$200</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 donor-block">
                        <div class="inner-box wow fadeInUp" data-wow-delay="200ms">
                            <div class="top-content">
                                <div class="image">
                                    <img src="assets/images/resource/donor-3.jpg" alt="">
                                    <div class="overlay">
                                        <div class="icon"><a href="#"><span class="fa fa-twitter"></span></a></div>
                                    </div>
                                </div>
                                <h4>Jasper Flelix</h4>
                                <div class="location">Newcastle</div>
                            </div>
                            <div class="bottom-content">
                                <div class="text">Donation</div>
                                <div class="price">$500</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 right-column">
                <div class="feature-block-one wow fadeInUp" data-wow-delay="200ms">
                    <div class="icon-box"><span class="flaticon-world"></span></div>
                    <h4>Maximum tax <br>benefit</h4>
                </div>
                <div class="feature-block-one wow fadeInUp" data-wow-delay="400ms">
                    <div class="icon-box"><span class="flaticon-reward"></span></div>
                    <h4>Publicity <br>or anonymity</h4>
                </div>
                <div class="feature-block-one wow fadeInUp" data-wow-delay="600ms">
                    <div class="icon-box"><span class="flaticon-shield"></span></div>
                    <h4>Guaranteed <br>and relevance</h4>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Funfact Section -->
<section class="funfacts-section">
    <div class="auto-container">
        <div class="sec-title text-center">
            <h1>Numbers speaking</h1>
            <div class="text">Love learning about crazy facts? Then read these amazing facts that will tickle your brain.</div>
        </div>
        <div class="outer-box">
            <div class="funfact-wrapper row">
                <!--Column-->
                <div class="col-lg-4 counter-block wow fadeInUp" data-wow-delay="300ms">
                    <div class="inner-box">
                        <div class="icon-box"><img src="assets/images/icons/icon-3.png" alt=""></div>
                        <h4>Beneficiaries</h4>
                        <div class="count-box">
                            <span class="prefix">$</span><span class="count-text" data-speed="3000" data-stop="2.6">0</span><span class="affix">M</span>
                        </div>
                        <div class="text">Over 25600 directly beneficiaries of our <br>foundation programme.</div>
                    </div>
                </div>
                <!--Column-->
                <div class="col-lg-4 counter-block wow fadeInUp" data-wow-delay="600ms">
                    <div class="inner-box">
                        <div class="icon-box"><img src="assets/images/icons/icon-4.png" alt=""></div>
                        <h4>Happy Donators</h4>
                        <div class="count-box">
                            <span class="prefix"></span><span class="count-text" data-speed="3000" data-stop="458">0</span><span class="affix">+</span>
                        </div>
                        <div class="text">458+ people donate our charity to with <br>100% happy heart.</div>
                    </div>
                </div>
                <!--Column-->
                <div class="col-lg-4 counter-block wow fadeInUp" data-wow-delay="300ms">
                    <div class="inner-box">
                        <div class="icon-box"><img src="assets/images/icons/icon-5.png" alt=""></div>
                        <h4>Beneficiaries</h4>
                        <div class="count-box">
                            <span class="prefix"></span><span class="count-text" data-speed="3000" data-stop="137">0</span><span class="affix"></span>
                        </div>
                        <div class="text">Our work would not be possible without <br>dedicatd 137 volunteers.</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-content text-center">
            <div class="text">Indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the <br>moment, so blinded by desire, that they cannot foresee.</div>
            <div class="link-btn"><a href="#" class="theme-btn btn-style-one donate-box-btn"><span>Donate Now</span></a></div>
        </div>
    </div>
</section>

<!--Events Section-->
<section class="events-section">

    <!--Event Tabs-->
    <div class="event-tabs">
        <div class="auto-container">
            <div class="row m-0 justify-content-md-between align-items-end">
                <div class="sec-title">
                    <h1>Our exciting events</h1>
                    <div class="text">Here are our exciting events...would be great to see you at the next one!</div>
                </div>
                <!--Tabs Header-->
                <div class="tabs-header clearfix">
                    <ul class="event-tab-btns clearfix">
                        <li class="event-tab-btn active-btn" data-tab="#event-tab-1">Ongoing</li>
                        <li class="event-tab-btn" data-tab="#event-tab-2">Upcoming</li>
                    </ul>
                </div>
            </div>
            <div class="event-tab-wrapper">
                <!--Tabs Content-->
                <div class="event-tabs-content">
                    <!--Event Tab / Active Tab-->
                    <div class="event-tab active-tab" id="event-tab-1">
                        <div class="event-carousel owl-theme owl-carousel owl-dot-style-one owl-nav-none">
                            <!-- Event Blokc One -->
                            <div class="event-block-one">
                                <div class="inner-box">
                                    <div class="image"><img src="assets/images/resource/event-1.jpg" alt=""></div>
                                    <div class="lower-content">
                                        <div class="date">
                                            <h1>25</h1>
                                            <div class="text"><span>August</span> <br>09.00am - 03.00pm</div>
                                        </div>
                                        <h4><a href="event-details.html">A wooden fishing boat rests on <br>deal in kent</a></h4>
                                        <div class="location"><span class="flaticon-point"></span>24, Red rose Steet, NY</div>
                                    </div>
                                    <div class="link-btn"><a href="#"><span class="flaticon-next"></span>Join With Us</a></div>
                                </div>
                            </div>
                            <!-- Event Blokc One -->
                            <div class="event-block-one">
                                <div class="inner-box">
                                    <div class="image"><img src="assets/images/resource/event-2.jpg" alt=""></div>
                                    <div class="lower-content">
                                        <div class="date">
                                            <h1>16</h1>
                                            <div class="text"><span>October</span> <br>10.00am - 05.00pm</div>
                                        </div>
                                        <h4><a href="event-details.html">Cancer support – world’s biggest <br> coffee morning</a></h4>
                                        <div class="location"><span class="flaticon-point"></span>213, Derrick Street, Bos</div>
                                    </div>
                                    <div class="link-btn"><a href="event-details.html"><span class="flaticon-next"></span>Join With Us</a></div>
                                </div>
                            </div>
                            <!-- Event Blokc One -->
                            <div class="event-block-one">
                                <div class="inner-box">
                                    <div class="image"><img src="assets/images/resource/event-3.jpg" alt=""></div>
                                    <div class="lower-content">
                                        <div class="date">
                                            <h1>27</h1>
                                            <div class="text"><span>December</span> <br>09.00am - 03.00pm</div>
                                        </div>
                                        <h4><a href="event-details.html">Birmingham children’s hospital <br>night-time obstacle race</a></h4>
                                        <div class="location"><span class="flaticon-point"></span>5404, Sebenth Street, la</div>
                                    </div>
                                    <div class="link-btn"><a href="event-details.html"><span class="flaticon-next"></span>Join With Us</a></div>
                                </div>
                            </div>
                            <!-- Event Blokc One -->
                            <div class="event-block-one">
                                <div class="inner-box">
                                    <div class="image"><img src="assets/images/resource/event-1.jpg" alt=""></div>
                                    <div class="lower-content">
                                        <div class="date">
                                            <h1>25</h1>
                                            <div class="text"><span>August</span> <br>09.00am - 03.00pm</div>
                                        </div>
                                        <h4><a href="event-details.html">A wooden fishing boat rests on <br>deal in kent</a></h4>
                                        <div class="location"><span class="flaticon-point"></span>24, Red rose Steet, NY</div>
                                    </div>
                                    <div class="link-btn"><a href="event-details.html"><span class="flaticon-next"></span>Join With Us</a></div>
                                </div>
                            </div>
                            <!-- Event Blokc One -->
                            <div class="event-block-one">
                                <div class="inner-box">
                                    <div class="image"><img src="assets/images/resource/event-2.jpg" alt=""></div>
                                    <div class="lower-content">
                                        <div class="date">
                                            <h1>16</h1>
                                            <div class="text"><span>October</span> <br>10.00am - 12.00pm</div>
                                        </div>
                                        <h4><a href="event-details.html">Cancer support – world’s biggest <br> coffee morning</a></h4>
                                        <div class="location"><span class="flaticon-point"></span>213, Derrick Street, Bos</div>
                                    </div>
                                    <div class="link-btn"><a href="event-details.html"><span class="flaticon-next"></span>Join With Us</a></div>
                                </div>
                            </div>
                            <!-- Event Blokc One -->
                            <div class="event-block-one">
                                <div class="inner-box">
                                    <div class="image"><img src="assets/images/resource/event-3.jpg" alt=""></div>
                                    <div class="lower-content">
                                        <div class="date">
                                            <h1>27</h1>
                                            <div class="text"><span>December</span> <br>10.00am - 05.00pm</div>
                                        </div>
                                        <h4><a href="event-details.html">Birmingham children’s hospital <br>night-time obstacle race</a></h4>
                                        <div class="location"><span class="flaticon-point"></span>5404, Sebenth Street, la</div>
                                    </div>
                                    <div class="link-btn"><a href="event-details.html"><span class="flaticon-next"></span>Join With Us</a></div>
                                </div>
                            </div>
                            <!-- Event Blokc One -->
                            <div class="event-block-one">
                                <div class="inner-box">
                                    <div class="image"><img src="assets/images/resource/event-1.jpg" alt=""></div>
                                    <div class="lower-content">
                                        <div class="date">
                                            <h1>25</h1>
                                            <div class="text"><span>August</span> <br>09.00am - 03.00pm</div>
                                        </div>
                                        <h4><a href="event-details.html">A wooden fishing boat rests on <br>deal in kent</a></h4>
                                        <div class="location"><span class="flaticon-point"></span>24, Red rose Steet, NY</div>
                                    </div>
                                    <div class="link-btn"><a href="event-details.html"><span class="flaticon-next"></span>Join With Us</a></div>
                                </div>
                            </div>
                            <!-- Event Blokc One -->
                            <div class="event-block-one">
                                <div class="inner-box">
                                    <div class="image"><img src="assets/images/resource/event-2.jpg" alt=""></div>
                                    <div class="lower-content">
                                        <div class="date">
                                            <h1>16</h1>
                                            <div class="text"><span>October</span> <br>10.00am - 12.00pm</div>
                                        </div>
                                        <h4><a href="event-details.html">Cancer support – world’s biggest <br> coffee morning</a></h4>
                                        <div class="location"><span class="flaticon-point"></span>213, Derrick Street, Bos</div>
                                    </div>
                                    <div class="link-btn"><a href="event-details.html"><span class="flaticon-next"></span>Join With Us</a></div>
                                </div>
                            </div>
                            <!-- Event Blokc One -->
                            <div class="event-block-one">
                                <div class="inner-box">
                                    <div class="image"><img src="assets/images/resource/event-3.jpg" alt=""></div>
                                    <div class="lower-content">
                                        <div class="date">
                                            <h1>27</h1>
                                            <div class="text"><span>December</span> <br>10.00am - 05.00pm</div>
                                        </div>
                                        <h4><a href="event-details.html">Birmingham children’s hospital <br>night-time obstacle race</a></h4>
                                        <div class="location"><span class="flaticon-point"></span>5404, Sebenth Street, la</div>
                                    </div>
                                    <div class="link-btn"><a href="event-details.html"><span class="flaticon-next"></span>Join With Us</a></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Event Tab-->
                    <div class="event-tab" id="event-tab-2">
                        <div class="event-carousel owl-theme owl-carousel owl-dot-style-one owl-nav-none">
                            <!-- Event Blokc One -->
                            <div class="event-block-one">
                                <div class="inner-box">
                                    <div class="image"><img src="assets/images/resource/event-1.jpg" alt=""></div>
                                    <div class="lower-content">
                                        <div class="date">
                                            <h1>25</h1>
                                            <div class="text"><span>August</span> <br>09.00am - 03.00pm</div>
                                        </div>
                                        <h4><a href="event-details.html">A wooden fishing boat rests on <br>deal in kent</a></h4>
                                        <div class="location"><span class="flaticon-point"></span>24, Red rose Steet, NY</div>
                                    </div>
                                    <div class="link-btn"><a href="#"><span class="flaticon-next"></span>Join With Us</a></div>
                                </div>
                            </div>
                            <!-- Event Blokc One -->
                            <div class="event-block-one">
                                <div class="inner-box">
                                    <div class="image"><img src="assets/images/resource/event-2.jpg" alt=""></div>
                                    <div class="lower-content">
                                        <div class="date">
                                            <h1>16</h1>
                                            <div class="text"><span>October</span> <br>10.00am - 05.00pm</div>
                                        </div>
                                        <h4><a href="event-details.html">Cancer support – world’s biggest <br> coffee morning</a></h4>
                                        <div class="location"><span class="flaticon-point"></span>213, Derrick Street, Bos</div>
                                    </div>
                                    <div class="link-btn"><a href="event-details.html"><span class="flaticon-next"></span>Join With Us</a></div>
                                </div>
                            </div>
                            <!-- Event Blokc One -->
                            <div class="event-block-one">
                                <div class="inner-box">
                                    <div class="image"><img src="assets/images/resource/event-3.jpg" alt=""></div>
                                    <div class="lower-content">
                                        <div class="date">
                                            <h1>27</h1>
                                            <div class="text"><span>December</span> <br>09.00am - 03.00pm</div>
                                        </div>
                                        <h4><a href="event-details.html">Birmingham children’s hospital <br>night-time obstacle race</a></h4>
                                        <div class="location"><span class="flaticon-point"></span>5404, Sebenth Street, la</div>
                                    </div>
                                    <div class="link-btn"><a href="event-details.html"><span class="flaticon-next"></span>Join With Us</a></div>
                                </div>
                            </div>
                            <!-- Event Blokc One -->
                            <div class="event-block-one">
                                <div class="inner-box">
                                    <div class="image"><img src="assets/images/resource/event-1.jpg" alt=""></div>
                                    <div class="lower-content">
                                        <div class="date">
                                            <h1>25</h1>
                                            <div class="text"><span>August</span> <br>09.00am - 03.00pm</div>
                                        </div>
                                        <h4><a href="event-details.html">A wooden fishing boat rests on <br>deal in kent</a></h4>
                                        <div class="location"><span class="flaticon-point"></span>24, Red rose Steet, NY</div>
                                    </div>
                                    <div class="link-btn"><a href="event-details.html"><span class="flaticon-next"></span>Join With Us</a></div>
                                </div>
                            </div>
                            <!-- Event Blokc One -->
                            <div class="event-block-one">
                                <div class="inner-box">
                                    <div class="image"><img src="assets/images/resource/event-2.jpg" alt=""></div>
                                    <div class="lower-content">
                                        <div class="date">
                                            <h1>16</h1>
                                            <div class="text"><span>October</span> <br>10.00am - 12.00pm</div>
                                        </div>
                                        <h4><a href="event-details.html">Cancer support – world’s biggest <br> coffee morning</a></h4>
                                        <div class="location"><span class="flaticon-point"></span>213, Derrick Street, Bos</div>
                                    </div>
                                    <div class="link-btn"><a href="event-details.html"><span class="flaticon-next"></span>Join With Us</a></div>
                                </div>
                            </div>
                            <!-- Event Blokc One -->
                            <div class="event-block-one">
                                <div class="inner-box">
                                    <div class="image"><img src="assets/images/resource/event-3.jpg" alt=""></div>
                                    <div class="lower-content">
                                        <div class="date">
                                            <h1>27</h1>
                                            <div class="text"><span>December</span> <br>10.00am - 05.00pm</div>
                                        </div>
                                        <h4><a href="event-details.html">Birmingham children’s hospital <br>night-time obstacle race</a></h4>
                                        <div class="location"><span class="flaticon-point"></span>5404, Sebenth Street, la</div>
                                    </div>
                                    <div class="link-btn"><a href="event-details.html"><span class="flaticon-next"></span>Join With Us</a></div>
                                </div>
                            </div>
                            <!-- Event Blokc One -->
                            <div class="event-block-one">
                                <div class="inner-box">
                                    <div class="image"><img src="assets/images/resource/event-1.jpg" alt=""></div>
                                    <div class="lower-content">
                                        <div class="date">
                                            <h1>25</h1>
                                            <div class="text"><span>August</span> <br>09.00am - 03.00pm</div>
                                        </div>
                                        <h4><a href="event-details.html">A wooden fishing boat rests on <br>deal in kent</a></h4>
                                        <div class="location"><span class="flaticon-point"></span>24, Red rose Steet, NY</div>
                                    </div>
                                    <div class="link-btn"><a href="event-details.html"><span class="flaticon-next"></span>Join With Us</a></div>
                                </div>
                            </div>
                            <!-- Event Blokc One -->
                            <div class="event-block-one">
                                <div class="inner-box">
                                    <div class="image"><img src="assets/images/resource/event-2.jpg" alt=""></div>
                                    <div class="lower-content">
                                        <div class="date">
                                            <h1>16</h1>
                                            <div class="text"><span>October</span> <br>10.00am - 12.00pm</div>
                                        </div>
                                        <h4><a href="event-details.html">Cancer support – world’s biggest <br> coffee morning</a></h4>
                                        <div class="location"><span class="flaticon-point"></span>213, Derrick Street, Bos</div>
                                    </div>
                                    <div class="link-btn"><a href="event-details.html"><span class="flaticon-next"></span>Join With Us</a></div>
                                </div>
                            </div>
                            <!-- Event Blokc One -->
                            <div class="event-block-one">
                                <div class="inner-box">
                                    <div class="image"><img src="assets/images/resource/event-3.jpg" alt=""></div>
                                    <div class="lower-content">
                                        <div class="date">
                                            <h1>27</h1>
                                            <div class="text"><span>December</span> <br>10.00am - 05.00pm</div>
                                        </div>
                                        <h4><a href="event-details.html">Birmingham children’s hospital <br>night-time obstacle race</a></h4>
                                        <div class="location"><span class="flaticon-point"></span>5404, Sebenth Street, la</div>
                                    </div>
                                    <div class="link-btn"><a href="event-details.html"><span class="flaticon-next"></span>Join With Us</a></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>

<!-- Testimonial Section Four -->
<section class="testimonial-section-four">
    <div class="auto-container">
        <div class="sec-title text-center">
            <h1>Why people love us</h1>
            <div class="text">Please read below to see what a few of our charity partners have to say about us.</div>
        </div>
        <div class="row">
            <div class="three-item-carousel owl-theme owl-carousel owl-nav-none owl-dot-style-one">
                <div class="testimonial-block-four">
                    <div class="inner-box">
                        <div class="image"><img src="assets/images/resource/client-thumb-1.jpg" alt=""></div>
                        <h4>It’s helped me so much.</h4>
                        <div class="text">Goodsoul! charities provided the jump <br>start we needed to expaand our all efforts <br>and train more volunteers.</div>
                        <div class="author-title">Isaac Samuel</div>
                        <div class="designation">CEO & Founder <a href="#">Sun Life</a></div>
                    </div>
                </div>
                <div class="testimonial-block-four">
                    <div class="inner-box">
                        <div class="image"><img src="assets/images/resource/client-thumb-2.jpg" alt=""></div>
                        <h4>Thank you for support.</h4>
                        <div class="text">Thank you so much for making my family <br>your priority. It has meant the world to my <br>mom to have a decent car.</div>
                        <div class="author-title">Lucas Edward</div>
                        <div class="designation">Employee <a href="#">Target Tech</a></div>
                    </div>
                </div>
                <div class="testimonial-block-four">
                    <div class="inner-box">
                        <div class="image"><img src="assets/images/resource/client-thumb-3.jpg" alt=""></div>
                        <h4>Positive experience.</h4>
                        <div class="text">Thank you so much for the laptop you <br>provided. It has been very helpful for him <br>and I'm sure will continue.</div>
                        <div class="author-title">Ollie Reuben</div>
                        <div class="designation">Web Designer <a href="#">Forest Theme</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="team-section">
    <div class="auto-container">
        <div class="row m-0 justify-content-md-between align-items-end">
            <div class="sec-title light">
                <h1>Team behind goodsoul</h1>
                <div class="text">Our work would not be possible without the work of our dedicated volunteers.</div>
            </div>
            <!--Link Btn-->
            <div class="link-btn mb-50">
                <a href="#" class="theme-btn btn-style-one"><span>Meet All Members</span></a>
            </div>
        </div>
        <div class="wrapper-box">
            <div class="row">
                <!-- Team Blokc One -->
                <div class="col-lg-4 team-block-one">
                    <div class="inner-box wow fadeInDown" data-wow-delay="200ms">
                        <div class="image"><a href="#"><img src="assets/images/resource/team-1.jpg" alt=""></a></div>
                        <div class="lower-content">
                            <h4> <a href="#">Benjie Alphonso</a></h4>
                            <div class="designation">Founder</div>
                        </div>
                        <ul class="social-icon-two">
                            <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                            <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                            <li><a href="#"><span class="fa fa-skype"></span></a></li>
                            <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                        </ul>
                    </div>
                </div>
                <!-- Team Blokc One -->
                <div class="col-lg-4 team-block-one">
                    <div class="inner-box wow fadeInUp" data-wow-delay="400ms">
                        <div class="image"><a href="#"><img src="assets/images/resource/team-2.jpg" alt=""></a></div>
                        <div class="lower-content">
                            <h4> <a href="#">Ivor Herbert</a></h4>
                            <div class="designation">Manager</div>
                        </div>
                        <ul class="social-icon-two">
                            <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                            <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                            <li><a href="#"><span class="fa fa-skype"></span></a></li>
                            <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                        </ul>
                    </div>
                </div>
                <!-- Team Blokc One -->
                <div class="col-lg-4 team-block-one">
                    <div class="inner-box wow fadeInDown" data-wow-delay="200ms">
                        <div class="image"><a href="#"><img src="assets/images/resource/team-3.jpg" alt=""></a></div>
                        <div class="lower-content">
                            <h4> <a href="#">Merlin Judson</a></h4>
                            <div class="designation">Ground Person</div>
                        </div>
                        <ul class="social-icon-two">
                            <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                            <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                            <li><a href="#"><span class="fa fa-skype"></span></a></li>
                            <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Volunteer -->
<section class="volunteer-section">
    <div class="auto-container">
        <div class="sec-title text-center">
            <h1>Become a volunteer</h1>
            <div class="text">Please read below to see what a few of our charity partners have to say about us.</div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="image-wrapper-one wow fadeInLeft" data-wow-delay="400ms">
                    <div class="row no-gutters justify-content-center align-items-center">
                        <div class="image"><img src="assets/images/resource/image-4.jpg" alt=""></div>
                    </div>
                    <div class="row no-gutters justify-content-center align-items-center">
                        <div class="image"><img src="assets/images/resource/image-5.jpg" alt=""></div>
                        <div class="image"><img src="assets/images/resource/image-6.jpg" alt=""></div>
                    </div>
                    <div class="row no-gutters justify-content-center align-items-center">
                        <div class="image"><img src="assets/images/resource/image-7.jpg" alt=""></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 order-lg-2">
                <div class="image-wrapper-two wow fadeInRight" data-wow-delay="600ms">
                    <div class="row no-gutters justify-content-center align-items-center">
                        <div class="image"><img src="assets/images/resource/image-8.jpg" alt=""></div>
                    </div>
                    <div class="row no-gutters justify-content-center align-items-center">
                        <div class="image"><img src="assets/images/resource/image-9.jpg" alt=""></div>
                        <div class="image"><img src="assets/images/resource/image-10.jpg" alt=""></div>
                    </div>
                    <div class="row no-gutters justify-content-center align-items-center">
                        <div class="image"><img src="assets/images/resource/image-11.jpg" alt=""></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="default-form-area wow fadeInUp" data-wow-delay="200ms">
                    <form id="contact-form" name="contact_form" class="contact-form" action="http://steelthemes.com/demo/html/Goodsoul_html/inc/sendmail.php" method="post">
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 column">
                                <div class="form-group">
                                    <input type="text" name="form_name" class="form-control" value="" placeholder="Your Name*" required="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 column">
                                <div class="form-group">
                                    <select class="filters-selec form-controlt selectmenu" name="form_subject">
                                        <option value="*">Gender*</option>
                                        <option value=".category-1">Male</option>
                                        <option value=".category-2">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 column">
                                <div class="form-group">
                                    <input type="email" name="form_email" class="form-control required email" value="" placeholder="Email*" required="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 column">
                                <div class="form-group">
                                    <select class="filters-selec form-controlt selectmenu" name="form_subject">
                                        <option value="*">How did you here us</option>
                                        <option value=".category-1">How did you here us</option>
                                        <option value=".category-2">How did you here us</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 column">
                                <div class="form-group">
                                    <textarea name="form_message" class="form-control textarea required" placeholder="Briefly Explain Your Project..."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="contact-section-btn">
                            <div class="row m-0 justify-content-md-between align-items-end">
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">CV UPLOAD</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                </div>
                                <div class="form-group">
                                    <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
                                    <button class="theme-btn btn-style-one" type="submit" data-loading-text="Please wait..."><span>Send Message</span></button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Blog Section -->
<section class="blog-section">
    <div class="auto-container">
        <div class="row m-0 justify-content-md-between align-items-end">
            <div class="sec-title">
                <h1>Team behind goodsoul</h1>
                <div class="text">Our work would not be possible without the work of our dedicated volunteers.</div>
            </div>
            <!--Link Btn-->
            <div class="link-btn mb-50">
                <a href="#" class="theme-btn btn-style-one"><span>Meet All Members</span></a>
            </div>
        </div>
        <div class="row">
            <!-- News Block One -->
            <div class="col-lg-3 col-md-6 news-block-one">
                <div class="inner-box wow fadeInUp" data-wow-delay="200ms">
                    <div class="category"><a href="#">Tips & Advice</a></div>
                    <div class="image">
                        <a href="blog-details.html"><img src="assets/images/resource/news-1.jpg" alt=""></a>
                        <div class="post-meta-info">
                            <a href="#"><span class="flaticon-eye"></span>21</a>
                            <a href="#"><span class="flaticon-comment"></span>08</a>
                        </div>
                    </div>
                    <div class="lower-content">
                        <div class="date">Jul 14, 2019</div>
                        <h4><a href="blog-details.html">Water is more essential</a></h4>
                        <div class="author-info">
                            <div class="image"><img src="assets/images/resource/author-thumb-1.jpg" alt=""></div>
                            <div class="author-title"><a href="#">Rubin Santro</a></div>
                            <div class="share-icon style-two post-share-icon">
                                <div class="share-btn"><img src="assets/images/resource/dotted.png" alt=""></div>
                                <ul>
                                    <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                                    <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                                    <li><a href="#"><span class="fa fa-skype"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- News Block One -->
            <div class="col-lg-3 col-md-6 news-block-one">
                <div class="inner-box wow fadeInDown" data-wow-delay="400ms">
                    <div class="category"><a href="#">Interviews</a></div>
                    <div class="image">
                        <a href="blog-details.html"><img src="assets/images/resource/news-2.jpg" alt=""></a>
                        <div class="post-meta-info">
                            <a href="#"><span class="flaticon-eye"></span>14</a>
                            <a href="#"><span class="flaticon-comment"></span>05</a>
                        </div>
                    </div>
                    <div class="lower-content">
                        <div class="date">Jun 05, 2019</div>
                        <h4><a href="blog-details.html">Coaching for fundraisers</a></h4>
                        <div class="author-info">
                            <div class="image"><img src="assets/images/resource/author-thumb-1.jpg" alt=""></div>
                            <div class="author-title"><a href="#">Carl Ronny</a></div>
                            <div class="share-icon style-two post-share-icon">
                                <div class="share-btn"><img src="assets/images/resource/dotted.png" alt=""></div>
                                <ul>
                                    <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                                    <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                                    <li><a href="#"><span class="fa fa-skype"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- News Block One -->
            <div class="col-lg-3 col-md-6 news-block-one">
                <div class="inner-box wow fadeInUp" data-wow-delay="200ms">
                    <div class="category"><a href="#">Disaster</a><a href="#">Video</a></div>
                    <div class="image">
                        <a href="blog-details.html"><img src="assets/images/resource/news-3.jpg" alt=""></a>
                        <div class="post-meta-info">
                            <a href="#"><span class="flaticon-eye"></span>12</a>
                            <a href="#"><span class="flaticon-comment"></span>02</a>
                        </div>
                        <div class="youtube-video-box"><a href="#"><span class="flaticon-logo"></span></a></div>
                    </div>
                    <div class="lower-content">
                        <div class="date">Mar 27, 2019</div>
                        <h4><a href="blog-details.html">Aid for japan flood</a></h4>
                        <div class="author-info">
                            <div class="image"><img src="assets/images/resource/author-thumb-1.jpg" alt=""></div>
                            <div class="author-title"><a href="#">Gene Emery</a></div>
                            <div class="share-icon style-two post-share-icon">
                                <div class="share-btn"><img src="assets/images/resource/dotted.png" alt=""></div>
                                <ul>
                                    <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                                    <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                                    <li><a href="#"><span class="fa fa-skype"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- News Block One -->
            <div class="col-lg-3 col-md-6 news-block-one">
                <div class="inner-box wow fadeInDown" data-wow-delay="400ms">
                    <div class="category"><a href="#">Disaster</a></div>
                    <div class="image">
                        <a href="blog-details.html"><img src="assets/images/resource/news-4.jpg" alt=""></a>
                        <div class="post-meta-info">
                            <a href="#"><span class="flaticon-eye"></span>26</a>
                            <a href="#"><span class="flaticon-comment"></span>07</a>
                        </div>
                    </div>
                    <div class="lower-content">
                        <div class="date">Feb 14, 2019</div>
                        <h4><a href="blog-details.html">Central china flood</a></h4>
                        <div class="author-info">
                            <div class="image"><img src="assets/images/resource/author-thumb-1.jpg" alt=""></div>
                            <div class="author-title"><a href="#">Lix Ferguson</a></div>
                            <div class="share-icon style-two post-share-icon">
                                <div class="share-btn"><img src="assets/images/resource/dotted.png" alt=""></div>
                                <ul>
                                    <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                                    <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                                    <li><a href="#"><span class="fa fa-skype"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Client section -->
<section class="client-section">
    <div class="auto-container">
        <div class="sponsors-carousel owl-carousel owl-theme owl-nav-none owl-dots-none">
            <div class="image" data-toggle="tooltip" data-placement="top" title="media partner"><a href="#"><img src="assets/images/clients/client-1.png" alt=""></a></div>
            <div class="image" data-toggle="tooltip" data-placement="top" title="media partner"><a href="#"><img src="assets/images/clients/client-2.png" alt=""></a></div>
            <div class="image" data-toggle="tooltip" data-placement="top" title="media partner"><a href="#"><img src="assets/images/clients/client-3.png" alt=""></a></div>
            <div class="image" data-toggle="tooltip" data-placement="top" title="media partner"><a href="#"><img src="assets/images/clients/client-4.png" alt=""></a></div>
            <div class="image" data-toggle="tooltip" data-placement="top" title="media partner"><a href="#"><img src="assets/images/clients/client-5.png" alt=""></a></div>
        </div>
    </div>
</section>

<div id="donate-popup" class="donate-popup">

    <div class="popup-overlay"></div>

    <div class="donate-form-area">
        <div class="donate-form-wrapper">
            <div class="close-donate theme-btn"><span class="flaticon-close"></span></div>
            <div class="sec-title text-center">
                <h1>Donate us to achive our goal</h1>
                <div class="text">Beguiled and demoralized by the charms of pleasure of the moment, so by desire, <br>that they cannot foresee.</div>
            </div>

            <form action="#" class="donate-form default-form">
                <ul class="chicklet-list clearfix">
                    <li>
                        <input type="radio" id="donate-amount-1" name="donate-amount" />
                        <label for="donate-amount-1" data-amount="10">$10</label>
                    </li>
                    <li>
                        <input type="radio" id="donate-amount-2" name="donate-amount" checked="checked" />
                        <label for="donate-amount-2" data-amount="20">$20</label>
                    </li>
                    <li>
                        <input type="radio" id="donate-amount-3" name="donate-amount" />
                        <label for="donate-amount-3" data-amount="50">$50</label>
                    </li>
                    <li>
                        <input type="radio" id="donate-amount-4" name="donate-amount" />
                        <label for="donate-amount-4" data-amount="100">$100</label>
                    </li>
                    <li class="other-amount">
                        <div class="input-container" data-message="Every dollar you donate helps end hunger."><input type="text" id="other-amount" placeholder="Other Amount" />
                        </div>
                    </li>
                </ul>

                <h3>Donor Information</h3>

                <div class="contact-form">
                    <div class="row clearfix">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <input type="text" name="fname" placeholder="Full Name">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <input type="text" name="fname" placeholder="Email Address">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <input type="text" name="fname" placeholder="Contact">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <select class="filters-selec form-controlt selectmenu" name="form_subject">
                                    <option value="*">Payment Via</option>
                                    <option value=".category-1">Cash</option>
                                    <option value=".category-2">Card</option>
                                    <option value=".category-2">Bank Transfer</option>
                                    <option value=".category-2">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group d-flex align-items-center justify-content-between">
                                <button class="theme-btn btn-style-one" type="submit"><span>Donate Now</span></button>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox">
                                        <span>I would like to donate automatically repeat each month</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@include('layouts.footer')
@endsection