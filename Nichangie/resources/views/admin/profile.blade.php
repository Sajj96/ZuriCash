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
                        <h5>Josephin Villa</h5>
                        <h6>Software Engineer</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-header-text">Details</h5>
                    </div>
                    <div class="card-block">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('page-scripts')
@endsection
@endsection