@extends('layouts.app_admin')

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/js/intl-tel-input/css/intlTelInput.css')}}">
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
                        @include('flash-message')
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
                                            <div class="col-lg-6">
                                                <ul>
                                                    <li><strong>Location:</strong> {{ $user->location }}</li>
                                                    <li><strong>District:</strong> {{ $user->district }}</li>
                                                    <li><strong>City:</strong> {{ $user->city }}</li>
                                                    <li><strong>Join Date:</strong> {{ date('M, d Y',strtotime($user->created_at)) }}</li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-6">
                                                <img src="{{ $user->idlink }}" width="200" height="120" alt="ID photo">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="profile3" role="tabpanel">
                                        <form action="{{ route('profile.edit') }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputfname" class="form-control-label">{{ __('First Name')}}</label>
                                                        <input type="text" class="form-control" name="fname" id="exampleInputfname" value="{{ $user->name }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputlname" class="form-control-label">{{ __('Last Name')}}</label>
                                                        <input type="text" class="form-control" name="lname" id="exampleInputlname" value="{{ $user->lastname }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="phone" class="form-control-label">{{ __('Phone')}}</label>
                                                        <input type="tel" class="form-control" name="phone" id="phone" value="{{ $user->phonenumber }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputemail" class="form-control-label">{{ __('Email')}}</label>
                                                        <input type="tel" class="form-control" name="email" id="exampleInputemail" value="{{ $user->email }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputaddress" class="form-control-label">{{ __('Location')}}</label>
                                                        <input type="text" class="form-control" name="address" id="exampleInputaddress" value="{{ $user->location }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputdistrict" class="form-control-label">{{ __('District')}}</label>
                                                        <input type="text" class="form-control" name="district" id="exampleInputdistrict" value="{{ $user->district }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputcity" class="form-control-label">{{ __('City')}}</label>
                                                        <input type="text" class="form-control" name="city" id="exampleInputcity" value="{{ $user->city }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-30">{{ __('Update')}}</button>
                                        </form>
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
<script src="{{ asset('assets/js/intl-tel-input/js/intlTelInput.min.js')}}"></script>
<script type="text/javascript">
    var utilUrl = "{{ asset('assets/js/intl-tel-input/js/utils.js?1638200991544')}}"
</script>
<script src="{{ asset('assets/js/auth-login.js')}}"></script>
@endsection
@endsection