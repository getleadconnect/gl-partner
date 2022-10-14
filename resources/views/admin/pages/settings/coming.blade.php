@extends('admin.layouts.master')
@section('title','Site Settings')
@section('content')

	@include('admin.pages.partials.breadcrumb',['title'=>'Coming Soon page Settings','subtitle'=>'Edit Coming Soon page  details'])
		

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
									</svg> Coming Soon Page
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
					<form class="kt-form kt-form--fit kt-form--label-right" action="{{ url('admin/comming-soon') }}" method="post"  enctype="multipart/form-data">
                                {{ csrf_field() }}
						<div class="tab-content">
							<div class="tab-pane active" id="kt_user_edit_tab_1" role="tabpanel">
								<div class="kt-form kt-form--label-right">
									<div class="kt-form__body">
										<div class="kt-section kt-section--first">
											<div class="kt-section__body">
												<div class="row">
													<label class="col-xl-3"></label>
													<div class="col-lg-9 col-xl-6">
														<h3 class="kt-section__title kt-section__title-sm">Coming Soon Setting:</h3>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label">Background Image</label>
													<div class="col-lg-9 col-xl-6">
															<div class="kt-avatar kt-avatar--outline kt-avatar--circle-" id="kt_user_edit_avatar">
												<div class="kt-avatar__holder" style="background-image: url('assets/media/users/300_20.jpg');"></div>
												<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
													<i class="fa fa-pen"></i>
													<input type="file" name="background_image" value="{{isset($data->background_image)?$data->background_image:'' }}">
												</label>
												<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
													<i class="fa fa-times"></i>
												</span>
											</div>
											@if( !empty($data->background_image))
											<img src="/images/commingsoon/{{$data->background_image}}" style="height: 50px;width:50px">
											@endif
													</div>
												</div>
												<div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label">Page Title</label>
													<div class="col-lg-9 col-xl-6">
                                                      
														<input class="form-control" type="text"  name="page_tile" value="{{isset($data->page_tile)?$data->page_tile:'' }}">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label">Button Text</label>
													<div class="col-lg-9 col-xl-6">
														<input class="form-control" type="text"  name="button_text" value="{{isset($data->button_text)?$data->button_text:'' }}">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label">Counter One</label>
													<div class="col-lg-9 col-xl-6">
														<input class="form-control" type="text"  name="one" value="{{isset($data->one)?$data->one:'' }}">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label">Counter one Text</label>
													<div class="col-lg-9 col-xl-6">
														<input class="form-control" type="text" name="one_text" value="{{isset($data->one_text)?$data->one_text:'' }}"
											>
													</div>
												</div>
												
												<div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label">Counter Two</label>
													<div class="col-lg-9 col-xl-6">
														<input class="form-control" type="text"  name="two" value="{{isset($data->two)?$data->two:'' }}">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label">Counter Two Text</label>
													<div class="col-lg-9 col-xl-6">
														<input class="form-control" type="text"  name="two_text" value="{{isset($data->two_text)?$data->two_text:'' }}"
											>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label">Counter Three </label>
													<div class="col-lg-9 col-xl-6">
														<input class="form-control" type="text"  name="three" value="{{isset($data->three)?$data->three:'' }}">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label">Counter Three Text</label>
													<div class="col-lg-9 col-xl-6">
														<input class="form-control" type="text"  name="three_text" value="{{isset($data->three_text)?$data->three_text:'' }}"
											>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label">Counter Four </label>
													<div class="col-lg-9 col-xl-6">
														<input class="form-control" type="text"  name="four" value="{{isset($data->four)?$data->four:'' }}">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-xl-3 col-lg-3 col-form-label">Counter Four Text</label>
													<div class="col-lg-9 col-xl-6">
														<input class="form-control" type="text"  name="four_text" value="{{isset($data->four_text)?$data->four_text:'' }}"
											>
													</div>
												</div>
												<div class="form-group row">
												<label class="col-xl-3 col-lg-3 col-form-label">Status</label>
												<div class="col-lg-3">
											<div class="kt-input-icon">
												<span class="kt-switch">
												<label>
														@if(empty($data))
														
														 <input type="checkbox" checked="checked"  name="status" />
                                                        @else

                                                        <input type="checkbox" {{($data->status)?'checked="checked"':'' }}  name="status" />
														@endif
													
														<span></span>
													</label>
												</span>
											
											</div>
									
										</div>
												</div>
												
												
												
											</div>
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
					</form>
				</div>
			</div>

		<!-- end:: Content -->
	</div>
@endsection	