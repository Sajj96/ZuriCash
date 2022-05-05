@extends('layouts.app_admin')

@section('page-styles')
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
                    <h4>{{ __('Campaigns')}}</h4>
                </div>
            </div>
        </div>
        <!-- Header end -->
        <div class="row">
            <div class="col-sm-12">
                <!-- Basic Table starts -->
                <div class="card">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-sm-12 table-responsive">
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
                                            <th>Action</th>
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
                                                <div class="label-main"><label class="label label-lg bg-success">Completed</label></div>
                                            </td>
                                            <td>
                                                <a href="{{ route('campaign.show', $rows->id)}}" class="btn btn-danger waves-effect" data-toggle="tooltip" data-placement="top" title="Close Campaign"><i class="ti-close"></i></a>
                                                <a href="{{ route('transaction.withdraw')}}" class="btn btn-success waves-effect" data-toggle="tooltip" data-placement="top" onclick="event.preventDefault(); document.getElementById('withdraw-form{{$rows->id}}').submit();" title="Request Withdraw"><i class="ti-wallet"></i></a>
                                                <a href="{{ route('campaign.export', $rows->id)}}" class="btn btn-info waves-effect" data-toggle="tooltip" data-placement="top" title="Export Data"><i class="ti-download"></i></a>
                                                <form id="withdraw-form{{$rows->id}}" action="{{ route('transaction.withdraw')}}" method="POST" style="display: none;">
                                                    @csrf
                                                    <input type="hidden" value="{{$rows->id}}" name="id">
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Basic Table ends -->
            </div>
        </div>
    </div>
</div>
@section('page-scripts')
<script src="{{ asset('admin/assets/plugins/datatables/datatables.min.js')}}"></script>
<script src="{{ asset('admin/assets/plugins/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
<script>
    $("#table-1").dataTable();
</script>
@endsection
@endsection