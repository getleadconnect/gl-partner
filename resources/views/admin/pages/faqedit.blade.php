@extends('admin.layouts.master')
@section('title','Faq ')
@section('content')

@include('admin.pages.partials.breadcrumb',['title'=>'Faq ','subtitle'=>'Edit Faq'])


<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
	<div class="kt-portlet kt-portlet--tabs">

		<div class="kt-portlet__body">
			<form action="{{ url('admin/faqs/update',$data->id) }}"  method="post" enctype="multipart/form-data">
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
												<h3 class="kt-section__title kt-section__title-sm">Faq </h3>
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
										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Image</label>
											<div class="col-lg-9 col-xl-6">
												<div class="kt-avatar kt-avatar--outline kt-avatar--circle-" id="kt_user_edit_avatar">
													<div class="kt-avatar__holder" style="background-image: url('assets/media/users/300_20.jpg');"></div>
													<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
														<i class="fa fa-pen"></i>
														<input type="file" name="image" accept=".png, .jpg, .jpeg">
													</label>
													<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
														<i class="fa fa-times"></i>
													</span>
												</div>
													@if( !empty($data->image))
											<img src="/images/faq/{{$data->image}}" style="height: 50px;width:50px">
											@endif
											</div>
										</div>
										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Category</label>
											<div class="col-lg-9 col-xl-6">
												<select class="form-control" name="category_id">
													<option value="{{$data->faq_category_id}}">{{$data->FaqCategory->title}}</option>
													@foreach($faqcategory as $faqcategory)
													<option value="{{$faqcategory->id}}">{{$faqcategory->title}}</option>
													@endforeach

												</select>
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
											<label class="col-xl-3 col-lg-3 col-form-label">Order</label>
											<div class="col-lg-9 col-xl-6">
												<input class="form-control" type="number"  name="order" value="{{$data->order}}" >
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
										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Featured</label>
											<div class="col-lg-9 col-xl-6">
												<span class="kt-switch">
													<label>
														<input type="checkbox" {{ $data->is_featured?'checked="checked"':'' }} name="is_featured" />
														
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