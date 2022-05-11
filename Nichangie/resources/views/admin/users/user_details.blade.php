@extends('layouts.app_admin')

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/js/intl-tel-input/css/intlTelInput.css')}}">
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
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
                    <h4>{{ __('User Details')}}</h4>
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
                                        <a class="nav-link active" data-toggle="tab" href="#home3" role="tab">About</a>
                                        <div class="slide"></div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#profile3" role="tab">Campaigns</a>
                                        <div class="slide"></div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#profile4" role="tab">Transactions</a>
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
                                                <p class="text-muted">{{ $user->name }}</p>
                                            </div>
                                            <div class="col-md-3 col-6 b-r">
                                                <strong>{{ __('Last Name')}}</strong>
                                                <br>
                                                <p class="text-muted">{{ $user->lastname }}</p>
                                            </div>
                                            <div class="col-md-3 col-6 b-r">
                                                <strong>{{ __('Mobile')}}</strong>
                                                <br>
                                                <p class="text-muted">{{ $user->phonenumber }}</p>
                                            </div>
                                            <div class="col-md-3 col-6 b-r">
                                                <strong>{{ __('Email')}}</strong>
                                                <br>
                                                <p class="text-muted">{{ $user->email }}</p>
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
                                        <table class="table" id="table-1">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Title</th>
                                                    <th>Story</th>
                                                    <th>Raised</th>
                                                    <th>Goal</th>
                                                    <th>Deadline</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($campaigns as $key=>$rows)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td><a href="{{ route('campaign.show', $rows->id) }}">{{ $rows->title }}</a></td>
                                                    <td>{{ substr($rows->description,0,10) }}...</td>
                                                    <td>{{ number_format($rows->amount) }}</td>
                                                    <td>{{ number_format($rows->fundgoals) }}</td>
                                                    <td>{{ $rows->deadline }}</td>
                                                    <td>
                                                        @if($rows->status == 0)
                                                        <div class="label-main"><label class="label label-lg bg-default">In progress</label></div>
                                                        @elseif($rows->status == 1)
                                                        <div class="label-main"><label class="label label-lg bg-success">Finished</label></div>
                                                        @else
                                                        <div class="label-main"><label class="label label-lg bg-danger">Closed</label></div>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="profile4" role="tabpanel">
                                        <table class="table" id="table-2">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>{{ __('Campaign')}}</th>
                                                    <th>{{ __('Amount')}}</th>
                                                    <th>{{ __('Debit')}}</th>
                                                    <th>{{ __('Payment Method')}}</th>
                                                    <th>{{ __('Date')}}</th>
                                                    <th>{{ __('Status')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($transactions as $key=>$rows)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>@if($rows->camp_id == 0) {{ __('Multiple Campaigns') }} @else<a href="{{ route('campaign.show', $rows->camp_id) }}">{{ $rows->title }}</a>@endif</td>
                                                    <td>{{ number_format($rows->amount) }}</td>
                                                    <td>{{ number_format($rows->debit) }}</td>
                                                    <td>{{ strtoupper($rows->payment_method) }}</td>
                                                    <td>{{ date('l, d Y', strtotime($rows->created_at)) }}</td>
                                                    <td>
                                                        <div class="label-main"><label class="label label-lg bg-default">In Progress</label></div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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
<script src="{{ asset('admin/assets/plugins/datatables/datatables.min.js')}}"></script>
<script src="{{ asset('admin/assets/plugins/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
<script>
    $("#table-1").dataTable();
    $("#table-2").dataTable();
</script>
@endsection
@endsection