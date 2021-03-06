@extends('layouts.app')

@section('general-css')
<link rel="stylesheet" href="{{ asset('assets/bundles/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
@endsection

@section('content')
@include('layouts.header')
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ __('Questions')}}</h4>
                        </div>
                        @include('flash-message')
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>{{ __('Question')}}</th>
                                            <th>{{ __('Answer')}}</th>
                                            <th>{{ __('Options')}}</th>
                                            <th>{{ __('Status')}}</th>
                                            <th>{{ __('Action')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($questions as $key=>$rows)
                                        <tr>
                                            <td>
                                                {{ $serial++ }}
                                            </td>
                                            <td>{{ $rows->question }}</td>
                                            <td>{{ $rows->answer }}</td>
                                            <td>{{ $rows->options }}</td>
                                            <td>
                                                @if($rows->status == 1)
                                                <div class="badge badge-primary">{{ __('Published')}}</div>
                                                @else
                                                <div class="badge badge-warning">{{ __('Pending')}}</div>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('question.edit', $rows->id) }}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                <a class="btn btn-danger btn-action delete" id="delete" data-id="{{ $rows->id }}" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@include('layouts.footer')
@section('js-libraries')
<script src="{{ asset('assets/bundles/datatables/datatables.min.js')}}"></script>
<script src="{{ asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/bundles/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{ asset('assets/bundles/sweetalert/sweetalert.min.js')}}"></script>
@endsection
@section('page-specific-js')
<script type="text/javascript">
    var delete_url = "{{ route('question.delete')}}";
    $(".delete").click(function () {
        var id = $(this).data("id");
        swal({
            title: 'Are you sure?',
            text: 'Once deleted, you will not be able to recover this question!',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            $.ajax({
            url: delete_url,
            method: "DELETE",
            data: { 
                _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                id : id 
            },
            success: function(response) {
                swal('Poof! Question is deleted successfully', {
                icon: 'success',
                });
                setTimeout(() => {
                location.reload();
                }, 2000);
            }
            });
        } else {
            swal('The question is safe!');
        }
        });
    });
</script>
<script src="{{ asset('assets/js/page/datatables.js')}}"></script>
@endsection
@endsection