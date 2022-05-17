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
                    <h4>{{ __('Withdraw Requests')}}</h4>
                </div>
            </div>
        </div>
        <!-- Header end -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-block">
                        <!-- Row start -->
                        @include('flash-message')
                        <div class="row m-b-30">
                            <div class="col-lg-12">
                                <table class="table" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('User')}}</th>
                                            <th>{{ __('Campaign')}}</th>
                                            <th>{{ __('Amount')}}</th>
                                            <th>{{ __('Debit')}}</th>
                                            <th>{{ __('Payment Method')}}</th>
                                            <th>{{ __('Date')}}</th>
                                            <th>{{ __('Requested By')}}</th>
                                            <th>{{ __('Action')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($transactions as $key=>$rows)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $rows->name." ".$rows->lastname }}</td>
                                            <td>@if($rows->camp_id == 0) {{ __('Multiple Campaigns') }} @else<a href="{{ route('campaign.show', $rows->camp_id) }}">{{ $rows->title }}</a>@endif</td>
                                            <td>{{ number_format($rows->amount) }}</td>
                                            <td>{{ number_format($rows->debit) }}</td>
                                            <td>{{ strtoupper($rows->payment_method) }}</td>
                                            <td>{{ date('l, d Y', strtotime($rows->created_at)) }}</td>
                                            <td>{{ strtoupper($rows->done_by) }}</td>
                                            <td class="d-flex">
                                                <form id="accept-form{{$rows->id}}" action="{{ route('withdraw.accept')}}" method="POST" style="margin-right: 5px;">
                                                    @csrf
                                                    <input type="hidden" value="{{$rows->id}}" name="id">
                                                    <button type="submit" class="btn btn-success waves-effect" data-toggle="tooltip" data-placement="top" title="Accept"><i class="ti-check"></i></a>
                                                </form>
                                                <form id="reject-form{{$rows->id}}" action="{{ route('withdraw.reject')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" value="{{$rows->id}}" name="reject_id">
                                                    <button type="submit" class="btn btn-danger waves-effect" data-toggle="tooltip" data-placement="top" title="Reject"><i class="ti-close"></i></a>
                                                </form>
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
                title: "ALL WITHDRAW REQUESTS",
                sheetName: "WITHDRAW REQUESTS",
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
                title: "ALL WITHDRAW REQUESTS",
                className: "btn btn-success mb-0",
            }
        ],
    });
</script>
@endsection
@endsection