@extends('layouts.app_admin')

@section('page-styles')
@endsection

@section('content')
@include('layouts.admin_header')
<div class="content-wrapper">
    <!-- Container-fluid starts -->
    <div class="container-fluid">

        <!-- Header Starts -->
        <div class="row">
            <div class="col-sm-12 p-0">
                <div class="main-header">
                    <h4>{{ __('Profile')}}</h4>
                </div>
            </div>
        </div>
        <!-- Header end -->
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="user-block-2">
                        <img class="img-fluid" src="{{ asset('admin/assets/images/anonymous.jpg')}}" alt="user-header">
                        <h5>{{ $user->name." ".$user->lastname}}</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-block">
                        <!-- Row start -->
                        <div class="row m-b-30">
                            <div class="col-lg-12">
                                <!-- Nav tabs -->

                                <ul class="nav nav-tabs md-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#home3" role="tab">About Me</a>
                                        <div class="slide"></div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#profile3" role="tab">Edit Profile</a>
                                        <div class="slide"></div>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home3" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-3 col-6 b-r">
                                                <strong>{{ __('First Name')}}</strong>
                                                <br>
                                                <p class="text-muted">{{ Auth::user()->name }}</p>
                                            </div>
                                            <div class="col-md-3 col-6 b-r">
                                                <strong>{{ __('Last Name')}}</strong>
                                                <br>
                                                <p class="text-muted">{{ Auth::user()->lastname }}</p>
                                            </div>
                                            <div class="col-md-3 col-6 b-r">
                                                <strong>{{ __('Mobile')}}</strong>
                                                <br>
                                                <p class="text-muted">{{ Auth::user()->phonenumber }}</p>
                                            </div>
                                            <div class="col-md-3 col-6 b-r">
                                                <strong>{{ __('Email')}}</strong>
                                                <br>
                                                <p class="text-muted">{{ Auth::user()->email }}</p>
                                            </div>
                                        </div>
                                        <div class="row" style="padding-top: 20px;">
                                            <div class="sub-title">Other Details</div>
                                            <div class="col-lg-6" >
                                                <ul>
                                                    <li><strong>Location:</strong> {{ $user->location }}</li>
                                                    <li><strong>District:</strong> {{ $user->district }}</li>
                                                    <li><strong>City:</strong> {{ $user->city }}</li>
                                                    <li><strong>Country:</strong> {{ $user->country }}</li>
                                                    <li><strong>Join Date:</strong> {{ date('l, d Y',strtotime($user->created_at)) }}</li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-6">
                                                <img src="{{ $user->idlink }}" width="200" height="120" alt="ID photo">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="profile3" role="tabpanel">
                                        <p>2.Cras consequat in enim ut efficitur. Nulla posuere elit quis auctor interdum praesent sit amet nulla vel enim amet. Donec convallis tellus neque, et imperdiet felis amet.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Row end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('page-scripts')
@endsection
@endsection