@extends('layouts.app')

@section('page-styles')
<link href="{{ asset('assets/css/shop.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/js/intl-tel-input/css/intlTelInput.css')}}">
@endsection

@section('content')
@include('layouts.header')
<!-- Page Title -->
<section class="page-title">
    <div class="auto-container">
        <div class="content-box">
            <h1>Register</h1>
            <ul class="bread-crumb">
                <li><a class="home" href="index-2.html"><span class="fa fa-home"></span></a></li>
                <li>Register as a donee</li>
            </ul>
        </div>
    </div>
</section>
<section class="checkout-area">
    <div class="auto-container">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="exisitng-customer">
                    <h5>{{ __('Have an account? Please')}}<a href="{{ route('login.form') }}">Login </a></h5>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="form billing-info">
                    <form method="post" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="field-label">First Name*</div>
                                <div class="field-input">
                                    <input type="text" class="@error('firstname') is-invalid @enderror" name="firstname" placeholder="Enter first name" autofocus>
                                </div>
                                @error('firstname')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="field-label">Last Name *</div>
                                <div class="field-input">
                                    <input type="text" name="lastname" placeholder="Enter last name">
                                    <input type="hidden" name="user_type" value="1">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="field-label">Address *</div>
                                <div class="field-input">
                                    <input type="text" name="address" placeholder="Enter Address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="field-label">Town / City *</div>
                                <div class="field-input">
                                    <input type="text" name="town_city" placeholder="Enter Town / City">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="field-label">Phone *</div>
                                <div class="field-input">
                                    <input id="phone" type="tel" name="phone" placeholder="Phone Number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="field-label">Password *</div>
                                <div class="field-input">
                                    <input id="password-confirm" type="password" name="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="field-label">Confirm Password *</div>
                                <div class="field-input">
                                    <input id="password-confirm" type="password" name="password_confirmation" placeholder="Confirm Password">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="register-btn">
                                <button class="theme-btn btn-style-one" type="submit"><span>Register</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@include('layouts.footer')
@section('page-scripts')
<script src="{{ asset('assets/js/jquery.bootstrap-touchspin.js')}}"></script>
<script src="{{ asset('assets/js/intl-tel-input/js/intlTelInput.min.js')}}"></script>
<script type="text/javascript">
    var utilUrl = "{{ asset('assets/js/intl-tel-input/js/utils.js?1638200991544')}}"
</script>
<script src="{{ asset('assets/js/auth-register.js')}}"></script>
@endsection
@endsection