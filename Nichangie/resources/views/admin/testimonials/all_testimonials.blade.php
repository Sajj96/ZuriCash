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
                    <h4>{{ __('Testimonials')}}</h4>
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
                                            <th>{{ __('Name')}}</th>
                                            <th>{{ __('Title')}}</th>
                                            <th>{{ __('Description')}}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($testimonials as $key=>$rows)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $rows->name }}</td>
                                            <td>{{ $rows->title }}</td>
                                            <td>{{ substr($rows->description,0,40) }}</td>
                                            <td>
                                                <a href="{{ route('testimonial.delete', $rows->id)}}" class="btn btn-danger waves-effect" data-toggle="tooltip" data-placement="top" onclick="event.preventDefault(); document.getElementById('delete-form{{$rows->id}}').submit();" title="Remove"><i class="ti-close"></i></a>
                                                <form id="delete-form{{$rows->id}}" action="{{ route('testimonial.delete')}}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" value="{{$rows->id}}" name="id">
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