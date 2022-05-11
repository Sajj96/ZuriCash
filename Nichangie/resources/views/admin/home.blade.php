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
                <h4>Dashboard:</h4>
                <span>Welcome, {{ Auth::user()->name; }}</span>
            </div>
        </div>
        <!-- 4-blocks row start -->
        @if(Auth::user()->user_type == 2)
        <div class="row dashboard-header">
            <div class="col-lg-3 col-md-6">
                <div class="card dashboard-product">
                    <span>Users</span>
                    <h2 class="dashboard-total-products">{{ $num_users }}</h2>
                    Active 
                    <div class="side-box">
                        <i class="ti-user text-warning-color"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card dashboard-product">
                    <span>All Campaigns</span>
                    <h2 class="dashboard-total-products">{{ $num_campaigns }}</h2>
                    In progress
                    <div class="side-box ">
                        <i class="ti-announcement text-primary-color"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card dashboard-product">
                    <span>Featured Campaigns</span>
                    <h2 class="dashboard-total-products">{{ $num_campaigns }}</h2>
                    In progress
                    <div class="side-box">
                        <i class="ti-crown text-danger-color"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card dashboard-product">
                    <span>Withdraw Request</span>
                    <h2 class="dashboard-total-products">{{ $num_trans }}</h2>
                    Pending withdrawals
                    <div class="side-box">
                        <i class="ti-credit-card text-success-color"></i>
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
                    <h2 class="dashboard-total-products">{{ $user_campaings }}</h2>
                    In progress
                    <div class="side-box">
                        <i class="ti-announcement text-warning-color"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card dashboard-product">
                    <span>Raised</span>
                    <h2 class="dashboard-total-products">TZS {{ number_format($total_donations) }}</h2>
                    All Campaigns
                    <div class="side-box ">
                        <i class="ti-stats-up text-primary-color"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                  <div class="card dashboard-product">
                     <span>Withdrawn</span>
                     <h2 class="dashboard-total-products">TZS <span>{{ number_format($withdrawn) }}</span></h2>
                     From All Campaigns
                     <div class="side-box">
                        <i class="ti-stats-down text-success-color"></i>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6">
                  <div class="card dashboard-product">
                     <span>Balance</span>
                     <h2 class="dashboard-total-products">TZS <span>{{ number_format($balance) }}</span></h2>
                     Current
                     <div class="side-box">
                        <i class="ti-credit-card text-danger-color"></i>
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