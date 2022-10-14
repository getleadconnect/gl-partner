@extends('admin.layouts.master')
@section('title','Account Settings')
@section('content')
	@include('admin.pages.partials.breadcrumb',['title'=>'Account Settings','subtitle'=>'Edit you account details'])
		<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
			<div class="kt-portlet kt-portlet--tabs">
				<div class="kt-portlet__head">
					<div class="kt-portlet__head-toolbar">
						<ul class="nav nav-tabs nav-tabs-space-xl nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand" role="tablist">
							
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#kt_user_edit_tab_2" role="tab">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<polygon points="0 0 24 0 24 24 0 24" />
											<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
											<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
										</g>
									</svg> My Account
								</a>
							</li>
							<!-- <li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_3" role="tab">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24" />
											<path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3" />
											<path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z" fill="#000000" opacity="0.3" />
											<path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z" fill="#000000" opacity="0.3" />
										</g>
									</svg> Change Password
								</a>
							</li> -->
							
						</ul>
					</div>
				</div>
                 @if (count($errors) > 0)
         <div class = "alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
      @endif
				<div class="kt-portlet__body">
						<div class="tab-content">
							
							<div class="tab-pane active" id="kt_user_edit_tab_2" role="tabpanel">
								<div class="kt-form kt-form--label-right">
									<form action="{{ url('admin/account/update') }}"  method="post" enctype="multipart/form-data">
										{{ csrf_field() }}
									<div class="kt-form__body">
										<div class="kt-section kt-section--first">
											<div class="kt-section__body">
												<div class="row">
													<label class="col-xl-3"></label>
													<div class="col-lg-9 col-xl-6">
														
													</div>
												</div>
												<div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label">Avatar</label>
													<div class="col-lg-9 col-xl-6">
														<div class="kt-avatar kt-avatar--outline kt-avatar--circle-" id="kt_user_edit_avatar">
															<div class="kt-avatar__holder"></div>
															<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
																<i class="fa fa-pen"></i>
																<input type="file" name="image" accept=".png, .jpg, .jpeg">
															</label>
															<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
																<i class="fa fa-times"></i>
															</span>
														</div>
														@if( !empty(auth()->user()->image))
											<img src="/images/account/{{auth()->user()->image}}" style="height: 50px;width:50px">
											@endif
													</div>
												</div>
												<div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label">Name</label>
													<div class="col-lg-9 col-xl-6">
														
															<input class="form-control" type="text" value="{{ auth()->user()->name }}" name="name">
														</div>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label">Email Address</label>
													<div class="col-lg-9 col-xl-6">
														<div class="input-group">
															<div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
															<input type="text" class="form-control" value="{{ auth()->user()->email }}" placeholder="Email" aria-describedby="basic-addon1" name="email">
														</div>
														
													</div>
												</div>

												<div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label">Password</label>
													<div class="col-lg-9 col-xl-6">
														<input type="password" class="form-control" value="" placeholder="New password" name="password">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label">Mobile</label>
													<div class="col-lg-9 col-xl-6">
														<div class="">
															<input class="form-control" type="text" value="{{ auth()->user()->mobile }}" name="mobile">
														</div>
													</div>
												</div>
											
											</div>
										</div>
										<div class="kt-separator kt-separator--space-lg kt-separator--fit kt-separator--border-solid"></div>
										<div class="kt-form__actions">
											<div class="row">
												<div class="col-xl-3"></div>
												<div class="col-lg-9 col-xl-6">
													<a href="#" class="btn btn-clean btn-bold">Cancel</a>
													<input type="submit" class="btn btn-label-brand btn-bold" value="Save">
													
												</div>
											</div>
										</div>
									</div>
								</form>
								</div>
							</div>
							<!-- <div class="tab-pane" id="kt_user_edit_tab_3" role="tabpanel">
								<form action="{{ url('admin/password-reset') }}"  method="post" enctype="multipart/form-data">
									{{ csrf_field() }}
								<div class="kt-form kt-form--label-right">
									<div class="kt-form__body">
										<div class="kt-section kt-section--first">
											<div class="kt-section__body">

												{{-- <div class="alert alert-solid-danger alert-bold fade show kt-margin-t-20 kt-margin-b-40" role="alert">
													<div class="alert-icon"><i class="fa fa-exclamation-triangle"></i></div>
													<div class="alert-text">Configure user passwords to expire periodically. <br>Users will need warning that their passwords are going to expire, or they might inadvertently get locked out of the system!</div>
													<div class="alert-close">
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true"><i class="la la-close"></i></span>
														</button>
													</div>
												</div> --}}
												<div class="row">
													<label class="col-xl-3"></label>
													<div class="col-lg-9 col-xl-6">
														<h3 class="kt-section__title kt-section__title-sm">Change Or Recover Your Password:</h3>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label">Current Password</label>
													<div class="col-lg-9 col-xl-6">
														<input type="password" class="form-control" value="" placeholder="Current password" name="current_password">
														<a href="#" class="kt-link kt-font-sm kt-font-bold kt-margin-t-5">Forgot password ?</a>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label">New Password</label>
													<div class="col-lg-9 col-xl-6">
														<input type="password" class="form-control" value="" placeholder="New password" name="new_password">
													</div>
												</div>
												<div class="form-group form-group-last row">
													<label class="col-xl-3 col-lg-3 col-form-label">Verify Password</label>
													<div class="col-lg-9 col-xl-6">
														<input type="password" class="form-control" value="" placeholder="Verify password" name="confirm_password">
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="kt-separator kt-separator--space-lg kt-separator--fit kt-separator--border-solid"></div>
									<div class="kt-form__actions">
										<div class="row">
											<div class="col-xl-3"></div>
											<div class="col-lg-9 col-xl-6">
												<a href="#" class="btn btn-clean btn-bold">Cancel</a>
												<input type="submit" class="btn btn-label-brand btn-bold" value="save">
								 <a href="#" class="btn btn-label-brand btn-bold" type="submit">Save changes</a> -->
											</div>
										</div>
									</div>
					
								</div>
							</div> 
							
						</div>
				</div>
			</div>
		</div>
@endsection	