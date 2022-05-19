@extends('layouts.app')

@section('page-styles')
@endsection

@section('content')
@include('layouts.header')
<!-- Page Title -->
<section class="page-title">
    <div class="auto-container">
        <div class="content-box">
            <h1>{{ __('Get In Touch With Us')}}</h1>
            <ul class="bread-crumb">
                <li><a class="home" href="{{ route('home') }}"><span class="fa fa-home"></span></a></li>
                <li>{{ __('Contact')}}</li>
            </ul>
        </div>
    </div>
</section>

<!-- Contact Form -->
<section class="contact-form-section">
    <div class="auto-container">
        <div class="row">
            <div class="col-lg-8">
                <div class="default-form-area">
                    <div class="sec-title">
                        <h1>Drop a line us</h1>
                    </div>
                    @include('flash-message')
                    <form id="contact-form" name="contact_form" class="contact-form" method="POST" action="{{ route('contact.store') }}">
                        @csrf
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 column">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" value="" placeholder="Name" required="">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 column">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control required email" value="" placeholder="Email" required="">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 column">
                                <div class="form-group">
                                    <input type="text" name="phone" class="form-control" value="" placeholder="Phone" required="">
                                    @if ($errors->has('phone'))
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 column">
                                <div class="form-group">
                                    <input type="text" name="subject" class="form-control" value="" placeholder="Subject" required="">
                                    @if ($errors->has('subject'))
                                        <span class="text-danger">{{ $errors->first('subject') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 column">
                                <div class="form-group">
                                    <textarea name="message" class="form-control textarea required" placeholder="Message...."></textarea>
                                    @if ($errors->has('message'))
                                        <span class="text-danger">{{ $errors->first('message') }}</span>
                                    @endif
                                </div>
                                <div class="form-group flex-box">
                                    <div class="submit-btn">
                                        <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
                                        <button class="theme-btn btn-style-one" type="submit" data-loading-text="Please wait..."><span>Send Message</span></button>
                                    </div>
                                    <span class="hint">*Get answers to common questions through our help center.</span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="contact-info-three">
                    <div class="single-info">
                        <h4>Global HQ</h4>
                        <div class="text">Dar es Salaam, Tanzania.</div>
                    </div>
                    <div class="single-info">
                        <h4>Quick Contact</h4>
                        <div class="wrapper-box">
                            <a href="mailto:info@nachangia.co.tz">info@nachangia.co.tz</a> <br>
                            <a href="tel:+255788209794">+255 788 209 794</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('layouts.footer')
@section('page-scripts')
@endsection
@endsection