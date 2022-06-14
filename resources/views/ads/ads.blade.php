@extends('layouts.app')

@section('general-css')
@endsection

@section('content')
@include('layouts.header')
<div class="main-content">
    <section class="section" data-user="{{ $user->id }}">
        <div class="section-body">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ __('ADS Click.')}}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @if(count($ads) != count($ads_ids))
                                @foreach($ads as $key => $rows)
                                @php
                                $image_name = str_replace('http://127.0.0.1:8002/storage/ads/','',$rows->ads_path);
                                @endphp
                                @if(!in_array($rows->id, $ads_ids))
                                <div class="col-12 col-sm-6 col-md-6 col-lg-3 advert" id="advert" data-id="{{ $rows->id }}">
                                    <article class="article">
                                        <div class="article-header">
                                            <div class="article-image" data-background="{{ asset('storage/ads/'.$image_name)}}">
                                            </div>
                                            <div class="article-title">
                                                <h2><a href="#">{{ $rows->title }}</a></h2>
                                            </div>
                                        </div>
                                        <div class="article-details">
                                            <i class="fas fa-audio-description"></i>
                                        </div>
                                    </article>
                                </div>
                                @endif
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content"  style="background-color: none !important; background-image: url(/assets/img/confetti-yellow.jpg);background-position: inherit;background-repeat: no-repeat;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center text-white">
                    <h2>Congrats! 🎉</h2>
                    <h4>You got <strong> {{ $amount." ".$currency }} </strong> for clicking this AD</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <h2>Sorry 😐!</h2>
                    <h4>You have already clicked this AD.</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
@section('js-libraries')
@endsection
@section('page-specific-js')
<script type="text/javascript">
    var url1 = "{{ route('revenue.create')}}";
    var url2 = "{{ route('advert.users.create')}}";
    var url3 = "{{ route('advert.users.check')}}";
    var url4 = "{{ route('advert')}}";
    var userCountry = "{{ Auth::user()->country }}";
</script>
<script src="{{ asset('assets/js/page/adverts.js')}}"></script>
@endsection
@endsection