@extends('layouts.app_admin')

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/js/intl-tel-input/css/intlTelInput.css')}}">
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
                    <h4>{{ __('Withdraw ')}} {{ (!empty($campaign->title)) ? 'from '.$campaign->title : "" }}</h4>
                </div>
            </div>
        </div>
        <!-- Header end -->
        <div class="row m-b-30">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                        @include('flash-message')
                            <div class="card-block">
                                <form action="{{ route('transaction.request') }}"  method="POST">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="form-control-label">Amount to withdraw</label>
                                        <input type="number" name="amount" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter amount">
                                        <small id="emailHelp" class="form-text text-muted">{{ __('Current balance: TZS ')}} {{ $campaign->amount ?? 0}}</small>
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
                                        <input type="tel" id="phone" name="phone" class="form-control" id="exampleInputPhone" value="{{ Auth::user()->phonenumber }}" placeholder="Enter mobile number">
                                    </div>
                                    <div class="row bank">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="exampleInputAccountname" class="form-control-label">Account name</label>
                                                <input type="text" class="form-control" name="account_name" id="exampleInputAccountname" placeholder="Enter account name">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="exampleInputAccountnumber" class="form-control-label">Account number</label>
                                                <input type="text" class="form-control" name="account_number" id="exampleInputAccountnumber" placeholder="Enter account number">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="exampleInputbankname" class="form-control-label">Bank name</label>
                                                <input type="text" class="form-control" name="bank_name" id="exampleInputbankname" placeholder="Enter bank name">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="exampleInputbranch" class="form-control-label">Branch name</label>
                                                <input type="text" class="form-control" name="branch_name" id="exampleInputbranch" placeholder="Enter bank's branch name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row asset">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="file" class="form-control-label">Attach invoice</label>
                                                <input type="file" id="file" name="invoice" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="exampleInputPhone" class="form-control-label">Supplier Contacts</label>
                                                <input type="tel" class="form-control" name="supplier_contact" id="exampleInputPhone" value="{{ Auth::user()->phonenumber }}" placeholder="Enter mobile number">
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
@section('page-scripts')
<script src="{{ asset('assets/js/intl-tel-input/js/intlTelInput.min.js')}}"></script>
<script type="text/javascript">
    var utilUrl = "{{ asset('assets/js/intl-tel-input/js/utils.js?1638200991544')}}"
</script>
<script src="{{ asset('assets/js/auth-login.js')}}"></script>

<script>
    $(document).ready(function() {
        $('#payment_method').on('change', function() {
            var option = $(this).val();
            if (option == "bank") {
                $('.bank').css('display', 'block');
                $('#phoneInput').css('display', 'none');
                $('.asset').css('display', 'none');
            } else if (option == "asset") {
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