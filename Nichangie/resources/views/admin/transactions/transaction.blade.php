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
                                            <th>{{ __('Campaign')}}</th>
                                            @if(Auth::user()->user_type == 2)
                                            <th>{{ __('Created By')}}</th>
                                            @endif
                                            <th>{{ __('Amount')}}</th>
                                            <th>{{ __('Debit')}}</th>
                                            <th>{{ __('Payment Method')}}</th>
                                            <th>{{ __('Date')}}</th>
                                            <th>{{ __('Managed By') }}</th>
                                            <th>{{ __('Status')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($transactions as $key=>$rows)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>@if($rows->camp_id == 0) {{ __('Multiple Campaigns') }} @else<a href="{{ route('campaign.show', $rows->camp_id) }}">{{ $rows->title }}</a>@endif</td>
                                            @if(Auth::user()->user_type == 2)
                                            <td>{{ $rows->name." ".$rows->lastname }}</td>
                                            @endif
                                            <td>{{ number_format($rows->amount) }}</td>
                                            <td>{{ number_format($rows->debit) }}</td>
                                            <td>{{ strtoupper($rows->payment_method) }}</td>
                                            <td>{{ date('l, d Y', strtotime($rows->created_at)) }}</td>
                                            <td>{{ strtoupper($rows->managed_by) }}</td>
                                            <td>
                                                @if($rows->status == "In progress") 
                                                <div class="label-main"><label class="label label-lg bg-default">In progress</label></div>
                                                @elseif($rows->status == "Accepted")
                                                <div class="label-main"><label class="label label-lg bg-success">Accepted</label></div>
                                                @else
                                                <div class="label-main"><label class="label label-lg bg-danger">Rejected</label></div>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
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
    $("#table-1").dataTable({
        dom: 'Bfrtip',
        buttons: [
            { 
                extend: "excelHtml5", 
                text: 'Export to Excel',
                title: "ALL TRANSACTIONS",
                sheetName: "TRANSACTIONS",
                className: "btn btn-info mb-0",
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
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
                title: "ALL TRANSACTIONS",
                className: "btn btn-success mb-0",
            }
        ],
    });
</script>
@endsection
@endsection