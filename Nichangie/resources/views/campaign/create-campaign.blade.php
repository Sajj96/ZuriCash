@extends('layouts.app')

@section('page-styles')
<link href="{{ asset('assets/css/shop.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/js/summernote/summernote-bs4.css')}}">
@endsection

@section('content')
@include('layouts.header')
<!-- Page Title -->
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
                                        <option value="1">Medical</option>
                                        <option value="2">Memorial</option>
                                        <option value="3">Emergency</option>
                                        <option value="4">Nonprofit </option>
                                        <option value="5">Education</option>
                                        <option value="6">Financial Emergency</option>
                                        <option value="7">Animals</option>
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