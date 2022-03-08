@extends('layouts.app')

@section('page-styles')
<link href="{{ asset('assets/css/shop.css')}}" rel="stylesheet">
@endsection

@section('content')
@include('layouts.header')
<!-- Page Title -->
<section class="page-title" style="background-image:url(images/background/bg-13.jpg)">
    <div class="auto-container">
        <div class="content-box">
            <h1>My Account</h1>
            <ul class="bread-crumb">
                <li><a class="home" href="index-2.html"><span class="fa fa-home"></span></a></li>
                <li>Login</li>
            </ul>
        </div>
    </div>
</section>
<section class="login-register-area">
    <div class="auto-container">
        <div class="row">
            <div class="col-md-12">
                <div class="exisitng-customer">
                    <h5>{{ __('Don\'t have account?')}}<a href="{{ route('register.donee') }}">Register as a Donee </a> <a href="{{ route('register.doner') }}">Register as a Doner</a></h5>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3"></div>
            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 mt-2">
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
                <div class="form">
                    <div class="shop-page-title">
                        <div class="title">Login </div>
                    </div>
                    <div class="row">
                        <form method="post" action="{{ route('login') }}">
                            @csrf
                            <div class="col-xl-12">
                                <div class="input-field">
                                    <input type="email" name="email" placeholder="Enter Mail id *">
                                    <div class="icon-holder">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="input-field">
                                    <input type="password" name="password" placeholder="Enter Password">
                                    <div class="icon-holder">
                                        <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-sm-12">
                                        <button class="theme-btn btn-style-one" type="submit"><span>Login</span></button>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-sm-12">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-3"></div>
        </div>
    </div>
</section>
@include('layouts.footer')
@section('page-scripts')
<script src="{{ asset('assets/js/jquery.bootstrap-touchspin.js')}}"></script>
@endsection
@endsection