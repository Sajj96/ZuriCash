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
                        <div class="row m-b-30">
                            <div class="col-lg-12">

                                <!-- Nav tabs -->

                                <ul class="nav nav-tabs md-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#home3" role="tab">Transactions</a>
                                        <div class="slide"></div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#profile3" role="tab">Withdraw</a>
                                        <div class="slide"></div>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home3" role="tabpanel">
                                        <table class="table" id="table-1">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>{{ __('Date')}}</th>
                                                    <th>{{ __('Amount')}}</th>
                                                    <th>{{ __('Status')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <!-- <div class="label-main"><label class="label label-lg bg-success">Completed</label></div> -->
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="profile3" role="tabpanel">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <form>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1" class="form-control-label">Amount to withdraw</label>
                                                                <input type="number" name="amount" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter amount">
                                                                <small id="emailHelp" class="form-text text-muted">{{ __('Current balance: TZS 1000000')}}</small>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="payment_method" class="form-control-label">Payment method</label>
                                                                <select class="form-control " id="payment_method" name="payment_method">
                                                                    <option value="mobile">Mobile Number</option>
                                                                    <option value="bank">Bank Transfer</option>
                                                                    <option value="asset">Asset Purchase</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="phoneInput">
                                                                <label for="exampleInputPhone" class="form-control-label">Phone number</label>
                                                                <input type="tel" id="phone" class="form-control" id="exampleInputPhone" value="{{ Auth::user()->phonenumber }}" placeholder="Enter mobile number">
                                                            </div>
                                                            <div class="row bank">
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputAccountname" class="form-control-label">Account name</label>
                                                                        <input type="text" class="form-control" id="exampleInputAccountname" placeholder="Enter account name">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputAccountnumber" class="form-control-label">Account number</label>
                                                                        <input type="text" class="form-control" id="exampleInputAccountnumber" placeholder="Enter account number">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputbankname" class="form-control-label">Bank name</label>
                                                                        <input type="text" class="form-control" id="exampleInputbankname" placeholder="Enter bank name">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputbranch" class="form-control-label">Branch name</label>
                                                                        <input type="text" class="form-control" id="exampleInputbranch" placeholder="Enter bank's branch name">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row asset">
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label for="file" class="form-control-label">Attach invoice</label>
                                                                        <input type="file" id="file" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPhone" class="form-control-label">Supplier Contacts</label>
                                                                        <input type="tel" class="form-control" id="exampleInputPhone" value="{{ Auth::user()->phonenumber }}" placeholder="Enter mobile number">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-30">Submit</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
    $(document).ready(function() {
        $('#payment_method').on('change', function(){
            var option = $(this).val();
            if(option == "bank")
            {
              $('.bank').css('display', 'block');
              $('#phoneInput').css('display', 'none');
              $('.asset').css('display', 'none');
            } else if(option == "asset") {
              $('.asset').css('display', 'block');
              $('.bank').css('display', 'none');
              $('#phoneInput').css('display', 'none');
            } else {
              $('#phoneInput').css('display', 'block');
              $('.bank').css('display', 'none');
              $('.asset').css('display', 'none');
            }
        });
    })
</script>
@endsection
@endsection