@php use Illuminate\Support\Facades\URL; $currentUrl = URL::current(); @endphp
@extends('layouts.app')

@section('page-styles')
<link href="{{ asset('assets/css/shop.css')}}" rel="stylesheet">
@endsection

@section('content')
@include('layouts.header')
<!-- Page Title -->
<section class="page-title">
    <div class="auto-container">
        <div class="content-box">
            <h1>{{ $campaign->title }}</h1>
        </div>
    </div>
</section>

<!-- Cause Info -->
<div class="cause-info">
    <div class="auto-container">
        <div class="wrapper-box">
            <div class="raised"><span>Raised:</span> <br>TZS {{ number_format($total_donations) }}</div>
            <div class="goal"><span>Goal:</span> <br>TZS {{ number_format($campaign->fundgoals) }}</div>
            <div class="progress-block">
                <div class="inner-box">
                    <div class="graph-outer">
                        <input type="text" class="dial" data-fgColor="#ed6221" data-bgColor="#f0edea" data-width="70" data-height="70" data-linecap="normal" value="{{ number_format($donation_percent) }}">
                        <div class="inner-text count-box"><span class="count-text" data-stop="{{ number_format($donation_percent) }}" data-speed="2000"></span>%</div>
                    </div>
                </div>
            </div>
            <div class="donars"><span>Donars</span> <br>148</div>
            <div class="days-left"><span>Days Left</span> <br>{{ $days_between }}</div>
        </div>
    </div>
</div>

