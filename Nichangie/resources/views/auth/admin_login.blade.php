@extends('layouts.app_admin')

@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/color/color-2.min.css')}}" id="color"/>
@endsection

@section('content')
<section class="login p-fixed d-flex text-center common-img-bg">
	<!-- Container-fluid starts -->
	<div class="container-fluid">
		<div class="row">

			<div class="col-sm-12">
				<div class="login-card card-block">
					<form class="md-float-material" method="post" action="{{ route('login') }}">
						<div class="text-center">
                            <a href="{{ route('index') }}" class=""><img src="{{ asset('assets/images/logo-10.jpeg')}}" alt="" title="">
                                <!-- <h5 class="mt-3 ml-4"><strong>{{ __('NACHANGIA')}}</strong></h5> -->
                            </a>
						</div>
						<h3 class="text-center txt-primary">
							Sign In Admin
						</h3>
						@csrf
						@error('login')
							<span class="invalid" role="alert">
								<strong style="color:red;">{{ $message }}</strong>
							</span>
						@enderror
						<div class="row">
							<div class="col-md-12">
								<div class="md-input-wrapper">
									<input type="email" name="login" class="md-form-control" required="required"/>
									<input type="hidden" name="user_type" value="2">
									<label>Email</label>
								</div>
							</div>
							<div class="col-md-12">
								<div class="md-input-wrapper">
									<input type="password" name="password" class="md-form-control" required="required"/>
									<label>Password</label>
								</div>
							</div>
						<div class="row">
							<div class="col-xs-10 offset-xs-1">
								<button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">LOGIN</button>
							</div>
						</div>
					</form>
					<!-- end of form -->
				</div>
				<!-- end of login-card -->
			</div>
			<!-- end of col-sm-12 -->
		</div>
		<!-- end of row -->
	</div>
	<!-- end of container-fluid -->
</section>
@endsection