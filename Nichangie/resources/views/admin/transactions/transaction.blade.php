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
                    <h4>{{ __('Transactions')}}</h4>
                </div>
            </div>
        </div>
        <!-- Header end -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-block">
                        <!-- Row start -->
                        <div class="row m-b-30">
                            <div class="col-lg-12">
                                <table class="table" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('Date')}}</th>
                                            <th>{{ __('Amount')}}</th>
                                            <th>{{ __('Status')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <!-- <div class="label-main"><label class="label label-lg bg-success">Completed</label></div> -->
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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
<script src="{{ asset('admin/assets/plugins/datatables/datatables.min.js')}}"></script>
<script src="{{ asset('admin/assets/plugins/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
<script>
    $("#table-1").dataTable();
</script>
@endsection
@endsection