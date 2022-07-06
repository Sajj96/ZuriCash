@extends('layouts.app')

@section('general-css')
<link rel="stylesheet" href="{{ asset('assets/bundles/jqvmap/dist/jqvmap.min.css')}}">
@endsection

@section('content')
@include('layouts.header')
<!-- Main Content -->
<div class="main-content">
    <h4 class="section-title mb-3 text-md-left text-sm-center">{{ $hours." ".Auth::user()->username}},</h4>
    @if(Auth::user()->user_type == 1)
    <section class="section">
        <div class="row">
            <div class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-bg">
                        <div class="p-t-20 d-flex justify-content-between">
                            <div class="col">
                                <h6 class="mb-0">{{ __('All Users')}}</h6>
                                <span class="font-weight-bold mb-0 font-20">{{ $all_users }}</span>
                            </div>
                            <i class="fas fa-users card-icon col-cyan font-30 p-r-30"></i>
                        </div>
                        <canvas id="chart-1" height="80"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-bg">
                        <div class="p-t-20 d-flex justify-content-between">
                            <div class="col">
                                <h6 class="mb-0">{{ __('Active Users')}}</h6>
                                <span class="font-weight-bold mb-0 font-20">{{ $active_users }}</span>
                            </div>
                            <i class="fas fa-user-check card-icon col-orange font-30 p-r-30"></i>
                        </div>
                        <canvas id="chart-4" height="80"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-bg">
                        <div class="p-t-20 d-flex justify-content-between">
                            <div class="col">
                                <h6 class="mb-0">{{ __('Withdraw Requests')}}</h6>
                                <span class="font-weight-bold mb-0 font-20">{{ $withdraw_requests }}</span>
                            </div>
                            <i class="fas fa-money-bill-alt card-icon col-purple font-30 p-r-30"></i>
                        </div>
                        <canvas id="chart-2" height="80"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-bg">
                        <div class="p-t-20 d-flex justify-content-between">
                            <div class="col">
                                <h6 class="mb-0">{{ __('Total Earnings')}}</h6>
                                <span class="font-weight-bold mb-0 font-20">{{ number_format($system_earnings,2)." ". $currency }}</span>
                            </div>
                            <i class="fas fa-hand-holding-usd card-icon col-green font-30 p-r-30"></i>
                        </div>
                        <canvas id="chart-3" height="80"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card ">
                    <div class="card-header">
                        <h4>Revenue chart</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-9">
                                <div id="chart1"></div>
                                <div class="row mb-0">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="list-inline text-center">
                                            <div class="list-inline-item p-r-30"><i data-feather="arrow-up-circle" class="col-cyan"></i>
                                                <h5 class="m-b-0"><span id="earning"></span> {{ $currency }}</h5>
                                                <p class="text-muted font-14 m-b-0">Weekly Earnings</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="list-inline text-center">
                                            <div class="list-inline-item p-r-30"><i data-feather="arrow-down-circle" class="col-orange"></i>
                                                <h5 class="m-b-0"><span id="withdraw"></span> {{ $currency }}</h5>
                                                <p class="text-muted font-14 m-b-0">Weekly Withdraws</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="row mt-5">
                                    <div class="col-7 col-xl-7 mb-3">Today's New Active Users</div>
                                    <div class="col-5 col-xl-5 mb-3">
                                        <span class="text-big">{{ count($newUsers) }}</span>
                                        <sup class="col-green">0</sup>
                                    </div>
                                    <div class="col-7 col-xl-7 mb-3">Total Withdraws</div>
                                    <div class="col-5 col-xl-5 mb-3">
                                        <span class="text-big">{{ number_format($totalWithdraw,2)." ".$currency }}</span>
                                        <sup class="text-danger">00</sup>
                                    </div>
                                    <div class="col-7 col-xl-7 mb-3">Today's Earnings</div>
                                    <div class="col-5 col-xl-5 mb-3">
                                        <span class="text-big">{{ number_format($todayEarning,2)." ".$currency }}</span>
                                        <sup class="col-green">00</sup>
                                    </div>
                                    <div class="col-7 col-xl-7 mb-3">Inactive Users</div>
                                    <div class="col-5 col-xl-5 mb-3">
                                        <span class="text-big">{{ $inactiveUsers }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @else
    @php echo $notification_output @endphp
<section class="section">
    <div class="row text-md-left text-sm-center">
        <div id="card-expenses" class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
                <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                        <div class="row ">
                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 pr-0 pt-3">
                                <div class="card-content">
                                    <h5 class="font-15"> {{ __('Expenses')}}</h5>
                                    <span class="mb-3 font-18" id="expense-amount">{{ number_format($amount,2)." ".$currency }}</span>
                                    <p class="mb-0 info"><span class="col-orange"></span>Registration Fee</p>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 pl-0 d-none d-lg-block d-md-none">
                                <div class="banner-img">
                                    <img src="{{ asset('assets/img/banner/3.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="card-profit" class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
                <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                        <div class="row ">
                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 pr-0 pt-3">
                                <div class="card-content">
                                    <h5 class="font-15">{{ __('Net Profit')}}</h5>
                                    <span class="mb-3 font-18" id="profit-amount">{{ number_format($profit,2)." ".$currency }}</span>
                                    <p class="mb-0 info"><span class="col-green"></span>
                                        Referral + Other Earnings
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 pl-0 d-none d-lg-block d-md-none">
                                <div class="banner-img">
                                    <img src="{{ asset('assets/img/banner/2.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-xl-3 col-lg-6">
            <div class="cards">
                <div class="face l-bg-red-dark">
                    <div class="head">
                        <div class="title">{{ __('Balance')}}</div>
                        <img src="{{ asset('assets/img/card-logo.svg') }}" alt="">
                    </div>
                    <div class="main">
                        <div class="number">{{ number_format($balance,2)." ".$currency }}</div>
                        <div class="progress mt-1 mb-1" data-height="2">
                            <div class="progress-bar bg-dark" role="progressbar" data-width="100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="dates">
                        <div class="start">
                            Referral Earnings
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="cards">
                <div class="face l-bg-grey">
                    <div class="head">
                        <div class="title">{{ __('Withdrawn')}}</div>
                        <img src="{{ asset('assets/img/card-logo.svg') }}" alt="">
                    </div>
                    <div class="main">
                        <div class="number">{{ number_format($withdrawn,2)." ".$currency }}</div>
                        <div class="progress mt-1 mb-1" data-height="2">
                            <div class="progress-bar bg-dark" role="progressbar" data-width="100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="dates">
                        <div class="start">
                            Main Balance
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="cards">
                <div class="face l-bg-purple">
                    <div class="head">
                        <div class="title">{{ __('Trivia Questions')}}</div>
                        <img src="{{ asset('assets/img/card-logo.svg') }}" alt="">
                    </div>
                    <div class="main">
                        <div class="number">{{ number_format($question,2)." ".$currency }}</div>
                        <div class="progress mt-1 mb-1" data-height="2">
                            <div class="progress-bar bg-dark" role="progressbar" data-width="100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="dates">
                        <div class="start">
                            Earnings
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="cards">
                <div class="face l-bg-orange">
                    <div class="head">
                        <div class="title">{{ __('Videos')}}</div>
                        <img src="{{ asset('assets/img/card-logo.svg') }}" alt="">
                    </div>
                    <div class="main">
                        <div class="number">{{ number_format($video,2)." ".$currency }}</div>
                        <div class="progress mt-1 mb-1" data-height="2">
                            <div class="progress-bar bg-dark" role="progressbar" data-width="100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="dates">
                        <div class="start">
                            Earnings
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="cards">
                <div class="face l-bg-green">
                    <div class="head">
                        <div class="title">{{ __('WhatsApp Status')}}</div>
                        <img src="{{ asset('assets/img/card-logo.svg') }}" alt="">
                    </div>
                    <div class="main">
                        <div class="number">{{ number_format($whatsapp,2)." ".$currency }}</div>
                        <div class="progress mt-1 mb-1" data-height="2">
                            <div class="progress-bar bg-dark" role="progressbar" data-width="100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="dates">
                        <div class="start">
                            Earnings
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="cards">
                <div class="face l-bg-cyan">
                    <div class="head">
                        <div class="title text-white">{{ __('Ads Click')}}</div>
                        <img src="{{ asset('assets/img/card-logo.svg') }}" alt="">
                    </div>
                    <div class="main">
                        <div class="number">{{ number_format($ads,2)." ".$currency }}</div>
                        <div class="progress mt-1 mb-1" data-height="2">
                            <div class="progress-bar bg-dark" role="progressbar" data-width="100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="dates">
                        <div class="start">
                            Earnings
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
</div>
@include('layouts.footer')
@if(Auth::user()->user_type == 1)
@section('js-libraries')
<script src="{{ asset('assets/bundles/chartjs/chart.min.js')}}"></script>
<script src="{{ asset('assets/bundles/jquery.sparkline.min.js')}}"></script>
<script src="{{ asset('assets/bundles/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{ asset('assets/bundles/jqvmap/dist/jquery.vmap.min.js')}}"></script>
<script src="{{ asset('assets/js/page/widget-chart.js')}}"></script>
<script type="text/javascript">
    var transactions = <?php echo json_encode($transactionData); ?>;
</script>
<script src="{{ asset('assets/js/page/index.js')}}"></script>
@endsection
@endif
@section('page-specific-js')
<script>
    $(document).ready(function() {
        $(window).bind("resize", function() {
            if ($(this).width() < 1024) {
                $('#card-expenses').removeClass('col-xs-12');
                $('#card-expenses').addClass('col-xs-6');
                $('#card-profit').removeClass('col-xs-12');
                $('#card-profit').addClass('col-xs-6');

                $('#card-expenses').children().addClass('card-info');
                $('#card-expenses').children().removeClass('card');
                $('#card-profit').children().addClass('card-info');
                $('#card-profit').children().removeClass('card');
                $('#card-expenses').children().children().children().children().children().addClass('pl-5 pb-4');
                $('#card-profit').children().children().children().children().children().addClass('pl-5 pb-4');

                $('#profit-amount').removeClass('mb-3');
                $('#profit-amount').addClass('mb-5');
                $('#balance').removeClass('font-15');
                $('#balance').addClass('card-title');
                $('.section-title').css('color', '#FFF');
                $('#card-expenses').css('color', '#FFF');
                $('#card-profit').css('color', '#FFF');

                $('.info').each(function() {
                    $(this).css('display', 'none');
                });
            } else {
                $('#card-expenses').addClass('col-xs-12');
                $('#card-expenses').removeClass('col-xs-6');
                $('#card-profit').addClass('col-xs-12');
                $('#card-profit').removeClass('col-xs-6');

                $('#card-expenses').children().removeClass('card-info');
                $('#card-expenses').children().addClass('card');
                $('#card-profit').children().removeClass('card-info');
                $('#card-profit').children().addClass('card');
                $('#card-expenses').children().children().children().children().children().removeClass('pl-5 pb-4');
                $('#card-profit').children().children().children().children().children().removeClass('pl-5 pb-4');

                $('#profit-amount').addClass('mb-3');
                $('#profit-amount').removeClass('mb-5');
                $('#balance').addClass('font-15');
                $('#balance').removeClass('card-title');
                $('.section-title').css('color', '#6c757d');
                $('#card-expenses').css('color', '#6c757d');
                $('#card-profit').css('color', '#6c757d');

                $('.info').each(function() {
                    $(this).css('display', 'block');
                });

                $('.progress').each(function() {
                    $(this).attr('data-height', 4);
                });
            }
        }).trigger('resize');
    });
</script>
@endsection
@endsection