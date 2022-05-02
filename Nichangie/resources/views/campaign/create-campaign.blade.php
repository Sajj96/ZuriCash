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
            <div class="col-lg-12">
                <div class="default-form-area">
                    <div class="sec-title">
                        <h1>{{ __('Create Campaign')}}</h1>
                    </div>
                    @include('flash-message')
                    <form id="contact-form" name="contact_form" class="contact-form" action="{{ route('campaign.create') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 column">
                                <div class="form-group">
                                    <label for="title">{{ __('Title*')}}</label>
                                    <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="" placeholder="Enter campaign title" required>
                                    @error('title')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 column">
                                <div class="form-group">
                                    <label for="image">{{ __('Supporting photo*')}}</label>
                                    <input type="file" id="image" name="image" class="form-control" required>
                                    @error('image')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 column">
                                <div class="form-group">
                                    <label for="category">{{ __('Select category*')}}</label>
                                    <select class="filters-select form-control selectmenu" name="category">
                                        <option value="">Please select</option>
                                        @foreach($categories as $key=>$rows)
                                        <option value="{{ $rows->name }}">{{ $rows->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 column">
                                <div class="form-group">
                                    <label for="amount">{{ __('Goal funds (5% platform fee) *')}}</label>
                                    <input type="number" id="amount" name="amount" class="form-control @error('amount') is-invalid @enderror" placeholder="Enter goal amount" required>
                                    @error('amount')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 column">
                                <div class="form-group">
                                    <label for="enddate">{{ __('Deadline *')}}</label>
                                    <input type="date" name="enddate" class="form-control @error('enddate') is-invalid @enderror" placeholder="Enter deadline" required>
                                    @error('enddate')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- <div class="col-lg-4 col-md-6 column">
                                <div class="form-group">
                                    <label for="type">{{ __('Campaign Type')}}</label>
                                    <select class="filters-select form-control selectmenu" name="type">
                                        @foreach($category_types as $key=>$rows)
                                        <option value="{{ $rows->id }}">{{ $rows->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('type')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div> -->
                            <div class="col-lg-12 col-md-12 column">
                                <div class="form-group">
                                    <label for="type">{{ __('Story')}}</label>
                                    <textarea name="story" class="form-control textarea required summernote-simple" name="story" placeholder="Type your story...."></textarea>
                                </div>
                                <div class="form-group flex-box">
                                    <div class="submit-btn">
                                        <button class="theme-btn btn-style-one" type="submit" data-loading-text="Please wait..."><span>{{ __('Save')}}</span></button>
                                    </div>
                                </div>
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
<script>
    $(document).ready(function(){
        $('#amount').on('blur', function(){
            var amount = $(this).val();
            var fee = parseInt(amount) * 0.05;
            var goal = parseInt(amount) + fee;
            $(this).val(goal);
        });
    });
</script>
@endsection
@endsection