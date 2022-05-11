@extends('layouts.app_admin')

@section('page-styles')
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
                    <h4>{{ __('Add Success Story ')}}</h4>
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
                                <form action="{{ route('testimonial.create') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name" class="form-control-label">{{ __('Story By')}}</label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
                                    </div>
                                    <div class="form-group">
                                        <label for="title" class="form-control-label">{{ __('Title')}}</label>
                                        <input type="text" name="title" class="form-control" id="title" placeholder="Enter story title">
                                    </div>
                                    <div class="form-group">
                                        <label for="payment_method" class="form-control-label">{{ __('Description')}}</label>
                                        <textarea name="story" id="story" class="form-control" cols="10" rows="10"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-30">{{ __('Save')}}</button>
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
@endsection
@endsection