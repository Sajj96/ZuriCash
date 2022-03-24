@extends('layouts.app')

@section('page-styles')
@endsection

@section('content')
@include('layouts.header')
<!-- Page Title -->
<section class="page-title" style="background-image:url(images/background/bg-13.jpg)">
    <div class="auto-container">
        <div class="content-box">
            <h1>{{ $cause->title }}</h1>
        </div>
    </div>
</section>

<!-- Cause Info -->
<div class="cause-info">
    <div class="auto-container">
        <div class="wrapper-box">
            <div class="raised"><span>Raised:</span> <br>$92000</div>
            <div class="goal"><span>Goal:</span> <br>TZS {{ $cause->amount }}</div>
            <div class="progress-block">
                <div class="inner-box">
                    <div class="graph-outer">
                        <input type="text" class="dial" data-fgColor="#ed6221" data-bgColor="#f0edea" data-width="70" data-height="70" data-linecap="normal" value="60">
                        <div class="inner-text count-box"><span class="count-text" data-stop="60" data-speed="2000"></span>%</div>
                    </div>
                </div>
            </div>
            <div class="donars"><span>Donars</span> <br>148</div>
            <div class="days-left"><span>Days Left</span> <br>26</div>
        </div>
    </div>
</div>

<!-- Causes Details -->
<div class="sidebar-page-container cause-details">
    <div class="auto-container">
        <div class="row">
            <div class="col-lg-8 content-column">
                <div class="image mb-50"><img src="{{ asset('storage/images/'.$cause->media)}}" alt=""></div>
                <div class="sec-title mb-40">
                    <h1>The Story</h1>
                    <div class="text">{{ $cause->description }}.</div>
                </div>
                <h4>What we want to do bolanile imogene in this cause?</h4>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list">
                            <li><span class="flaticon-next"></span>Sponsor meals for 50 children for 1 full year</li>
                            <li><span class="flaticon-next"></span>Sponsor mid-day meals for one month</li>
                            <li><span class="flaticon-next"></span>You can donate clothes, blankets and ect...</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list">
                            <li><span class="flaticon-next"></span>You can donate food material like rice, veggies</li>
                            <li><span class="flaticon-next"></span>Join as a volunteers to help poor people</li>
                        </ul>
                    </div>
                </div>
                <br>
                <div class="sec-title">
                        <h1>Recent donars</h1>                        
                    </div>
                    <div class="recent-donars">
                        <div class="wrapper-box">
                            <div class="donor-thumb">
                                <div class="image"><img src="{{ asset('assets/images/resource/donor-6.jpg')}}" alt=""></div>
                                <div class="content">
                                    <div class="text">Piyush Gabriel <br> Donated: TZS 250</div>
                                </div>                        
                                <span class="point"></span>
                            </div>
                            <div class="donor-thumb">
                                <div class="image"><img src="{{ asset('assets/images/resource/donor-7.jpg')}}" alt=""></div>
                                <div class="content">
                                    <div class="text">Piyush Gabriel <br> Donated: TZS 250</div>
                                </div>                        
                                <span class="point"></span>
                            </div>
                            <div class="donor-thumb">
                                <div class="image"><img src="{{ asset('assets/images/resource/donor-8.jpg')}}" alt=""></div>
                                <div class="content">
                                    <div class="text">Piyush Gabriel <br> Donated: TZS 250</div>
                                </div>                        
                                <span class="point"></span>
                            </div>
                            <div class="donor-thumb">
                                <div class="image"><img src="{{ asset('assets/images/resource/donor-9.jpg')}}" alt=""></div>
                                <div class="content">
                                    <div class="text">Piyush Gabriel <br> Donated: TZS 250</div>
                                </div>                        
                                <span class="point"></span>
                            </div>
                            <div class="donor-thumb">
                                <div class="image"><img src="{{ asset('assets/images/resource/donor-10.jpg')}}" alt=""></div>
                                <div class="content">
                                    <div class="text">Piyush Gabriel <br> Donated: TZS 250</div>
                                </div>                        
                                <span class="point"></span>
                            </div>
                            <div class="donor-thumb">
                                <div class="image"><img src="{{ asset('assets/images/resource/donor-11.jpg')}}" alt=""></div>
                                <div class="content">
                                    <div class="text">Piyush Gabriel <br> Donated: TZS 250</div>
                                </div>                        
                                <span class="point"></span>
                            </div>
                            <div class="donor-thumb">
                                <div class="image"><img src="{{ asset('assets/images/resource/donor-12.jpg')}}" alt=""></div>
                                <div class="content">
                                    <div class="text">Piyush Gabriel <br> Donated: TZS 250</div>
                                </div>                        
                                <span class="point"></span>
                            </div>
                            <div class="donor-thumb">
                                <div class="image"><img src="{{ asset('assets/images/resource/donor-13.jpg')}}" alt=""></div>
                                <div class="content">
                                    <div class="text">Piyush Gabriel <br> Donated: TZS 250</div>
                                </div>                        
                                <span class="point"></span>
                            </div>
                        </div>
                    </div>
                <div class="share-post">
                    <div class="text"><i class="flaticon-share"></i>Share with friends</div>
                    <ul class="social-icon-seven">
                        <li><a href="#" class="facebook"><span class="fa fa-facebook"></span>Facebook</a></li>
                        <li><a href="#" class="twitter"><span class="fa fa-twitter"></span>Twitter</a></li>
                        <li><a href="#" class="pinterest"><span class="fa fa-pinterest"></span>Pinterest</a></li>
                    </ul>
                </div>
                <div class="donate-form-area">
                    <div class="donate-form-wrapper">
                        <div class="sec-title">
                            <h1>Donate us to achive our goal</h1>
                            <div class="text">Beguiled and demoralized by the charms of pleasure of the moment, so by desire, <br>that they cannot foresee.</div>
                        </div>

                        <form action="#" class="donate-form default-form" method="post">
                            <ul class="chicklet-list clearfix">
                                <li>
                                    <input type="radio" id="donate-amount-1" value="1000" name="donate_amount" />
                                    <label for="donate-amount-1" data-amount="10">TZS 1000</label>
                                </li>
                                <li>
                                    <input type="radio" id="donate-amount-2" value="2000" name="donate_amount" checked="checked" />
                                    <label for="donate-amount-2" data-amount="20">TZS 2000</label>
                                </li>
                                <li>
                                    <input type="radio" id="donate-amount-3" value="5000" name="donate_amount" />
                                    <label for="donate-amount-3" data-amount="50">TZS 5000</label>
                                </li>
                                <li>
                                    <input type="radio" id="donate-amount-4" value="10000" name="donate_amount" />
                                    <label for="donate-amount-4" data-amount="100">TZS 10000</label>
                                </li>
                                <li class="other-amount">
                                    <div class="input-container" data-message="Every dollar you donate helps end hunger."><input type="text" id="donate_amount" placeholder="Other Amount" />
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
                                            <select class="filters-selec form-controlt selectmenu" name="form_subject">
                                                <option value="">Payment Via</option>
                                                <option value="mpesa">Mpesa</option>
                                                <option value="tigopesa">Tigo Pesa</option>
                                                <option value="airtelmoney">Airtel Money</option>
                                                <option value="halopesa">Halo Pesa</option>
                                                <option value="bank">Bank Transfer</option>
                                                <option value="card">Card</option>
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
            </div>
            <div class="col-lg-4">
                <div class="sidebar">
                    <!-- Search Widget -->
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
                    <div class="sidebar-title">
                        <h4>Subscribe Us</h4>
                    </div>
                    <div class="sidebar-widget newsletter-widget-three">
                        <div class="inner-content">
                            <div class="text">Subscribe us and get latest news and <br>upcoming events.</div>
                            <form action="#">
                                <input type="email" placeholder="Email Address...">
                                <button class="theme-btn btn-style-two text-center"><span>Subscribe Us</span></button>
                            </form>
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
@endsection
@endsection