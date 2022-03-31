@extends('layouts.app_admin')

@section('content')
@include('layouts.admin_header')
<div class="content-wrapper">
	<!-- Container-fluid starts -->
	<div class="container-fluid">
		<!-- Main content starts -->
		<div>
			<!-- Row Starts -->
			<div class="row">
				<div class="col-sm-12 p-0">
					<div class="main-header">
						<h4>Create Category</h4>
					</div>
				</div>
			</div>
			<!-- Row end -->
			<div class="card">
				<div class="card-block">
					<form class="form-inline" action="" method="post">
						@csrf
						<div class="row">
							<div class="form-group col-lg-12">
								<label class="form-control-label">Category Name</label>
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Enter category name">
									<div class="input-group-btn">
										<button type="button" class="btn btn-info shadow-none addon-btn waves-effect waves-light addon-btn">
											<i class="icon-plus"></i> {{ __('Add Category')}}
										</button>
									</div>
								</div>
							</div>
							<div class="col-lg-12 m-t-2">
								<button type="submit" class="btn btn-success waves-effect waves-light m-r-30">Save</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection