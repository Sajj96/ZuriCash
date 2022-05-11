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
                    <h4>{{ __('Donations')}}</h4>
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
                                            <th>Campaign Title</th>
                                            <th>Donor Name</th>
                                            <th>Amount (TZS)</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
 
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
    $(function () {
    
    var table = $('#table-1').dataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('donation.all') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'story_title', name: 'story_title'},
            {data: 'name', name: 'name'},
            {data: 'amount', name: 'amount'},
            {data: 'created', name: 'created'},
        ],
        order: [[1, 'asc']]
    });

  });
</script>
@endsection
@endsection