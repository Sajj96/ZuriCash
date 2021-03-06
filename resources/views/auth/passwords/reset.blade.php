@extends('layouts.app')

@section('content')
<section class="section">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>{{ __('Reset Password') }}</h4>
                    </div>
                    <div class="card-body">
                        <p class="text-muted">{{ __('Enter Your New Password')}}</p>
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group">
                                <label for="email">{{ __('Email')}}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">{{ __('New Password')}}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror pwstrength" data-indicator="pwindicator" name="password" tabindex="2" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div id="pwindicator" class="pwindicator">
                                    <div class="bar"></div>
                                    <div class="label"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password-confirm">{{ __('Confirm Password')}}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" tabindex="2" required autocomplete="new-password">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                    {{ __('Reset Password')}}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@section('js-libraries')
<script src="{{ asset('assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js')}}"></script>
<script src="{{ asset('assets/bundles/jquery-selectric/jquery.selectric.min.js')}}"></script>
@endsection
@section('page-specific-js')
<script>
    $(".pwstrength").pwstrength();
</script>
@endsection
@endsection