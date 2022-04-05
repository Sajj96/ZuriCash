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

<!-- Featured campaigns -->
<section class="causes-section">
    <div class="auto-container">
        <div class="sec-title text-center">
            <h1>Featured Campaigns</h1>
            <div class="text">We connects nonprofits, donors, and companies in nearly every country around the world.</div>
        </div>
        <div class="cause-carousel-wrapper">
            <div class="cause-carousel owl-theme owl-carousel owl-dots-none owl-nav-style-three">
                <!-- Cause Block One -->
                @foreach($campaigns as $key=>$rows)
                <div class="cause-block-one-carousel">
                    <div class="inner-box">
                        <div class="image"><a href="{{ route('campaign.show', $rows->id) }}"><img src="{{ asset('storage/images/'.$rows->media)}}" style="height: 230px;" alt="cause-media"></a></div>
                        <div class="lower-content">
                            <h4><a href="{{ route('campaign.show', $rows->id) }}">{{ $rows->title }}</a></h4>
                            <div class="category"><a href="#"><span class="flaticon-book"></span>{{ $rows->category_id }}</a></div>
                            <div class="text">{{ substr($rows->story,0,75) }}...</div>
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
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- Cause Block One -->
                <div class="cause-block-one-carousel">
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
                        </div>
                    </div>
                </div>
                <!-- Cause Block One -->
                <div class="cause-block-one-carousel">
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
                        </div>
                    </div>
                </div>
                <!-- Cause Block One -->
                <div class="cause-block-one-carousel">
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
                        </div>
                    </div>
                </div>
                <!-- Cause Block One -->
                <div class="cause-block-one-carousel">
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
                        </div>
                    </div>
                </div>
                <!-- Cause Block One -->
                <div class="cause-block-one-carousel">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-content text-center">
            <div class="link-btn"><a href="{{ route('campaign.all') }}" class="theme-btn btn-style-one"><span>{{ __('View All')}}</span></a></div>
        </div>
    </div>
</section>

<!-- Download App -->
<section class="donor-section">
    <div class="auto-container">
        <div class="row">
            <div class="col-lg-6">
                <div class="image mb-30"><img src="{{ asset('assets/images/resource/image-12.jpg')}}" alt=""></div>
            </div>
            <div class="col-lg-6">
                <div class="about-content-block">
                    <h1>Be part of a change <br>you want to see in the world</h1>
                    <h4>“Generosity consists not of the sum given, but the manner in <br>which it is bestowed.”</h4>
                    <div class="text wow fadeInUp" data-wow-delay="200ms">Get our app now.</div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="link-btn wow fadeInLeft" data-wow-delay="500ms"><a href="#"><img src="{{ asset('assets/images/badge-google-play.png')}}" width="200" height="100" alt="googleplay" srcset=""></a></div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="link-btn wow fadeInRight" data-wow-delay="900ms"><a href="#"><img src="{{ asset('assets/images/badge-apple.png')}}" width="200" height="100" alt="appstore"></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Popular campaign -->
<section class="donor-section style-two">
    <div class="auto-container">
        <div class="sec-title text-center">
            <h1>Popular Campaigns</h1>
            <div class="text">We connects nonprofits, donors, and companies in nearly every country around the world.</div>
        </div>
        <div class="cause-carousel-wrapper">
            <div class="cause-carousel owl-theme owl-carousel owl-dots-none owl-nav-style-three">
                <!-- Cause Block One -->
                <div class="cause-block-one-carousel">
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
                        </div>
                    </div>
                </div>
                <!-- Cause Block One -->
                <div class="cause-block-one-carousel">
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
                        </div>
                    </div>
                </div>
                <!-- Cause Block One -->
                <div class="cause-block-one-carousel">
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
                        </div>
                    </div>
                </div>
                <!-- Cause Block One -->
                <div class="cause-block-one-carousel">
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
                        </div>
                    </div>
                </div>
                <!-- Cause Block One -->
                <div class="cause-block-one-carousel">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-content text-center">
            <div class="link-btn"><a href="{{ route('campaign.all') }}" class="theme-btn btn-style-one"><span>{{ __('View All')}}</span></a></div>
        </div>
    </div>
</section>

<!-- Categories  -->
<section class="causes-section-four">
    <div class="auto-container">
        <div class="row m-0 justify-content-md-between align-items-end">
            <div class="sec-title">
                <h1>Categories</h1>
            </div>
            <!--Link Btn-->
            <div class="link-btn mb-50">
                <a href="#" class="theme-btn btn-style-one"><span>View All</span></a>
            </div>
        </div>
        <div class="cause-wrapper">
            <div class="row">
                <div class="col-md-4 donor-block">
                    <a href="#">
                        <div class="inner-box wow fadeInUp" data-wow-delay="200ms">
                            <div class="top-content">
                                <div class="image">
                                    <span class="flaticon-heart" style="font-size: 32px;"></span>
                                </div>
                                <h4>Medical</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 donor-block">
                    <a href="#">
                        <div class="inner-box wow fadeInUp" data-wow-delay="500ms">
                            <div class="top-content">
                                <div class="image">
                                    <span class="flaticon-money-1" style="font-size: 32px;"></span>
                                </div>
                                <h4>Business</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 donor-block">
                    <a href="#">
                        <div class="inner-box wow fadeInUp" data-wow-delay="200ms">
                            <div class="top-content">
                                <div class="image">
                                    <span class="flaticon-world" style="font-size: 32px;"></span>
                                </div>
                                <h4>Community</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 donor-block">
                    <a href="#">
                        <div class="inner-box wow fadeInUp" data-wow-delay="200ms">
                            <div class="top-content">
                                <div class="image">
                                    <span class="flaticon-book" style="font-size: 32px;"></span>
                                </div>
                                <h4>Education</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 donor-block">
                    <a href="#">
                        <div class="inner-box wow fadeInUp" data-wow-delay="200ms">
                            <div class="top-content">
                                <div class="image">
                                    <span class="flaticon-hands-and-gestures" style="font-size: 32px;"></span>
                                </div>
                                <h4>Family</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 donor-block">
                    <a href="#">
                        <div class="inner-box wow fadeInUp" data-wow-delay="200ms">
                            <div class="top-content">
                                <div class="image">
                                    <span class="flaticon-bag" style="font-size: 32px;"></span>
                                </div>
                                <h4>Travel</h4>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


@include('layouts.footer')
@endsection