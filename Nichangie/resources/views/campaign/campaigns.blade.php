@extends('layouts.app')

@section('page-styles')
@endsection

@section('content')
@include('layouts.header')
<!-- Page Title -->
<section class="page-title">
    <div class="auto-container">
        <div class="content-box">
            <h1>{{ $type }} {{ __('Campaigns')}}</h1>
            <ul class="bread-crumb">
                <li><a class="home" href="{{ route('home') }}"><span class="fa fa-home"></span></a></li>
                <li>{{ $type }} {{ __('Campaigns')}}</li>
            </ul>
        </div>
    </div>
</section>

<!-- Causes Section Four -->
<section class="causes-section">
    <div class="auto-container">
        <div class="cause-wrapper">
            <div class="row loadMore" id="jar">
                @foreach($campaigns as $key=>$rows)
                <div class="cause-block-one col-lg-4 col-md-6">
                    <div class="inner-box">
                        <div class="image"><a href="{{ route('campaign.show', $rows->id) }}"><img src="{{ $rows->link }}" style="height: 230px;" alt="cause-media"></a></div>
                        <div class="lower-content">
                            <h4><a href="{{ route('campaign.show', $rows->id) }}">{{ $rows->title }}</a></h4>
                            <div class="category"><span class="flaticon-user"></span> {{ $rows->name }}</div>
                            <div class="text">{{ substr($rows->description,0,40) }}...</div>
                            <div class="info-box">
                                <a href="#"><span>Raised:</span> $72000</a>
                                <a href="#"><span>Goal:</span> TZS {{ $rows->fundgoals }}</a>
                            </div>
                            <!--Progress Levels-->
                            <div class="progress-levels style-two">

                                <!--Skill Box-->
                                <div class="progress-box wow fadeInRight" data-wow-delay="100ms" data-wow-duration="1500ms">
                                    <div class="inner">
                                        <div class="bar">
                                            <div class="bar-innner">
                                                <div class="bar-fill" data-percent="60">
                                                    <div class="percent"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text">Raised by 84 people in 12 days</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@include('layouts.footer')
@section('page-scripts')
<script src="{{ asset('assets/js/pagination/load-more-single-button/dist/btnloadmore.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('.loadMore').btnLoadmore();
    })
</script>
@endsection
@endsection