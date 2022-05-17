    @extends('layouts.app_admin')

    @section('page-styles')
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/datatables/datatables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
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
                                            @foreach($donations as $key=>$rows)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td><a href="{{ route('campaign.show', $rows->campaign_id) }}">{{ $rows->title }}</a></td>
                                                <td>{{ $rows->name }}</td>
                                                <td>{{ number_format($rows->amount) }}</td>
                                                <td>{{ date('M, d Y', strtotime($rows->created_at)) }}</td>
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
        $("#table-1").dataTable({
            dom: 'Bfrtip',
            buttons: [
                { 
                    extend: "excelHtml5", 
                    text: 'Export to Excel',
                    title: "ALL DONATIONS",
                    sheetName: "DONATIONS",
                    className: "btn btn-info mb-0",
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 4]
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
                    title: "ALL DONATIONS",
                    className: "btn btn-success mb-0",
                }
            ]
        });
    </script>
    @endsection
    @endsection