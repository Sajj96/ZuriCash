@extends('layouts.app')

@section('general-css')
<link rel="stylesheet" href="{{ asset('assets/bundles/intl-tel-input/css/intlTelInput.css')}}">
@endsection

@section('content')
<section class="section">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-md-10 offset-md-1 col-lg-10 offset-lg-1">
                <div class="card card-warning">
                    <div class="row m-0">
                        <div class="col-12 col-md-12 col-lg-5 p-0">
                            <div class="card-body text-center">
                                <img alt="image" src="{{ asset('assets/img/logo4.jpeg')}}" width="300" class="header-logo mx-auto" />
                                <h5><i>Earn with Us</i></h5>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-7 p-0" style="background-color: #f6f6f6;">
                            <div class="">
                                <div class="card-header">
                                    <h4>{{ __('Register') }}</h4>
                                </div>
                                <div class="card-body">
                                    @if(!empty($_GET['ref']))
                                    <div class="alert alert-primary alert-has-icon">
                                        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                                        <div class="alert-body">
                                            You were invited by:
                                            <span class="alert-title"> {{ $_GET['ref'] }}</span>
                                        </div>
                                    </div>
                                    @endif
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-12">
                                                <label for="name">Name</label>
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Full name">
                                                <small class="form-text text-muted">
                                                    Write the full name used when registering your phone number. This detail will be used when making payments.
                                                </small>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-12">
                                                <label for="username">{{ __('Username') }}</label>
                                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" placeholder="Username">
                                                <small class="form-text text-muted">
                                                    Your user must be only one word, can contain letters and numbers, and must not contain
                                                    spaces, special characters, or emoji.
                                                </small>
                                                @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-12">
                                                <label for="email">{{ __('Email') }}</label>
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-12">
                                                <label for="phone" class="d-block">{{ __('Phone number') }}</label>
                                                <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror d-block" name="phone" required autocomplete="phone" style="padding: 10px 0px 10px 50px">
                                                @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                <span id="valid-msg" class="hide">??? Valid</span>
                                                <span id="error-msg" class="hide"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-12">
                                                <label for="password" class="d-block">{{ __('Password') }}</label>
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror pwstrength" data-indicator="pwindicator" name="password" required autocomplete="new-password" placeholder="*********">
                                                <div id="pwindicator" class="pwindicator">
                                                    <div class="bar"></div>
                                                    <div class="label"></div>
                                                </div>
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-12">
                                                <label for="password2" class="d-block">{{ __('Confirm Password') }}</label>
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="*********">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-12">
                                                <label for="package">{{ __('Package') }}</label>
                                                <input id="package" type="text" class="form-control @error('package') is-invalid @enderror" name="package" value="Premium Package" readonly autocomplete="package">
                                            </div>
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-12">
                                                <label for="country">{{ __('Country') }}</label>
                                                <select name="country" id="address-country" class="form-control @error('country') is-invalid @enderror custom-select">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-warning btn-lg btn-block">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="mb-4 text-muted text-center">
                                    Already Registered? <a href="{{ route('login') }}">Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@section('js-libraries')
<script src="{{ asset('assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js')}}"></script>
<script src="{{ asset('assets/bundles/jquery-selectric/jquery.selectric.min.js')}}"></script>
<script src="{{ asset('assets/bundles/intl-tel-input/js/intlTelInput.min.js')}}"></script>
@endsection
@section('page-specific-js')
<script type="text/javascript">
    var utilUrl = "{{ asset('assets/bundles/intl-tel-input/js/utils.js?1638200991544')}}"
</script>
<script src="{{ asset('assets/js/page/auth-register.js')}}"></script>
@endsection
@endsection