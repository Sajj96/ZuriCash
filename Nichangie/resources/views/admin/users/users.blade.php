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
                    <h4>{{ __('Users')}}</h4>
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
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Phone Number</th>
                                            <th>Location</th>
                                            <th>Joined On</th>
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
        dom: 'Blfrtip',
        buttons: [
            { 
                extend: "excelHtml5", 
                text: 'Export to Excel',
                title: "ALL USERS",
                sheetName: "USERS",
                className: "btn btn-info mb-0",
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                },
                customize: function ( xlsx ){
                var sheet = xlsx.xl.worksheets['sheet1.xml'];

                // jQuery selector to add a border
                $('row c[r*="2"]', sheet).attr( 's', '22' );
                }
            }
        ],
        processing: true,
        serverSide: true,
        ajax: "{{ route('user') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'lastname', name: 'lastname'},
            {data: 'phonenumber', name: 'phonenumber'},
            {data: 'location', name: 'location'},
            {data: 'created_at', name: 'created_at'},
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
  });
</script>
@endsection
@endsection