    <!-- Main Header--> 
    @php $categories = App\Models\Category::limit(4)->get(); @endphp
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
                                    <li><a href="#">Swahili</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="right-content">
                        <ul class="contact-info">
                            <li><span class="flaticon-mail"></span><a href="mailto:info@nachangia.co.tz">info@nachangia.co.tz</a></li>
                            <li><span class="flaticon-phone"></span><a href="tel:+255788209794">+255 788 209 794</a></li>
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
                                <a href="{{ route('index') }}" class="d-flex"><img src="{{ asset('assets/images/LOGO2.png')}}" alt="" title="">
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
                                            <li class="dropdown"><a href="#">{{ __('Campaigns')}}</a>
                                                <ul>
                                                    <li><a href="{{ route('campaign.all') }}">Featured</a></li>
                                                    <li><a href="{{ route('campaign.latest') }}">Latest</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown"><a href="#">{{ __('Categories')}}</a>
                                                <ul>
                                                    @foreach($categories as $key=>$rows)
                                                    <li><a href="{{ route('category.campaigns', $rows->name) }}">{{$rows->name}}</a></li>
                                                    @endforeach
                                                    <div class="dropdown-divider"></div>
                                                    <li><a href="{{ route('user.category')}}">View All <span class="flaticon-arrow-2"></span></a></li>
                                                </ul>
                                            </li>
                                            <li><a href="{{ route('how')}}">{{ __('How it works')}}</a></li>
                                            @if(Auth::user())
                                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span>{{ __('Sign out')}}</span></a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </li>
                                            @else
                                            <li><a href="{{ route('login') }}">{{ __('Sign in')}}</a></li>
                                            @endif
                                            <!-- <li><a href="{{ route('contact') }}">{{ __('Contact')}}</a></li> -->
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
                                                <form method="post" action="#">
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
                                <a href="{{ route('donee.home') }}" class=""><i class="fa fa-user-circle fa-2x"></i></a>
                            </div>
                            @endif
                            <div class="link-btn">
                                @if(Auth::user())
                                <a href="{{ route('campaign')}}" class="theme-btn btn-style-one"><span>{{ __('Start Campaign')}}</span></a>
                                @else
                                <a href="{{ route('register') }}" class="theme-btn btn-style-one"><span>{{ __('Sign Up')}}</span></a>
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
                            <a href="{{ route('index') }}" class="d-flex"><img src="{{ asset('assets/images/LOGO2.png')}}" alt="" title="">
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
                                            <a href="{{ route('donee.home') }}" class=""><i class="fa fa-user-circle fa-2x"></i></a>
                                        </div>
                                        @endif
                                        <div class="link-btn">
                                            @if(Auth::user())
                                            <a href="{{ route('campaign')}}" class="theme-btn btn-sm btn-style-two"><span>{{ __('Start Campaign')}}</span></a>
                                            @else
                                            <a href="{{ route('register') }}" class="theme-btn btn-sm btn-style-two"><span>{{ __('Sign Up')}}</span></a>
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
                <div class="logo"><a href="{{ route('index') }}"><img src="{{ asset('assets/images/LOGO2.png')}}" alt=""></a></div>
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
                            <a href="{{ route('donee.home') }}" class=""><i class="fa fa-user-circle fa-2x"></i></a>
                        </div>
                        @endif
                        <div class="link-btn">
                            @if(Auth::user())
                            <a href="{{ route('campaign')}}" class="theme-btn btn-sm btn-style-two"><span>{{ __('Start Campaign')}}</span></a>
                            @else
                            <a href="{{ route('register') }}" class="theme-btn btn-sm btn-style-two"><span>{{ __('Sign Up')}}</span></a>
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
                                    <form method="post" action="#">
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