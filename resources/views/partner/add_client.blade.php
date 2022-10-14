@extends('admin.layouts.client_master')
@section('title','Client Settings')
@section('content')
<div class="content-body">
	<div class="container-fluid">
		<div class="page-titles">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0)">Client</a></li>
			</ol>
		</div>
		<div class="row">
			<div class="col-xl-12 col-xxl-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Client Setting:</h4>
					</div>

					<div class="card-body">   
      					@include('admin.partials.validation_error_box')

	      				@if(session()->has('message'))
						<div class="alert alert-danger alert-dismissible">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							{{ session()->get('message') }}
						</div>
						@endif

						<div class="kt-portlet__body">
						@if(!empty($data))
							<form class="kt-form kt-form--label-right" method="post" action="{{ url('partner/client/'.$data->id) }}" enctype="multipart/form-data">
							{{ method_field('PUT') }}
							@csrf
						@else
							<form class="kt-form kt-form--fit kt-form--label-right" action="{{ url('partner/client') }}" method="post"  enctype="multipart/form-data">
							{{ csrf_field() }}
						@endif                               
								<div class="tab-content">
									<div class="tab-pane active" id="kt_user_edit_tab_1" role="tabpanel">
										<div class="kt-form kt-form--label-right">
											<div class="kt-form__body">
												<div class="kt-section kt-section--first">
													<div class="kt-section__body">
														<div class="row">
															<label class="col-xl-3"></label>
															<div class="col-lg-9 col-xl-6">
															</div>
														</div>
														<div class="form-group row">
															<label class="col-xl-3 col-lg-3 col-form-label">Name</label>
															<div class="col-lg-9 col-xl-6">
																<input class="form-control" type="text" value="{{isset($data->name)?$data->name:'' }}" name="name">
															</div>
														</div>
														<div class="form-group row">
															<label class="col-xl-3 col-lg-3 col-form-label">Email</label>
															<div class="col-lg-9 col-xl-6">
																<input class="form-control" type="text" name="email"  value="{{isset($data->email)?$data->email:'' }}">
															</div>
														</div>
														<div class="form-group row">
															<label class="col-xl-3 col-lg-3 col-form-label"> Mobile Number</label>
															<div class="col-lg-9 col-xl-6">
																<input class="form-control" type="text"  name="mobile" value="{{isset($data->mobile)?$data->mobile:'' }}">
															</div>
														</div>
														<div class="form-group row">
															<label class="col-xl-3 col-lg-3 col-form-label">Company Name</label>
															<div class="col-lg-9 col-xl-6">
																<input class="form-control" type="text"  name="company_name"value="{{isset($data->company_name)?$data->company_name:'' }}">
															</div>
														</div>
														<div class="form-group row">
															<label class="col-xl-3 col-lg-3 col-form-label">Total Amount</label>
															<div class="col-lg-9 col-xl-6">
																<input class="form-control" type="text"  name="total_amount" value="{{isset($data->total_amount)?$data->total_amount:'' }}">
															</div>
														</div>
														@php
															$business_categories = DB::table('business_categories')->get();
														@endphp	
														<div class="form-group row">
															<label class="col-xl-3 col-lg-3 col-form-label">Business Category</label>
															<div class="col-lg-9 col-xl-6">												
																<select id="e1" name="business_category_id" class="form-control">
																	@if(!empty($data))
																		@foreach($business_categories as $business_categories)
																			<option value="{{ $business_categories->id }}" @if($data->business_category_id== $business_categories->id ) selected  @endif>{{ $business_categories->business_category_name }}</option>                              
																		@endforeach
																	@else
																		<option value="">Business Category</option>
																		@foreach($business_categories as $business_categories)
																			<option value="{{$business_categories->id}}">{{$business_categories->business_category_name}}</option>
																		@endforeach
																	@endif
																	<!-- <input class="form-control" type="text" value="{{isset($data->project_name)?$data->project_name:'' }}" name="project_name"> -->													
																</select>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-xl-3 col-lg-3 col-form-label">country</label>
															<div class="col-lg-9 col-xl-6">
																<input class="form-control" type="text"  name="country"value="{{isset($data->country)?$data->country:'' }}">
															</div>
														</div>
															<div class="form-group row">
															<label class="col-xl-3 col-lg-3 col-form-label">State</label>
															<div class="col-lg-9 col-xl-6">
																<input class="form-control" type="text"  name="state"value="{{isset($data->state)?$data->state:'' }}">
															</div>
														</div>
															<div class="form-group row">
															<label class="col-xl-3 col-lg-3 col-form-label">Area</label>
															<div class="col-lg-9 col-xl-6">
																<input class="form-control" type="text"  name="area"value="{{isset($data->area)?$data->area:'' }}">
															</div>
														</div>
															<div class="form-group row">
															<label class="col-xl-3 col-lg-3 col-form-label">Pincode</label>
															<div class="col-lg-9 col-xl-6">
																<input class="form-control" type="text"  name="pincode"value="{{isset($data->pincode)?$data->pincode:'' }}">
															</div>
														</div>
														<div class="form-group row">
															<label class="col-xl-3 col-lg-3 col-form-label">Address</label>
															<div class="col-lg-9 col-xl-6">
																<input class="form-control" type="text"  name="address"value="{{isset($data->address)?$data->address:'' }}">
															</div>
														</div>
														@if(!empty($data))
															<div class="form-group row">
																<label class="col-xl-3 col-lg-3 col-form-label">Status</label>
																<div class="col-lg-9 col-xl-6">
																	<span class="kt-switch">
																		<label>
																			<input type="checkbox" {{ $data->payment_status? 'checked="checked"':'' }} name="status" />
																			<span></span>
																		</label>
																	</span>
																</div>
															</div>
														@else
															<div class="form-group row">
																<label class="col-xl-3 col-lg-3 col-form-label">Status</label>
																<div class="col-lg-9 col-xl-6">
																	<span class="kt-switch">
																		<label>
																			<input type="checkbox" checked="checked" name="status" />
																			<span></span>
																		</label>
																	</span>
																</div>
															</div>
														@endif
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
														<button type="" class="btn btn-outline-light"><a href="{{url('partner/client')}}">Cancel</a></button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- end:: Content -->
	</div>
</div>
@endsection	