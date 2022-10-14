@extends('admin.layouts.master')
@section('title','Business Category Settings')
@section('content')
<div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Project Type</a></li>
						
					</ol>
                </div>
                <!-- row -->
                 <div class="row">
                    <div class="col-xl-12 col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Project Type:</h4>
                            </div>
                            <div class="card-body">
       
      @include('admin.partials.validation_error_box')
	
		
				<div class="kt-portlet__body">
@if(!empty($data))
						<form class="kt-form kt-form--label-right" method="post" action="{{ url('admin/business-category/'.$data->id) }}" enctype="multipart/form-data">
				{{ method_field('PUT') }}
				@csrf
@else
					<form class="kt-form kt-form--fit kt-form--label-right" action="{{ url('admin/business-category') }}" method="post"  enctype="multipart/form-data">
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
													<label class="col-xl-3 col-lg-3 col-form-label">Business Category </label>
													<div class="col-lg-9 col-xl-6">
														<input class="form-control" type="text" value="{{isset($data->business_category_name)?$data->business_category_name:'' }}" name="business_category_name">
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
												<button type="" class="btn btn-secondary"><a href="{{url('admin/business-category')}}">Cancel</a></button>
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