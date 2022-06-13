@extends('layouts.app')

@section('general-css')
@endsection

@section('content')
@include('layouts.header')
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ __('Add Crypto Currency Lesson Link')}}</h4>
                        </div>
                        @include('flash-message')
                        <div class="card-body">
                            <form action="{{ route('crypto.create')}}" method="post">
                                @csrf
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Title')}}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="title" placeholder="Lesson title" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Link')}}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="link" placeholder="Paste link here" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary" type="submit">{{ __('Save')}}</button>
                                    </div>
                                </div>
                            </form>
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