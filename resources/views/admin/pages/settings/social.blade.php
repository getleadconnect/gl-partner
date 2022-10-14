@extends('admin.layouts.master')
@section('title','Site Settings')
@section('content')

@include('admin.pages.partials.breadcrumb',['title'=>'Social Settings','subtitle'=>'Edit social details'])


<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
	<div class="kt-portlet kt-portlet--tabs">
		<div class="kt-portlet__head">
			<div class="kt-portlet__head-toolbar">
				<ul class="nav nav-tabs nav-tabs-space-xl nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#kt_user_edit_tab_1" role="tab">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<polygon points="0 0 24 0 24 24 0 24" />
									<path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
									<path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
								</g>
							</svg> Google Setting
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_2" role="tab">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<rect x="0" y="0" width="24" height="24"/>
									<path d="M13,18.9450712 L13,20 L14,20 C15.1045695,20 16,20.8954305 16,22 L8,22 C8,20.8954305 8.8954305,20 10,20 L11,20 L11,18.9448245 C9.02872877,18.7261967 7.20827378,17.866394 5.79372555,16.5182701 L4.73856106,17.6741866 C4.36621808,18.0820826 3.73370941,18.110904 3.32581341,17.7385611 C2.9179174,17.3662181 2.88909597,16.7337094 3.26143894,16.3258134 L5.04940685,14.367122 C5.46150313,13.9156769 6.17860937,13.9363085 6.56406875,14.4106998 C7.88623094,16.037907 9.86320756,17 12,17 C15.8659932,17 19,13.8659932 19,10 C19,7.73468744 17.9175842,5.65198725 16.1214335,4.34123851 C15.6753081,4.01567657 15.5775721,3.39010038 15.903134,2.94397499 C16.228696,2.49784959 16.8542722,2.4001136 17.3003976,2.72567554 C19.6071362,4.40902808 21,7.08906798 21,10 C21,14.6325537 17.4999505,18.4476269 13,18.9450712 Z" fill="#000000" fill-rule="nonzero"/>
									<circle fill="#000000" opacity="0.3" cx="12" cy="10" r="6"/>
								</g>
							</svg> FaceBook Setting
						</a>
					</li>
					
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_4" role="tab">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<rect x="0" y="0" width="24" height="24"/>
									<path d="M13,18.9450712 L13,20 L14,20 C15.1045695,20 16,20.8954305 16,22 L8,22 C8,20.8954305 8.8954305,20 10,20 L11,20 L11,18.9448245 C9.02872877,18.7261967 7.20827378,17.866394 5.79372555,16.5182701 L4.73856106,17.6741866 C4.36621808,18.0820826 3.73370941,18.110904 3.32581341,17.7385611 C2.9179174,17.3662181 2.88909597,16.7337094 3.26143894,16.3258134 L5.04940685,14.367122 C5.46150313,13.9156769 6.17860937,13.9363085 6.56406875,14.4106998 C7.88623094,16.037907 9.86320756,17 12,17 C15.8659932,17 19,13.8659932 19,10 C19,7.73468744 17.9175842,5.65198725 16.1214335,4.34123851 C15.6753081,4.01567657 15.5775721,3.39010038 15.903134,2.94397499 C16.228696,2.49784959 16.8542722,2.4001136 17.3003976,2.72567554 C19.6071362,4.40902808 21,7.08906798 21,10 C21,14.6325537 17.4999505,18.4476269 13,18.9450712 Z" fill="#000000" fill-rule="nonzero"/>
									<circle fill="#000000" opacity="0.3" cx="12" cy="10" r="6"/>
								</g>
							</svg>Git Lab Setting
						</a>
					</li>
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
			{{-- <form action="" method=""> --}}
				<div class="tab-content">
					<div class="tab-pane active" id="kt_user_edit_tab_1" role="tabpanel">
						{{-- <div class="kt-portlet"> --}}
							<div class="kt-portlet__head">
								<div class="kt-portlet__head-label">
									<h3 class="kt-portlet__head-title">
										Google Setting
									</h3>
								</div>
							</div>
						<form class="kt-form kt-form--fit kt-form--label-right" action="{{ url('admin/google') }}" method="post"  enctype="multipart/form-data">
                   {{ csrf_field() }}
								

							<!--begin::Form-->
						<form class="kt-form kt-form--fit kt-form--label-right">
								<div class="kt-portlet__body">
									<div class="form-group row">
										<label class="col-lg-2 col-form-label">  Client ID</label>
										<div class="col-lg-3">
											<input type="text" class="form-control" placeholder=""  value="{{isset($datagoogle->cilent_id)?$datagoogle->cilent_id:'' }}"  name="cilent_id">
											
										</div>
										<label class="col-lg-2 col-form-label">Client Secret Key</label>
										<div class="col-lg-3">
											<input type="text" class="form-control" name="cilent_secret_key" value="{{isset($datagoogle->cilent_secret_key)?$datagoogle->cilent_secret_key:'' }}" placeholder="">
											
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-2 col-form-label">Callback URL</label>
										<div class="col-lg-3">
											<div class="kt-input-icon">
												<input type="text" class="form-control" value="{{isset($datagoogle->call_back_url)?$datagoogle->call_back_url:'' }}"
												name="call_back_url" placeholder="" >
																							</div>
										
										</div>
										<label class="col-lg-2 col-form-label">Status</label>
										<div class="col-lg-3">
											<div class="kt-input-icon">
												<span class="kt-switch">
													<label>
														<input type="checkbox" checked="checked" name="status" />
														<span></span>
													</label>
												</span>
											
											</div>
									
										</div>
									</div>
									
										
								</div>
								
								<div class="kt-portlet__foot kt-portlet__foot--fit-x">
									<div class="kt-form__actions">
										<div class="row">
											<div class="col-lg-2"></div>
											<div class="col-lg-10">
												<button type="submit" class="btn btn-success">Submit</button>
												<button type="reset" class="btn btn-secondary">Cancel</button>
											</div>
										</div>
									</div>
								</div>

							</form>

							
							</div>
							<div class="tab-pane" id="kt_user_edit_tab_2" role="tabpanel">
								
								<div class="kt-form kt-form--label-right">
									<div class="kt-form__body">
										<div class="kt-section kt-section--first">
											<div class="kt-section__body">
												<div class="row">
													<label class="col-xl-3"></label>
													<div class="col-lg-9 col-xl-6">
														<h3 class="kt-section__title kt-section__title-sm">Face Book Setting:</h3>
													</div>
												</div>
						<form class="kt-form kt-form--fit kt-form--label-right" action="{{ url('admin/facebook') }}" method="post"  enctype="multipart/form-data">
                   {{ csrf_field() }}
					
								<div class="kt-portlet__body">
										<div class="form-group row">
										<label class="col-lg-2 col-form-label">  Client ID</label>
										<div class="col-lg-3">
											<input type="text" class="form-control" placeholder="" name="cilent_id"  value="{{isset($datafacebook->cilent_id)?$datafacebook->cilent_id:'' }}">
											
										</div>
										<label class="col-lg-2 col-form-label">Client Secret Key</label>
										<div class="col-lg-3">
											<input type="text" class="form-control" name="cilent_secret_key" placeholder="" value="{{isset($datafacebook->cilent_secret_key)?$datafacebook->cilent_secret_key:'' }}">
											
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-2 col-form-label">Callback URL</label>
										<div class="col-lg-3">
											<div class="kt-input-icon">
												<input type="text" class="form-control"  value="{{isset($datafacebook->call_back_url)?$datafacebook->call_back_url:'' }}" name="call_back_url" placeholder="">
																							</div>
										
										</div>
										<label class="col-lg-2 col-form-label">Status</label>
										<div class="col-lg-3">
											<div class="kt-input-icon">
												<span class="kt-switch">
													<label>
														<input type="checkbox" checked="checked" name="status" />
														<span></span>
													</label>
												</span>
											
											</div>
									
										</div>
									</div>
									
										
								</div>
								
								<div class="kt-portlet__foot kt-portlet__foot--fit-x">
									<div class="kt-form__actions">
										<div class="row">
											<div class="col-lg-2"></div>
											<div class="col-lg-10">
												<button type="submit" class="btn btn-success">Submit</button>
												<button type="reset" class="btn btn-secondary">Cancel</button>
											</div>
										</div>
									</div>
								</div>

							</form>
								</div>
							</div>
						</div>
							</div></div>
							<div class="tab-pane" id="kt_user_edit_tab_4" role="tabpanel">
							
								<div class="kt-form kt-form--label-right">
									<div class="kt-form__body">
										<div class="kt-section kt-section--first">
											<div class="kt-section__body">
												<div class="row">
													<label class="col-xl-3"></label>
													<div class="col-lg-9 col-xl-6">
														<h3 class="kt-section__title kt-section__title-sm">Git Lab Setting:</h3>
													</div>
												</div>
												<form class="kt-form kt-form--fit kt-form--label-right" action="{{ url('admin/git') }}" method="post"  enctype="multipart/form-data">
                   {{ csrf_field() }}
								

							<!--begin::Form-->
						<form class="kt-form kt-form--fit kt-form--label-right">
								<div class="kt-portlet__body">
										<div class="form-group row">
										<label class="col-lg-2 col-form-label">  Client ID</label>
										<div class="col-lg-3">
											<input type="text" class="form-control" placeholder="" name="cilent_id" value="{{isset($datagit->cilent_id)?$datagit->cilent_id:'' }}">
											
										</div>
										<label class="col-lg-2 col-form-label">Client Secret Key</label>
										<div class="col-lg-3">
											<input type="text" class="form-control" name="cilent_secret_key" value="{{isset($datagit->cilent_secret_key)?$datagit->cilent_secret_key:'' }}" placeholder="">
											
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-2 col-form-label">Callback URL</label>
										<div class="col-lg-3">
											<div class="kt-input-icon">
												<input type="text" class="form-control" name="call_back_url" placeholder="" value="{{isset($datagit->call_back_url)?$datagit->call_back_url:'' }}">
																							</div>
										
										</div>
										<label class="col-lg-2 col-form-label">Status</label>
										<div class="col-lg-3">
											<div class="kt-input-icon">
												<span class="kt-switch">
													<label>
														<input type="checkbox" checked="checked" name="status" />
														<span></span>
													</label>
												</span>
											
											</div>
									
										</div>
									</div>
									
										
								</div>
								
								<div class="kt-portlet__foot kt-portlet__foot--fit-x">
									<div class="kt-form__actions">
										<div class="row">
											<div class="col-lg-2"></div>
											<div class="col-lg-10">
												<button type="submit" class="btn btn-success">Submit</button>
												<button type="reset" class="btn btn-secondary">Cancel</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
					{{-- </form> --}}
				</div>
			</div>

			<!-- end:: Content -->
		</div>
		@endsection	