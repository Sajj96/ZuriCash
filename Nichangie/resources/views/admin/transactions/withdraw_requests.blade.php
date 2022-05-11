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
                                            <td>
                                                <a href="{{ route('withdraw.reject')}}" class="btn btn-danger waves-effect" data-toggle="tooltip" data-placement="top" onclick="event.preventDefault(); document.getElementById('reject-form{{$rows->id}}').submit();" title="Reject"><i class="ti-close"></i></a>
                                                <a href="{{ route('withdraw.accept')}}" class="btn btn-success waves-effect" data-toggle="tooltip" data-placement="top" onclick="event.preventDefault(); document.getElementById('accept-form{{$rows->id}}').submit();" title="Accept"><i class="ti-check"></i></a>
                                                <form id="accept-form{{$rows->id}}" action="{{ route('withdraw.accept')}}" method="POST" style="display: none;">
                                                    @csrf
                                                    <input type="hidden" value="{{$rows->id}}" name="id">
                                                </form>
                                                <form id="reject-form{{$rows->id}}" action="{{ route('withdraw.reject')}}" method="POST" style="display: none;">
                                                    @csrf
                                                    <input type="hidden" value="{{$rows->id}}" name="reject_id">
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
    $("#table-1").dataTable();
</script>
@endsection
@endsection