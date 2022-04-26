@extends('layouts.app')

@section('content')
@include('layouts.header')
<!-- Banner Section -->
<section class="banner-section">
    <div class="swiper-container banner-slider">
        <div class="swiper-wrapper">
            <!-- Slide Item -->
            <div class="swiper-slide" style="background-image: url(assets/images/main-slider/5.jpg);">
                <div class="content-outer">
                    <div class="content-box justify-content-center">
                        <div class="inner text-center">
                            <h1>RAISE MONEY FOR ANYTHING</h1>
                            <div class="text">Nachangia Platform allows you to Raise Money for yourself, a family, Friends  <br>and even community development campaign.</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide Item -->
            <div class="swiper-slide" style="background-image: url(assets/images/main-slider/6.jpg);">
                <div class="content-outer">
                    <div class="content-box justify-content-center">
                        <div class="inner text-center">
                            <h1>CREATE CAMPAIGN FREE OF COST</h1>
                            <div class="text">Register your account for free, create your campaign which is simple and precise, your story should answer all the question to donors.  <br>Your pictures should portray the essence of your fundraising.</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide Item -->
            <div class="swiper-slide" style="background-image: url(assets/images/main-slider/7.webp);">
                <div class="content-outer">
                    <div class="content-box justify-content-center">
                        <div class="inner text-center">
                            <h1>SHARE YOUR CAMPAIGN TO YOUR FAMILY AND FRIENDS</h1>
                            <div class="text">The more you share your campaign to many people, the higher the chances of completing your campaign. Use various methods<br> of sharing such as Social media, Email, Text message, Whastapp and many others.</div>
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
                        <div class="image"><a href="{{ route('campaign.show', $rows->id) }}"><img src="{{ $rows->link }}" style="height: 230px;" alt="cause-media"></a></div>
                        <div class="lower-content">
                            <h4><a href="{{ route('campaign.show', $rows->id) }}">{{ $rows->title }}</a></h4>
                            <div class="category"><a href="#"><span class="flaticon-user"></span>{{ $rows->name }}</a></div>
                            <div class="text">{{ substr($rows->description,0,40) }}...</div>
                            <div class="info-box">
                                <a href="#"><span>Raised:</span> $72000</a>
                                <a href="#"><span>Goal:</span> TZS {{ $rows->fundgoals }}</a>
                            </div>
                            <!--Progress Levels-->
                            <div class="progress-levels style-two">

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
                            <div class="progress-levels style-two">

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
                            <div class="progress-levels style-two">

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
                            <div class="progress-levels style-two">

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
                            <div class="progress-levels style-two">

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
                            <div class="progress-levels style-two">

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
                            <div class="progress-levels style-two">

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
                            <div class="progress-levels style-two">

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
                            <div class="progress-levels style-two">

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
                            <div class="progress-levels style-two">

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
                            <div class="progress-levels style-two">

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
<section class="causes-section-four feature-section">
    <div class="auto-container">
        <div class="row m-0 justify-content-md-between align-items-end">
            <div class="sec-title">
                <h1>Categories</h1>
            </div>
            <!--Link Btn-->
            <div class="link-btn mb-50">
                <a href="{{ route('user.category') }}" class="theme-btn btn-style-one"><span>View All</span></a>
            </div>
        </div>
        <div class="row">
            <!-- Feature Block Two -->
            <div class="col-lg-3 col-md-6 feature-block-two">
                <div class="inner-box">
                    <a href="{{ route('category.campaigns', 1) }}">
                        <div class="icon-box">
                            <img src="{{ asset('assets/images/icons/healthcare-2.png')}}" alt="">
                        </div>
                        <h4>Medical</h4>
                    </a>
                </div>
            </div>
            <!-- Feature Block Two -->
            <div class="col-lg-3 col-md-6 feature-block-two">
                <div class="inner-box">
                    <a href="{{ route('category.campaigns', 4) }}">
                        <div class="icon-box">
                            <img src="{{ asset('assets/images/icons/team-2.png')}}" alt="">
                        </div>
                        <h4>Business</h4>
                    </a>
                </div>
            </div>
            <!-- Feature Block Two -->
            <div class="col-lg-3 col-md-6 feature-block-two">
                <div class="inner-box">
                    <a href="{{ route('category.campaigns', 2) }}">
                        <div class="icon-box">
                            <img src="{{ asset('assets/images/icons/foster-family-2.png')}}" alt="">
                        </div>
                        <h4>Family</h4>
                    </a>
                </div>
            </div>
            <!-- Feature Block Two -->
            <div class="col-lg-3 col-md-6 feature-block-two">
                <div class="inner-box">
                    <a href="{{ route('category.campaigns', 3) }}">
                        <div class="icon-box">
                            <img src="{{ asset('assets/images/icons/community-2.png')}}" alt="">
                        </div>
                        <h4>Community</h4>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Success stories -->
