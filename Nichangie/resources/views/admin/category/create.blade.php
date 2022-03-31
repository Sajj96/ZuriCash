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
                        <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home')}}"><i class="icofont icofont-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Create Category</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- Row end -->
            <div class="row">
            <div class="col-lg-6">
                     <div class="card">
                        <div class="card-header">
                           <h5 class="card-header-text">Input Types</h5>
                           <div class="f-right">
                              <a href="" data-toggle="modal" data-target="#input-type-Modal"><i class="icofont icofont-code-alt"></i></a>
                           </div>
                        </div>
                        <div class="modal fade modal-flex" id="input-type-Modal" tabindex="-1" role="dialog">
                           <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    <h5 class="modal-title">Code Explanation For Input Types </h5>
                                 </div>
                                 <!-- end of modal-header -->
                                 <div class="modal-body">
                                    <pre class="brush: html;">
			                      	<note> This Code Write inside <form> tag

									/* For Email Address */

									<div class="form-group">
										<label for="exampleInputEmail1" class="form-control-label">Email address</label>
										<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
										<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
									</div>

									/* For Password */

									<div class="form-group">
										<label for="exampleInputPassword1" class="form-control-label">Password</label>
											<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
									</div>

									/* For Dropdown */

									<div class="form-group">
										<label for="exampleSelect1" class="form-control-label">Example select</label>
											<select class="form-control" id="exampleSelect1">
												<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
												<option>5</option>
											</select>
									</div>

									/* for multiple select */

									<div class="form-group">
										<label for="exampleSelect2" class="form-control-label">Example multiple select</label>
											<select multiple class="form-control multiple-select" id="exampleSelect2">
												<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
												<option>5</option>
											</select>
									</div>

									/* for textarea */

									<div class="form-group">
										<label for="exampleTextarea" class="form-control-label">Example textarea</label>
											<textarea class="form-control" id="exampleTextarea" rows="4"></textarea>
									</div>

									/* For Radio Button */

									<fieldset class="form-group">
										/* Checked Radio Button*/
										<div class="form-check">
											<label for="optionsRadios1" class="form-check-label">
												<input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" valu6="option1" checked>
													Option one is this and that&mdash;be sure to include why it's great
											</label>
										</div>

										/* Not Checked Radio Button*/

										<div class="form-check">
											<label for="optionsRadios2" class="form-check-label">
												<input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2">
													Option two can be something else and selecting it will deselect option one
												</label>
										</div>

										/* Disable Radio Button */

										<div class="form-check disabled">
											<label for="optionsRadios3" class="form-check-label">
												<input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios3" value="option3" disabled>
													Option three is disabled
											</label>
										</div>
									</fieldset>

									/* use for multiple checkbox */

									<div class="form-check">
										<label for="chkme" class="form-check-label">
											<input type="checkbox" class="form-check-input" id="chkme">Check me out
										</label>
									</div>
										<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input" type="checkbox">
													Option one is this and that&mdash;be sure to include why it's great
											</label>
										</div>

									/* use for disable checkbox */

									<div class="form-check disabled">
										<label class="form-check-label">
											<input class="form-check-input" type="checkbox" disabled>
												Option two is disabled
											</label>
										</div>
									<button type="submit" class="btn btn-success waves-effect waves-light">Submit
									</button>
                      			</pre>
                                 </div>
                                 <!-- end of modal-body -->
                              </div>
                              <!-- end of modal-content -->
                           </div>
                           <!-- end of modal-dialog -->
                        </div>
                        <!-- end of modal -->

                        <div class="card-block">
                           <form>
                              <div class="form-group">
                                 <label for="exampleInputEmail1" class="form-control-label">Email address</label>
                                 <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                 <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                              </div>
                              <div class="form-group">
                                 <label for="exampleInputPassword1" class="form-control-label">Password</label>
                                 <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                              </div>
                              <div class="form-group">
                                 <label for="exampleSelect1" class="form-control-label">Example select</label>
                                 <select class="form-control " id="exampleSelect1">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                              </div>
                              <button type="submit" class="btn btn-success waves-effect waves-light m-r-30">Submit</button>
                           </form>
                        </div>
                     </div>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection