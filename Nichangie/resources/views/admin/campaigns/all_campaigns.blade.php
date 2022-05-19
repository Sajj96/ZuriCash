@extends('layouts.app_admin')

@section('page-styles')
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<!-- <style>
div.dt-buttons {
    position: relative;
    margin-bottom: 20px !important;
    float: none !important;
}
</style> -->
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
                                            <th>{{ __('Title')}}</th>
                                            <th>{{ __('Created By')}}</th>
                                            <th>{{ __('Raised')}}</th>
                                            <th>{{ __('Goal')}}</th>
                                            <th>{{ __('Created On')}}</th>
                                            <th>{{ __('Deadline')}}</th>
                                            <th>{{ __('Status')}}</th>
                                            <th>{{ __('Action')}}</th>
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
<script>
    $(function () {
    
    var table = $('#table-1').dataTable({
        dom: 'Bfrtip',
        buttons: [
            { 
                extend: "excelHtml5", 
                text: 'Export to Excel',
                title: "ALL CAMPAIGNS",
                sheetName: "CAMPAIGNS",
                className: "btn btn-info mb-0",
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                },
                customize: function ( xlsx ){
                var sheet = xlsx.xl.worksheets['sheet1.xml'];

                // jQuery selector to add a border
                $('row c[r*="2"]', sheet).attr( 's', '22' );
                }
            },
            { 
                extend: "pdfHtml5", 
                text: 'Download PDF',
                title: "ALL CAMPAIGNS",
                className: "btn btn-success mb-0",
            }
        ],
        processing: true,
        serverSide: true,
        ajax: "{{ route('story') }}",
        columns: [
            {data: 'id', name: 'stories.id'},
            {data: 'title', name: 'stories.title',sortable: true, searchable: true},
            {data: 'name', name: 'users.name',sortable: true, searchable: true},
            {data: 'amount', name: 'donations.amount',sortable: true, searchable: true},
            {data: 'fundgoals', name: 'stories.fundgoals',sortable: true, searchable: true},
            {data: 'created_at', name: 'stories.created_at',sortable: true, searchable: true},
            {data: 'deadline', name: 'stories.deadline',sortable: true, searchable: true},
            {data: 'status', name: 'stories.status',orderable: true, searchable: true},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        order: [[1, 'asc']]
    });
  });
</script>
@endsection
@endsection