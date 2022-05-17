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
                                                @if($rows->status == 0) 
                                                <div class="label-main"><label class="label label-lg bg-default">In progress</label></div>
                                                @elseif($rows->status == 1)
                                                <div class="label-main"><label class="label label-lg bg-success">Finished</label></div>
                                                @else
                                                <div class="label-main"><label class="label label-lg bg-danger">Closed</label></div>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('campaign.close')}}" class="btn btn-danger waves-effect" data-toggle="tooltip" data-placement="top" onclick="event.preventDefault(); document.getElementById('close-form{{$rows->id}}').submit();" title="Close Campaign"><i class="ti-close"></i></a>
                                                <a href="{{ route('transaction.withdraw', Auth::user()->id)}}" class="btn btn-success waves-effect" data-toggle="tooltip" data-placement="top" onclick="event.preventDefault(); document.getElementById('withdraw-form{{$rows->id}}').submit();" title="Request Withdraw"><i class="ti-wallet"></i></a>
                                                <a href="{{ route('campaign.export', $rows->id)}}" class="btn btn-info waves-effect" data-toggle="tooltip" data-placement="top" title="Export Data"><i class="ti-download"></i></a>
                                                <form id="withdraw-form{{$rows->id}}" action="{{ route('transaction.withdraw', Auth::user()->id)}}" method="POST" style="display: none;">
                                                    @csrf
                                                    <input type="text" value="{{$rows->id}}" name="id">
                                                </form>
                                                <form id="close-form{{$rows->id}}" action="{{ route('campaign.close')}}" method="POST" style="display: none;">
                                                    @csrf
                                                    <input type="hidden" value="{{$rows->id}}" name="campaign_id">
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
    $("#table-1").dataTable({
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
    });
</script>
@endsection
@endsection