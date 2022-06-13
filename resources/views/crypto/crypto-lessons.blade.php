@extends('layouts.app')

@section('general-css')
@endsection

@section('content')
@include('layouts.header')
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ __('Crypto-Currency Education Video Links.')}}</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                                @foreach($crypto as $key=>$rows)
                                <li class="media">
                                    <i class="fas fa-play-circle fa-2x mr-3"></i>
                                    <div class="media-body">
                                        <div class="media-right">
                                            <div class="text-primary"></div>
                                        </div>
                                        <div class="media-title mb-1"><a href="{{ $rows->link }}" target="_blank" rel="noopener noreferrer">{{ $rows->title }}</a></div>
                                        <div class="text-time">{{ date('F, d Y', strtotime($rows->created_at)) }}</div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@include('layouts.footer')
@section('js-libraries')
@endsection
@section('page-specific-js')
@endsection
@endsection