<!-- Causes Details -->
<div class="sidebar-page-container cause-details">
    <div class="auto-container">
        <div class="row">
            <div class="col-lg-8 content-column">
                @include('flash-message')
                <div class="image mb-50"><img src="{{ $campaign->link }}" width="720" height="400" alt="campaign-image"></div>
                <div class="sec-title mb-40">
                    <h1>The Story</h1>
                    <div class="text">{{ $campaign->description }}.</div>
                </div>
                <br>
                <div class="share-post">
                    <div class="text"><i class="flaticon-share"></i>Share with friends</div>
                    <ul class="social-icon-seven">
                        <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ $currentUrl }}" class="facebook"><span class="fa fa-facebook"></span>Facebook</a></li>
                        <li><a href="https://twitter.com/intent/tweet?url={{ $currentUrl }}&text={{ $campaign->title }}" class="twitter"><span class="fa fa-twitter"></span>Twitter</a></li>
                        <li><a href="whatsapp://send?text={{ $currentUrl }}" class="whatsapp"><span class="fa fa-whatsapp"></span>Whatsapp</a></li>
                    </ul>
                </div>
                <div class="donate-form-area">
                    <div class="donate-form-wrapper">
                        <div class="sec-title">
                            <h1>Donate us to achive our goal</h1>
                            <div class="text">Beguiled and demoralized by the charms of pleasure of the moment, so by desire, <br>that they cannot foresee.</div>
                        </div>

                        <form action="{{ route('donate.create')}}" class="donate-form default-form" method="post">
                            @csrf
                            <ul class="chicklet-list clearfix">
                                <li>
                                    <input type="radio" id="donate-amount-1" value="1000" name="donate_amount" class="donate_amount" />
                                    <label for="donate-amount-1" data-amount="10">TZS 1000</label>
                                </li>
                                <li>
                                    <input type="radio" id="donate-amount-2" value="2000" name="donate_amount" class="donate_amount" />
                                    <label for="donate-amount-2" data-amount="20">TZS 2000</label>
                                </li>
                                <li>
                                    <input type="radio" id="donate-amount-3" value="5000" name="donate_amount" class="donate_amount" />
                                    <label for="donate-amount-3" data-amount="50">TZS 5000</label>
                                </li>
                                <li>
                                    <input type="radio" id="donate-amount-4" value="10000" name="donate_amount" class="donate_amount" />
                                    <label for="donate-amount-4" data-amount="100">TZS 10000</label>
                                </li>
                                <li class="other-amount">
                                    <div class="input-container" data-message="Every dollar you donate helps end hunger."><input type="text" id="donate_amount" name="donate_amount" placeholder="Other Amount" />
                                    </div>
                                </li>
                            </ul>

                            <h3>Donor Information</h3>

                            <div class="contact-form">
                                <div class="row clearfix">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <input type="text" name="name" placeholder="Full Name">
                                            <input type="hidden" name="campaign_id" value="{{ $campaign->id }}">
                                            <input type="hidden" name="category_id" value="{{ $campaign->category_id }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <input type="email" name="email" placeholder="Email Address">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <input type="text" name="contact" placeholder="Contact">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <select class="filters-selec form-controlt selectmenu" name="payment_method">
                                                <option value="">Payment Via</option>
                                                <option value="1">Mpesa</option>
                                                <option value="2">Tigo Pesa</option>
                                                <option value="3">Airtel Money</option>
                                                <option value="4">Halo Pesa</option>
                                                <option value="5">PayPal</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group d-flex align-items-center justify-content-between">
                                            <button class="theme-btn btn-style-one" type="submit"><span>Donate Now</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-tab-box tabs-box">
                            <ul class="tab-btns tab-buttons clearfix">
                                <li data-tab="#review" class="tab-btn active-btn"><span>Donations (2)</span></li>
                            </ul>
                            <div class="tabs-content">
                                <div class="tab active-tab" id="review">
                                    <div class="review-box-holder">
                                        <div class="two-item-carousel owl-carousel owl-theme owl-dots-none owl-nav-style-two">
                                            <!--Start single review box-->
                                            <div class="column">
                                                <div class="single-review-box">
                                                    <div class="image-holder">
                                                        <img src="{{ asset('assets/images/anonymous.jpg')}}" width="50" height="100" alt="Awesome Image">
                                                    </div>
                                                    <div class="text-holder">
                                                        <div class="top">
                                                            <div class="name">
                                                                <h3>Steven Rich</h3>
                                                                <h3>Donated: <span>TZS 20000</span></h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End single review box-->
                                            <!--Start single review box-->
                                            <div class="column">
                                                <div class="single-review-box">
                                                    <div class="image-holder">
                                                        <img src="{{ asset('assets/images/anonymous.jpg')}}" width="50" height="100" alt="Awesome Image">
                                                    </div>
                                                    <div class="text-holder">
                                                        <div class="top">
                                                            <div class="name">
                                                                <h3>Steven Rich</h3>
                                                                <h3>Donated: <span>TZS 20000</span></h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End single review box-->
                                            <!--Start single review box-->
                                            <div class="column">
                                                <div class="single-review-box">
                                                    <div class="image-holder">
                                                        <img src="{{ asset('assets/images/anonymous.jpg')}}" width="50" height="100" alt="Awesome Image">
                                                    </div>
                                                    <div class="text-holder">
                                                        <div class="top">
                                                            <div class="name">
                                                                <h3>Steven Rich</h3>
                                                                <h3>Donated: <span>TZS 20000</span></h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End single review box-->
                                            <!--Start single review box-->
                                            <div class="column">
                                                <div class="single-review-box">
                                                    <div class="image-holder">
                                                        <img src="{{ asset('assets/images/anonymous.jpg')}}" width="50" height="100" alt="Awesome Image">
                                                    </div>
                                                    <div class="text-holder">
                                                        <div class="top">
                                                            <div class="name">
                                                                <h3>Steven Rich</h3>
                                                                <h3>Donated: <span>TZS 20000</span></h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End single review box-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar">
                    <!-- Cause Widget -->
                    <div class="sidebar-title">
                        <h4>Emergency Campaigns</h4>
                    </div>
                    <div class="sidebar-widget case-widget">
                        <div class="single-item-carousel owl-theme owl-carousel owl-nav-none owl-dot-style-one">
                            <div class="cause-block-two">
                                <div class="inner-box">
                                    <div class="image">
                                        <img src="{{ asset('assets/images/resource/cause-4.jpg')}}" alt="">
                                        <div class="overlay">
                                            <a href="cause-details.html" class="theme-btn btn-style-seven"><span>More Details</span></a>
                                        </div>
                                    </div>
                                    <div class="lower-content">
                                        <!--Progress Levels-->
                                        <div class="progress-levels style-two">

                                            <!--Skill Box-->
                                            <div class="progress-box wow fadeInRight animated" data-wow-delay="100ms" data-wow-duration="1500ms">
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
                                        <div class="wrapper-box">
                                            <h4><a href="cause-details.html">Help girls education</a></h4>
                                            <div class="info-box">
                                                <a href="#"><span>Raised:</span> $72000</a>
                                                <a href="#"><span>Goal:</span> $100000</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cause-block-two">
                                <div class="inner-box">
                                    <div class="image">
                                        <img src="{{ asset('assets/images/resource/cause-4.jpg')}}" alt="">
                                        <div class="overlay">
                                            <a href="cause-details.html" class="theme-btn btn-style-seven"><span>More Details</span></a>
                                        </div>
                                    </div>
                                    <div class="lower-content">
                                        <!--Progress Levels-->
                                        <div class="progress-levels style-two">

                                            <!--Skill Box-->
                                            <div class="progress-box wow fadeInRight animated" data-wow-delay="100ms" data-wow-duration="1500ms">
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
                                        <div class="wrapper-box">
                                            <h4><a href="cause-details.html">Help girls education</a></h4>
                                            <div class="info-box">
                                                <a href="#"><span>Raised:</span> $72000</a>
                                                <a href="#"><span>Goal:</span> $100000</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Newsletter Widget -->
                    <div class="sidebar-widget shop-sidebar-wrapper">
                        <div class="single-sidebar-box">
                            <form class="search-form" action="#">
                                <input name="link" id="link" value="{{ $currentUrl }}" readonly type="text">
                                <button type="button" data-clipboard-target="#link" class="btn-copy">Copy link</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="related-product">
                    <div class="shop-page-title">
                        <div class="title">Featured Campaigns</div>
                    </div>
                    <div class="row">
                        <!--Start single product item-->
                        <!--End single product item-->
                        <!--Start single product item-->
                        <div class="col-lg-4 col-md-6">
                            <div class="cause-block-one-carousel wow fadeInUp" data-wow-delay="700ms">
                                <div class="inner-box">
                                    <div class="image"><a href="cause-details.html"><img src="{{ asset('assets/images/resource/cause-2.jpg')}}" alt=""></a></div>
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
                        </div>
                        <!--End single product item-->
                        <!--Start single product item-->
                        <div class="col-lg-4 col-md-6">
                            <div class="cause-block-one-carousel wow fadeInUp" data-wow-delay="700ms">
                                <div class="inner-box">
                                    <div class="image"><a href="cause-details.html"><img src="{{ asset('assets/images/resource/cause-2.jpg')}}" alt=""></a></div>
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
                        </div>
                        <!--End single product item-->
                        <!--Start single product item-->
                        <div class="col-lg-4 col-md-6">
                            <div class="cause-block-one-carousel wow fadeInUp" data-wow-delay="700ms">
                                <div class="inner-box">
                                    <div class="image"><a href="cause-details.html"><img src="{{ asset('assets/images/resource/cause-2.jpg')}}" alt=""></a></div>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
@section('page-scripts')
<script src="{{ asset('assets/js/knob.js')}}"></script>
<script src="{{ asset('assets/js/jquery.bootstrap-touchspin.js')}}"></script>
<script src="{{ asset('assets/js/clipboard/clipboard.min.js')}}"></script>
<script>
    $(document).ready(function() {

        new Clipboard('.btn-copy');

        $('#donate_amount').on('keyup', function(){
            if($(this).val() !== "") {
                $('input:radio[name=donate_amount]').each(function() {
                    if($(this).prop('checked')) {
                        $(this).removeAttr('checked');
                        $('#donate_amount').attr('name','donate_amount');
                    }
                });
            }
        });

        $('input:radio[name=donate_amount]').click(function() {
            $('#donate_amount').removeAttr('name')
        });

    });
</script>
@endsection
@endsection