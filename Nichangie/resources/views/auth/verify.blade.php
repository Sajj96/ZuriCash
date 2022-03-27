@extends('layouts.app')

@section('page-styles')
<link href="{{ asset('assets/css/shop.css')}}" rel="stylesheet">
@endsection

@section('content')
@include('layouts.header')
<!-- Page Title -->
<section class="verify-area">
    <div class="auto-container">
        <div class="row">
            <div class="col-xl-3"></div>
            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 mt-2 card-panel">
                @error('phone')
                <div class="alert alert-danger">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
                <div class="form">
                    <div class="row">
                        <div class="position-relative col-xl-12">
                            <div class="panel p-2">
                                <h4>{{ __('Please enter the 4-digit verification code we sent via SMS:')}}</h4>
                                <span>{{ __('(we want to make sure it\'s you before we proceed)')}}</span>
                                <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2">
                                    <input class="m-2 text-center form-control rounded" type="text" id="first" maxlength="1" />
                                    <input class="m-2 text-center form-control rounded" type="text" id="second" maxlength="1" />
                                    <input class="m-2 text-center form-control rounded" type="text" id="third" maxlength="1" />
                                    <input class="m-2 text-center form-control rounded" type="text" id="fourth" maxlength="1" />
                                </div>
                                <div class="mt-4">
                                    <div class="register-btn">
                                        <button class="theme-btn btn-style-one" type="submit"><span>{{ __('Validate')}}</span></button>
                                    </div>
                                </div>
                                <div class="text-center">
                                    {{ __('Didn\'t receive the code?')}}<br />
                                    <a href="#">{{ __('Send code again')}}</a><br />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3"></div>
        </div>
    </div>
</section>
@section('page-scripts')
<script src="{{ asset('assets/js/jquery.bootstrap-touchspin.js')}}"></script>
<script src="{{ asset('assets/js/verify.js')}}"></script>
@endsection
@endsection