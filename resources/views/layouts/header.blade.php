@php use Carbon\Carbon; 
$date = date('d/m/Y');
$day = Carbon::createFromFormat('d/m/Y', $date)->format('l');
@endphp
<div class="main-wrapper main-wrapper-1">
    <div class="navbar-bg"></div>
    <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
            <ul class="navbar-nav mr-3">
                <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            </ul>
        </div>
        <ul class="navbar-nav navbar-right">
            <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <i data-feather="user"></i> <span class="d-sm-none d-lg-inline-block"></span></a>
                <div class="dropdown-menu dropdown-menu-right pullDown">
                    <div class="dropdown-title">Hello {{ Auth::user()->username }}</div>
                    <a href="{{ route('profile')}}" class="dropdown-item has-icon"> <i class="far fa-user"></i> {{ __('Profile') }} </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </nav>
    <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
                <a href="index.html"> <img alt="image" src="{{ asset('assets/img/logo4.jpeg')}}" class="header-logo" />
                    <!-- <span class="logo-name"><span class="first-part">DEL</span><span class="second-part">ASKA</span></span> -->
                </a>
            </div>
            <ul class="sidebar-menu">
                <li class="menu-header">Main</li>
                <li class="dropdown">
                    <a href="{{ route('home')}}" class="nav-link"><i data-feather="monitor"></i><span>{{ __('Dashboard') }}</span></a>
                </li>
                <li class="dropdown">
                    <a href="{{ route('referral')}}" class="nav-link"><i data-feather="link"></i><span>{{ __('Invite a Friend')}}</span></a>
                </li>
                @if(Auth::user()->user_type == 1)
                <li class="dropdown">
                    <a href="{{ route('users')}}" class="nav-link"><i data-feather="users"></i><span>{{ __('Users')}}</span></a>
                </li>
                <li class="dropdown">
                    <a href="{{ route('transaction')}}" class="nav-link"><i data-feather="credit-card"></i><span>{{ __('Transactions')}}</span></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="help-circle"></i><span>{{ __('Trivia Questions')}}</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('question.list')}}">{{ __('Questions')}}</a></li>
                        <li><a class="nav-link" href="{{ route('question.participants')}}">{{ __('Participants')}}</a></li>
                        <li><a class="nav-link" href="{{ route('question.show')}}">{{ __('Create Question')}}</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="message-circle"></i><span>{{ __('WhatsApp Status')}}</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('whatsapp')}}">{{ __('View Status')}}</a></li>
                        <li><a class="nav-link" href="{{ route('whatsapp.list')}}">{{ __('Status List')}}</a></li>
                        <li><a class="nav-link" href="{{ route('screenshot.list')}}">{{ __('Screenshots')}}</a></li>
                        <li><a class="nav-link" href="{{ route('whatsapp.show')}}">{{ __('Add Status')}}</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="video"></i><span>{{ __('Video')}}</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('video.list')}}">{{ __('Manage Videos')}}</a></li>
                        <li><a class="nav-link" href="{{ route('video')}}">{{ __('Play list')}}</a></li>
                        <li><a class="nav-link" href="{{ route('video.show')}}">{{ __('Upload Video')}}</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="dollar-sign"></i><span>{{ __('Crypto Currency Lessons')}}</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('crypto')}}">{{ __('All Lessons')}}</a></li>
                        <li><a class="nav-link" href="{{ route('crypto.list')}}">{{ __('Manage Lessons')}}</a></li>
                        <li><a class="nav-link" href="{{ route('crypto.show')}}">{{ __('Add Lesson')}}</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="book-open"></i><span>{{ __('Enterpreneur Lessons')}}</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('education')}}">{{ __('All Lessons')}}</a></li>
                        <li><a class="nav-link" href="{{ route('education.list')}}">{{ __('Manage Lessons')}}</a></li>
                        <li><a class="nav-link" href="{{ route('education.show')}}">{{ __('Add Lesson')}}</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="thumbs-up"></i><span>{{ __('Ads Click')}}</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('advert')}}">{{ __('Adverts')}}</a></li>
                        <li><a class="nav-link" href="{{ route('advert.list')}}">{{ __('Manage ADs')}}</a></li>
                        <li><a class="nav-link" href="{{ route('advert.show')}}">{{ __('Add Advert')}}</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="bell"></i><span>{{ __('Notification')}}</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('notify')}}">{{ __('Notifications List')}}</a></li>
                        <li><a class="nav-link" href="{{ route('notify.show')}}">{{ __('Send Notification')}}</a></li>
                    </ul>
                </li>
                @else
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="users"></i><span>{{ __('My Team')}}</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('team.level1')}}">{{ __('Level One')}}</a></li>
                        <li><a class="nav-link" href="{{ route('team.level2')}}">{{ __('Level Two')}}</a></li>
                        <li><a class="nav-link" href="{{ route('team.level3')}}">{{ __('Level Three')}}</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="{{ route('pay_for_downline')}}" class="nav-link"><i data-feather="check-square"></i><span>{{ __('Pay For Client')}}</span></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="credit-card"></i><span>{{ __('Withdrawal')}}</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('history')}}">{{ __('History')}}</a></li>
                        <li><a class="nav-link" href="{{ route('withdraw')}}">{{ __('Withdraw')}}</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="{{ route('crypto')}}" class="nav-link"><i data-feather="dollar-sign"></i><span>{{ __('Crypto Currency Lessons')}}</span></a>
                </li>
                <li class="dropdown">
                    <a href="{{ route('education')}}" class="nav-link"><i data-feather="book-open"></i><span>{{ __('Enterpreneur Lessons')}}</span></a>
                </li>
                <li class="dropdown">
                    <a href="{{ route('advert')}}" class="nav-link"><i data-feather="thumbs-up"></i><span>{{ __('Ads Click')}}</span></a>
                </li>
                <li class="dropdown">
                    <a href="{{ route('questions')}}" class="nav-link"><i data-feather="help-circle"></i><span>{{ __('Trivia Questions')}}</span></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="message-circle"></i><span>{{ __('WhatsApp Status')}}</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('whatsapp')}}">{{ __('View Status')}}</a></li>
                        <li><a class="nav-link" href="{{ route('screenshot.list')}}">{{ __('Screenshots')}}</a></li>
                        @if($day == "Friday")
                        <li><a class="nav-link" href="{{ route('screenshot')}}">{{ __('Upload Screenshot')}}</a></li>
                        @endif
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="{{ route('video')}}" class="nav-link"><i data-feather="video"></i><span>{{ __('Video')}}</span></a>
                </li>
                @endif
                <!-- <li class="dropdown">
                    <a href="#" class="nav-link"><i data-feather="meh"></i><span>{{ __('Meme Creation')}}</span></a>
                </li> -->
            </ul>
        </aside>
    </div>