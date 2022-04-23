@extends('layouts.app')

@section('page-styles')
<link href="{{ asset('assets/css/shop.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/js/summernote/summernote-bs4.css')}}">
@endsection

@section('content')
@include('layouts.header')
<!-- Page Title -->
<section class="contact-form-section">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="default-form-area">
                        <div class="sec-title">
                            <h1>Drop a line us</h1>
                        </div>
                        <form id="contact-form" name="contact_form" class="contact-form" action="http://steelthemes.com/demo/html/Goodsoul_html/inc/sendmail.php" method="post">
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-6 column">        
                                    <div class="form-group">
                                        <input type="text" name="form_name" class="form-control" value="" placeholder="Name" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 column">
                                    <div class="form-group">
                                        <input type="email" name="form_email" class="form-control required email" value="" placeholder="Email" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 column">        
                                    <div class="form-group">
                                        <input type="text" name="form_phone" class="form-control" value="" placeholder="Phone" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 column">        
                                    <div class="form-group">
                                        <input type="text" name="form_subject" class="form-control" value="" placeholder="Subject" required="">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 column">
                                    <div class="form-group">
                                        <textarea name="form_message" class="form-control textarea required" placeholder="Message...."></textarea>
                                    </div>
                                    <div class="form-group flex-box">
                                        <div class="submit-btn">
                                            <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
                                            <button class="theme-btn btn-style-one" type="submit" data-loading-text="Please wait..."><span>Send Message</span></button>
                                        </div>
                                        <span class="hint">*Get answers to common questions through our help center.</span>
                                    </div>
                                </div>                                            
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-info-three">
                        <div class="single-info">
                            <h4>Global HQ</h4>
                            <div class="text">5404 Berrick Street, 2nd cross str, Boston, MA 02115.</div>
                            <a class="link-btn" href="#">Your Nearest Location</a>                            
                        </div>
                        <div class="single-info">
                            <h4>Quick Contact</h4>
                            <div class="wrapper-box">
                                <a href="mailto:supportyou@goodsoul.co">supportyou@goodsoul.com </a> <br>
                                <a href="tel:+211456789123">+211 456 789 & 123</a>
                            </div>
                            <a class="link-btn" href="#">Get Call Back</a>
                        </div>
                    </div>
                </div>
            </div>                    
        </div>
    </section>
<section class="checkout-area">
    @include('flash-message')
    <div class="auto-container">
        <div class="row">
            <div class="col-md-12 col-sm-12 card-panel">
                <div class="form billing-info">
                    <div class="shop-page-title">
                        <div class="title">{{ __('Create Campaign')}} </div>
                    </div>
                    <form method="post" action="{{ route('campaign.create') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="field-label">{{ __('Title *')}}</div>
                                <div class="field-input">
                                    <input type="text" name="title" placeholder="Enter Title" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="field-label">{{ __('Story*')}}</div>
                                <div class="field-input">
                                    <textarea class="summernote-simple" name="story" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="field-label">{{ __('Supporting Image*')}}</div>
                                <div class="field-input">
                                    <input type="file" name="image">
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="field-label">{{ __('What are you campaigning for?*')}}</div>
                                <div class="field-input">
                                    <select class="filters-select selectmenu" name="category">
                                        <option value="">Please select</option>
                                        @foreach($categories as $key=>$rows)
                                        <option value="{{ $rows->id }}">{{ $rows->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="field-label">{{ __('Expected Goal(Amount) *')}}</div>
                                <div class="field-input">
                                    <input type="number" name="amount" placeholder="Enter Amount" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="field-label">{{ __('End Date *')}}</div>
                                <div class="field-input">
                                    <input type="date" name="enddate" placeholder="Enter End Date" required>
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="field-label">{{ __('Campaign Type')}}</div>
                                <div class="field-input">
                                    <select class="filters-select selectmenu" name="type">
                                        @foreach($category_types as $key=>$rows)
                                        <option value="{{ $rows->id }}">{{ $rows->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="register-btn">
                                <button class="theme-btn btn-style-one" type="submit"><span>{{ __('Save')}}</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@include('layouts.footer')
@section('page-scripts')
<script src="{{ asset('assets/js/summernote/summernote-bs4.js')}}"></script>
@endsection
@endsection