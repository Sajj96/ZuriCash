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
                                            <th>Created By</th>
                                            <th>Raised</th>
                                            <th>Goal</th>
                                            <th>Created On</th>
                                            <th>Deadline</th>
                                            <th>Status</th>
                                            <th>Action</th>
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
        ajax: "{{ route('story') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'story_title', name: 'story_title'},
            {data: 'username', name: 'username'},
            {data: 'amount', name: 'amount'},
            {data: 'fundgoals', name: 'fundgoals'},
            {data: 'created', name: 'created'},
            {data: 'enddate', name: 'enddate'},
            {data: 'status', name: 'status',orderable: false, searchable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        order: [[1, 'asc']]
    });
    
    $(document).on('click','.btn-danger', function(){
        var id = $(this).data('class');
        $('.close-form').each(function(){
            var form_id = $(this).data('id');
            if(form_id === id) {
                $(this).submit();
            }
        })
    });

    $(document).on('click','.btn-success', function(){
        var id = $(this).data('class');
        $('.withdraw-form').each(function(){
            var form_id = $(this).data('id');
            if(form_id === id) {
                $(this).submit();
            }
        })
    });
  });
</script>
@endsection
@endsection