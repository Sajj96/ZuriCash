@extends('layouts.app_admin')

@section('content')
@include('layouts.admin_header')
<!-- Sidebar chat end-->
<div class="content-wrapper">
    <!-- Container-fluid starts -->
    <!-- Main content starts -->
    <div class="container-fluid">
        <div class="row">
            <div class="main-header">
                <h4>Dashboard</h4>
            </div>
        </div>
        <!-- 4-blocks row start -->
        @if(Auth::user()->user_type == 2)
        <div class="row dashboard-header">
            <div class="col-lg-3 col-md-6">
                <div class="card dashboard-product">
                    <span>Users</span>
                    <h2 class="dashboard-total-products">4500</h2>
                    <span class="label label-warning">Sales</span>Arriving Today
                    <div class="side-box">
                        <i class="ti-signal text-warning-color"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card dashboard-product">
                    <span>Campaigns</span>
                    <h2 class="dashboard-total-products">37,500</h2>
                    <span class="label label-primary">Views</span>View Today
                    <div class="side-box ">
                        <i class="ti-gift text-primary-color"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card dashboard-product">
                    <span>Withdraw Request</span>
                    <h2 class="dashboard-total-products">$<span>30,780</span></h2>
                    <span class="label label-success">Sales</span>Reviews
                    <div class="side-box">
                        <i class="ti-direction-alt text-success-color"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card dashboard-product">
                    <span>Products</span>
                    <h2 class="dashboard-total-products">$<span>30,780</span></h2>
                    <span class="label label-danger">Sales</span>Reviews
                    <div class="side-box">
                        <i class="ti-rocket text-danger-color"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-header-text">Donations</h5>
                    </div>
                    <div class="card-block">
                        <div id="barchart" style="min-width: 250px; height: 330px; margin: 0 auto"></div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="row dashboard-header">
            <div class="col-lg-3 col-md-6">
                <div class="card dashboard-product">
                    <span>Campaigns</span>
                    <h2 class="dashboard-total-products">4500</h2>
                    <span class="label label-warning">Sales</span>Arriving Today
                    <div class="side-box">
                        <i class="ti-signal text-warning-color"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card dashboard-product">
                    <span>Transaction</span>
                    <h2 class="dashboard-total-products">37,500</h2>
                    <span class="label label-primary">Views</span>View Today
                    <div class="side-box ">
                        <i class="ti-gift text-primary-color"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card dashboard-product">
                    <span>Withdraw Request</span>
                    <h2 class="dashboard-total-products">$<span>30,780</span></h2>
                    <span class="label label-success">Sales</span>Reviews
                    <div class="side-box">
                        <i class="ti-direction-alt text-success-color"></i>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- 4-blocks row end -->
    </div>
    <!-- Main content ends -->
    <!-- Container-fluid ends -->
</div>
</div>
@endsection