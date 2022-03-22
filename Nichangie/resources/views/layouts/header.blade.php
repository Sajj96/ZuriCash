    <!-- Main Header-->
    <header class="main-header">
        <!-- Top bar -->
        <div class="top-bar theme-bg">
            <div class="auto-container">
                <div class="wrapper-box">
                    <div class="left-content">
                        <div class="language-switcher">
                            <div class="languages">
                                <span class="current" title="English">En</span>
                                <span class="hover">English</span>
                                <ul>
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">Hindi</a></li>
                                    <li><a href="#">Tamil</a></li>
                                    <li><a href="#">Kannada</a></li>
                                    <li><a href="#">Gujarathi</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="text">We only have what we give... <a href="#" class="donate-box-btn">Donate Now.</a></div>
                    </div>
                    <div class="right-content">
                        <ul class="contact-info">
                            <li><span class="flaticon-mail"></span><a href="mailto:support@charity.com">support@charity.com</a></li>
                            <li><span class="flaticon-phone"></span><a href="tel:+211456789">+211 456 789</a></li>
                        </ul>
                        <ul class="social-icon-one">
                            <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                            <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                            <li><a href="#"><span class="fa fa-skype"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Header Upper -->
        <div class="header-upper">
            <div class="auto-container">
                <div class="wrapper-box">
                    <div class="logo-column">
                        <div class="logo-box">
                            <div class="logo">
                                <a href="{{ route('home') }}" class="d-flex"><img src="{{ asset('assets/images/logo-10.jpeg')}}" alt="" title="">
                                    <h5 class="mt-3 ml-2"><strong>{{ __('NACHANGIA')}}</strong></h5>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="right-column">
                        <div class="option-wrapper">
                            <div class="nav-outer">

                                <!-- Main Menu -->
                                <nav class="main-menu navbar-expand-xl navbar-dark">

                                    <div class="collapse navbar-collapse">
                                        <ul class="navigation">
                                            <li class="dropdown"><a href="#">{{ __('Discover')}}</a>
                                                <ul>
                                                    <li><a href="about.html">About Us</a></li>
                                                    <li><a href="faq.html">FAQ’s</a></li>
                                                    <li><a href="team.html">Meet Our Team</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown"><a href="#">{{ __('Fudraising For')}}</a>
                                                <ul>
                                                    <li><a href="causes-1.html">Style 01 - Grid View</a></li>
                                                    <li><a href="causes-2.html">Style 02 - List View</a></li>
                                                    <li><a href="causes-3.html">Style 01 - Carousel</a></li>
                                                    <li><a href="cause-details.html">Single Cause</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown"><a href="#">{{ __('How it works')}}</a>
                                                <ul>
                                                    <li><a href="events-1.html">Events</a></li>
                                                    <li><a href="event-details.html">Single Event</a></li>
                                                </ul>
                                            </li>
                                            @if(Auth::user())
                                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span>{{ __('Sign out')}}</span></a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </li>
                                            @else
                                            <li><a href="{{ route('login') }}">{{ __('Sign in')}}</a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </nav><!-- Main Menu End-->
                            </div>
                            <!--Search Box-->
                            <div class="search-box-outer">
                                <div class="dropdown">
                                    <button class="search-box-btn dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-search"></span></button>
                                    <ul class="dropdown-menu pull-right search-panel" aria-labelledby="dropdownMenu3">
                                        <li class="panel-outer">
                                            <div class="form-container">
                                                <form method="post" action="http://steelthemes.com/demo/html/Goodsoul_html/blog.html">
                                                    <div class="form-group">
                                                        <input type="search" name="field-name" value="" placeholder="Search...." required="">
                                                        <button type="submit" class="search-btn"><span class="fa fa-search"></span></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @if(Auth::user())
                            <div class="navbar-btn-wrap">
                                <a href="#" class=""><i class="flaticon-user"></i><span>{{ __(' My Profile')}}</span></a>
                            </div>
                            @endif
                            <div class="link-btn">
                                @if(Auth::user())
                                <a href="{{ route('cause')}}" class="theme-btn btn-style-one"><span>{{ __('Create Cause')}}</span></a>
                                @else
                                <a href="{{ route('register') }}" class="theme-btn btn-style-one"><span>{{ __('Nichangie')}}</span></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Header Upper-->

        <!--End Header Upper-->
        <div class="sticky-header">
            <div class="auto-container">
                <div class="wrapper-box">
                    <div class="logo-column">
                        <div class="logo-box">
                            <a href="{{ route('home') }}" class="d-flex"><img src="{{ asset('assets/images/logo-10.jpeg')}}" alt="" title="">
                                <h5 class="mt-3 ml-2"><strong>{{ __('NACHANGIA')}}</strong></h5>
                            </a>
                        </div>
                    </div>
                    <div class="menu-column">
                        <div class="nav-outer">

                            <div class="nav-inner">

                                <!-- Main Menu -->
                                <nav class="main-menu navbar-expand-xl navbar-dark">

                                    <div class="collapse navbar-collapse">
                                        <ul class="navigation">
                                        </ul>
                                        @if(Auth::user())
                                        <div class="navbar-btn-wrap mr-2">
                                            <a href="#" class=""><i class="flaticon-user"></i><span>{{ __(' My Profile')}}</span></a>
                                        </div>
                                        @endif
                                        <div class="link-btn">
                                            @if(Auth::user())
                                            <a href="{{ route('cause')}}" class="theme-btn btn-sm btn-style-two"><span>{{ __('Create Cause')}}</span></a>
                                            @else
                                            <a href="{{ route('register') }}" class="theme-btn btn-sm btn-style-two"><span>{{ __('Nichangie')}}</span></a>
                                            @endif
                                        </div>
                                    </div>
                                </nav><!-- Main Menu End-->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Menu  -->
        <div class="mobile-menu style-one">
            <div class="menu-box">
                <div class="logo"><a href="{{ route('home') }}"><img src="{{ asset('assets/images/logo-10.jpeg')}}" alt=""><strong class="ml-1">{{ __('NACHANGIA')}}</strong></a></div>
                <!-- Main Menu -->
                <nav class="main-menu navbar-expand-xl navbar-dark">
                    <div class="navbar-header">
                        <!-- Toggle Button -->
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="flaticon-menu"></span>
                        </button>
                    </div>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navigation">

                        </ul>
                        @if(Auth::user())
                        <div class="navbar-btn-wrap mr-2">
                            <a href="#" class=""><i class="flaticon-user"></i><span>{{ __(' My Profile')}}</span></a>
                        </div>
                        @endif
                        <div class="link-btn">
                            @if(Auth::user())
                            <a href="{{ route('cause')}}" class="theme-btn btn-sm btn-style-two"><span>{{ __('Create Cause')}}</span></a>
                            @else
                            <a href="{{ route('register') }}" class="theme-btn btn-sm btn-style-two"><span>{{ __('Nichangie')}}</span></a>
                            @endif
                        </div>
                    </div>
                </nav>
                <!-- Main Menu End-->
                <!--Search Box-->
                <div class="search-box-outer">
                    <div class="dropdown">
                        <button class="search-box-btn dropdown-toggle" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-search"></span></button>
                        <ul class="dropdown-menu pull-right search-panel" aria-labelledby="dropdownMenu4">
                            <li class="panel-outer">
                                <div class="form-container">
                                    <form method="post" action="http://steelthemes.com/demo/html/Goodsoul_html/blog.html">
                                        <div class="form-group">
                                            <input type="search" name="field-name" value="" placeholder="Search...." required="">
                                            <button type="submit" class="search-btn"><span class="fa fa-search"></span></button>
                                        </div>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <!-- End Mobile Menu -->

        <div class="nav-overlay">
            <div class="cursor"></div>
            <div class="cursor-follower"></div>
        </div>
    </header>
    <!-- End Main Header -->