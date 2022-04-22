@extends('layouts.app')

@section('page-styles')
@endsection

@section('content')
@include('layouts.header')
<!-- Page Title -->
<section class="page-title">
    <div class="auto-container">
        <div class="content-box">
            <h1>Categories</h1>
            <ul class="bread-crumb">
                <li><a class="home" href="{{ route('home') }}"><span class="fa fa-home"></span></a></li>
                <li>Categories</li>
            </ul>
        </div>
    </div>
</section>

<!-- Causes Section Four -->
<section class="feature-section">
    <div class="auto-container">
        <div class="sec-title text-center">
        </div>
        <div class="row">
            <!-- Feature Block Two -->
            <div class="col-lg-3 col-md-6 feature-block-two">
                <div class="inner-box">
                    <a href="#">
                        <div class="icon-box">
                            <img src="{{ asset('assets/images/icons/healthcare-2.png')}}" alt="">
                        </div>
                        <h4>Medical</h4>
                    </a>
                </div>
            </div>
            <!-- Feature Block Two -->
            <div class="col-lg-3 col-md-6 feature-block-two">
                <div class="inner-box">
                    <a href="#">
                        <div class="icon-box">
                            <img src="{{ asset('assets/images/icons/team-2.png')}}" alt="">
                        </div>
                        <h4>Business</h4>
                    </a>
                </div>
            </div>
            <!-- Feature Block Two -->
            <div class="col-lg-3 col-md-6 feature-block-two">
                <div class="inner-box">
                    <a href="#">
                        <div class="icon-box">
                            <img src="{{ asset('assets/images/icons/foster-family-2.png')}}" alt="">
                        </div>
                        <h4>Family</h4>
                    </a>
                </div>
            </div>
            <!-- Feature Block Two -->
            <div class="col-lg-3 col-md-6 feature-block-two">
                <div class="inner-box">
                    <a href="#">
                        <div class="icon-box">
                            <img src="{{ asset('assets/images/icons/community-2.png')}}" alt="">
                        </div>
                        <h4>Community</h4>
                    </a>
                </div>
            </div>
            <!-- Feature Block Two -->
            <div class="col-lg-3 col-md-6 feature-block-two">
                <div class="inner-box">
                    <a href="#">
                        <div class="icon-box">
                            <img src="{{ asset('assets/images/icons/world.png')}}" alt="">
                        </div>
                        <h4>Travel</h4>
                    </a>
                </div>
            </div>
            <!-- Feature Block Two -->
            <div class="col-lg-3 col-md-6 feature-block-two">
                <div class="inner-box">
                    <a href="#">
                        <div class="icon-box">
                            <img src="{{ asset('assets/images/icons/disaster-2.png')}}" alt="">
                        </div>
                        <h4>Disaster</h4>
                    </a>
                </div>
            </div>
            <!-- Feature Block Two -->
            <div class="col-lg-3 col-md-6 feature-block-two">
                <div class="inner-box">
                    <a href="#">
                        <div class="icon-box">
                            <img src="{{ asset('assets/images/icons/funeral-2.png')}}" alt="">
                        </div>
                        <h4>Funeral</h4>
                    </a>
                </div>
            </div>
            <!-- Feature Block Two -->
            <div class="col-lg-3 col-md-6 feature-block-two">
                <div class="inner-box">
                    <a href="#">
                        <div class="icon-box">
                            <img src="{{ asset('assets/images/icons/open-book-2.png')}}" alt="">
                        </div>
                        <h4>Education</h4>
                    </a>
                </div>
            </div>
            <!-- Feature Block Two -->
            <div class="col-lg-3 col-md-6 feature-block-two">
                <div class="inner-box">
                    <a href="#">
                        <div class="icon-box">
                            <img src="{{ asset('assets/images/icons/wedding-couple-2.png')}}" alt="">
                        </div>
                        <h4>Wedding</h4>
                    </a>
                </div>
            </div>
            <!-- Feature Block Two -->
            <div class="col-lg-3 col-md-6 feature-block-two">
                <div class="inner-box">
                    <a href="#">
                        <div class="icon-box">
                            <img src="{{ asset('assets/images/icons/immigrant-2.png')}}" alt="">
                        </div>
                        <h4>Immigration</h4>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 feature-block-two">
                <div class="inner-box">
                    <a href="#">
                        <div class="icon-box">
                            <img src="{{ asset('assets/images/favicon.png')}}" alt="">
                        </div>
                        <h4>Others</h4>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@include('layouts.footer')
@section('page-scripts')
@endsection
@endsection