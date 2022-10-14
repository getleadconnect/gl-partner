@extends('admin.layouts.master')
@section('title','Faq Category')
@section('content')

@include('admin.pages.partials.breadcrumb',['title'=>'Faq Category','subtitle'=>'Edit Faq Category'])


<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
	<div class="kt-portlet kt-portlet--tabs">

		<div class="kt-portlet__body">
			<form action="{{ url('admin/faqs-category/update',$data->id) }}"  method="post" enctype="multipart/form-data">
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
												<h3 class="kt-section__title kt-section__title-sm">Faq Category</h3>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Title</label>
											<div class="col-lg-9 col-xl-6">
												<input class="form-control" type="text" value="{{$data->title}}" name="title">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Description</label>
											<div class="col-lg-9 col-xl-6">
												<textarea class="form-control" name="description" value="">{{$data->description}}</textarea>
											</div>
										</div>

                             		<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Status</label>
											<div class="col-lg-9 col-xl-6">
												<span class="kt-switch">
													<label>
														<input type="checkbox" {{ $data->status?'checked="checked"':'' }} name="status" />
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
			</form>
		</div>
	</div>

	<!-- end:: Content -->
</div>
@endsection	