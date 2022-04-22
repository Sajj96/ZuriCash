@extends('layouts.app')

@section('page-styles')
@endsection

@section('content')
@include('layouts.header')
<!-- Page Title -->
<section class="page-title">
    <div class="auto-container">
        <div class="content-box">
            <h1>How Nachangia Works</h1>
            <ul class="bread-crumb">
                <li><a class="home" href="{{ route('home') }}"><span class="fa fa-home"></span></a></li>
                <li>How Nachangia Works</li>
            </ul>
        </div>
    </div>
</section>

<section class="history-section">
    <div class="auto-container">
        <div class="description">
            <div class="top-content text-center">
                <div class="icon-box"><img src="{{ asset('assets/images/LOGO2.png')}}" alt=""></div>
                <h1>A small charity has a big impact</h1>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h4>Nachangia is a Tanzania donation-type crowdfunding service. Anyone in Tanzania can quickly and easily create campaign to raise funds within Tanzania and around the world for their beloved ones, for themselves, for the community and for charity.</h4>
                </div>
            </div>
        </div>
        <div class="history-carousel">
            <div class="swiper-container history-image">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="image">
                            <img src="images/resource/image-15.jpg" alt="">
                            <div class="year">1978</div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="image">
                            <img src="images/resource/image-16.jpg" alt="">
                            <div class="year">1978</div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="image">
                            <img src="images/resource/image-17.jpg" alt="">
                            <div class="year">1978</div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="image">
                            <img src="images/resource/image-15.jpg" alt="">
                            <div class="year">1978</div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="image">
                            <img src="images/resource/image-16.jpg" alt="">
                            <div class="year">1978</div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="image">
                            <img src="images/resource/image-17.jpg" alt="">
                            <div class="year">1978</div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="image">
                            <img src="images/resource/image-15.jpg" alt="">
                            <div class="year">1978</div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="image">
                            <img src="images/resource/image-16.jpg" alt="">
                            <div class="year">1978</div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="image">
                            <img src="images/resource/image-17.jpg" alt="">
                            <div class="year">1978</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-container history-content">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="text">In the summer of 1980, Jonathan, Richard, Mark and Craig <br>met to discuss how they could use their skills to raise money to the daily <br>life of the poor people.</div>
                    </div>
                    <div class="swiper-slide">
                        <div class="text">In the summer of 1980, Jonathan, Richard, Mark and Craig <br>met to discuss how they could use their skills to raise money to the daily <br>life of the poor people.</div>
                    </div>
                    <div class="swiper-slide">
                        <div class="text">In the summer of 1980, Jonathan, Richard, Mark and Craig <br>met to discuss how they could use their skills to raise money to the daily <br>life of the poor people.</div>
                    </div>
                    <div class="swiper-slide">
                        <div class="text">In the summer of 1980, Jonathan, Richard, Mark and Craig <br>met to discuss how they could use their skills to raise money to the daily <br>life of the poor people.</div>
                    </div>
                    <div class="swiper-slide">
                        <div class="text">In the summer of 1980, Jonathan, Richard, Mark and Craig <br>met to discuss how they could use their skills to raise money to the daily <br>life of the poor people.</div>
                    </div>
                    <div class="swiper-slide">
                        <div class="text">In the summer of 1980, Jonathan, Richard, Mark and Craig <br>met to discuss how they could use their skills to raise money to the daily <br>life of the poor people.</div>
                    </div>
                    <div class="swiper-slide">
                        <div class="text">In the summer of 1980, Jonathan, Richard, Mark and Craig <br>met to discuss how they could use their skills to raise money to the daily <br>life of the poor people.</div>
                    </div>
                    <div class="swiper-slide">
                        <div class="text">In the summer of 1980, Jonathan, Richard, Mark and Craig <br>met to discuss how they could use their skills to raise money to the daily <br>life of the poor people.</div>
                    </div>
                    <div class="swiper-slide">
                        <div class="text">In the summer of 1980, Jonathan, Richard, Mark and Craig <br>met to discuss how they could use their skills to raise money to the daily <br>life of the poor people.</div>
                    </div>
                </div>
                <div class="swiper-nav-button">
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"><i class="flaticon-next"></i></div>
                    <div class="swiper-button-prev"><i class="flaticon-next"></i></div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('layouts.footer')
@section('page-scripts')
@endsection
@endsection