<section class="blog-section">
    <div class="auto-container">
        <div class="row m-0 justify-content-md-between align-items-end">
            <div class="sec-title">
                <h1>Success stories</h1>
            </div>
            <!--Link Btn-->
            <div class="link-btn mb-50">
                <a href="#" class="theme-btn btn-style-one"><span>View All</span></a>
            </div>
        </div>
        <div class="row">
            <!-- News Block One -->
            <div class="col-lg-3 col-md-6 news-block-one">
                <div class="inner-box wow fadeInUp" data-wow-delay="200ms">
                    <div class="category"><a href="#">Raised: TZS 30</a></div>
                    <div class="image">
                        <a href="blog-details.html"><img src="{{ asset('assets/images/resource/news-1.jpg')}}" alt=""></a>
                        <div class="post-meta-info">
                            <a href="#">Raised: TZS 21</a>
                        </div>
                    </div>
                    <div class="lower-content">
                        <div class="date">Jul 14, 2019</div>
                        <h4><a href="blog-details.html">Water is more essential</a></h4>
                        <div class="author-info">
                            <div class="image"><span class="flaticon-user"></span></div>
                            <div class="author-title"><a href="#">Rubin Santro</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- News Block One -->
            <div class="col-lg-3 col-md-6 news-block-one">
                <div class="inner-box wow fadeInDown" data-wow-delay="400ms">
                    <div class="category"><a href="#">Interviews</a></div>
                    <div class="image">
                        <a href="blog-details.html"><img src="{{ asset('assets/images/resource/news-2.jpg')}}" alt=""></a>
                        <div class="post-meta-info">
                            <a href="#"><span class="flaticon-eye"></span>14</a>
                            <a href="#"><span class="flaticon-comment"></span>05</a>
                        </div>
                    </div>
                    <div class="lower-content">
                        <div class="date">Jun 05, 2019</div>
                        <h4><a href="blog-details.html">Coaching for fundraisers</a></h4>
                        <div class="author-info">
                            <div class="image"><img src="{{ asset('assets/images/resource/author-thumb-1.jpg')}}" alt=""></div>
                            <div class="author-title"><a href="#">Carl Ronny</a></div>
                            <div class="share-icon style-two post-share-icon">
                                <div class="share-btn"><img src="{{ asset('assets/images/resource/dotted.png')}}" alt=""></div>
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
                        <a href="blog-details.html"><img src="{{ asset('assets/images/resource/news-3.jpg')}}" alt=""></a>
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
                            <div class="image"><img src="{{ asset('assets/images/resource/author-thumb-1.jpg')}}" alt=""></div>
                            <div class="author-title"><a href="#">Gene Emery</a></div>
                            <div class="share-icon style-two post-share-icon">
                                <div class="share-btn"><img src="{{ asset('assets/images/resource/dotted.png')}}" alt=""></div>
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
                        <a href="blog-details.html"><img src="{{ asset('assets/images/resource/news-4.jpg')}}" alt=""></a>
                        <div class="post-meta-info">
                            <a href="#"><span class="flaticon-eye"></span>26</a>
                            <a href="#"><span class="flaticon-comment"></span>07</a>
                        </div>
                    </div>
                    <div class="lower-content">
                        <div class="date">Feb 14, 2019</div>
                        <h4><a href="blog-details.html">Central china flood</a></h4>
                        <div class="author-info">
                            <div class="image"><img src="{{ asset('assets/images/resource/author-thumb-1.jpg')}}" alt=""></div>
                            <div class="author-title"><a href="#">Lix Ferguson</a></div>
                            <div class="share-icon style-two post-share-icon">
                                <div class="share-btn"><img src="{{ asset('assets/images/resource/dotted.png')}}" alt=""></div>
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


@include('layouts.footer')
@endsection