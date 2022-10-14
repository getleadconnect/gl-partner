@extends('admin.layouts.master')
@section('title', 'Client Settings')
@section('content')
    <input type="hidden" id="view_message" value="{{ Session::get('message') }}">
    <div class="content-body">
        <div class="container-fluid">
            {{-- <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Client</a></li>

					</ol>
                </div> --}}
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card" style="padding: 1%;">
                        <div class="card-header">
                            <h4 class="card-title">Client Setting:</h4>
                        </div>
                        <div class="card-body text-left">

                            {{-- @include('admin.partials.validation_error_box')
                            @if (session()->has('message'))
                                <div class="alert alert-danger alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ session()->get('message') }}
                                </div>
                            @endif --}}


                            <div class="kt-portlet__body">
                                @if (!empty($data))
                                    <form class="kt-form kt-form--label-right" method="post"
                                        action="{{ url('admin/client/' . $data->id) }}" enctype="multipart/form-data">
                                        {{ method_field('PUT') }}
                                        @csrf
                                    @else
                                        <form class="kt-form kt-form--fit kt-form--label-right"
                                            action="{{ url('admin/client') }}" method="post" enctype="multipart/form-data">
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
                                                                <input class="form-control" type="text"
                                                                    value="{{ old('name') }}" name="name" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Email</label>
                                                            <div class="col-lg-9 col-xl-6">
                                                                <input class="form-control" type="text" name="email"
                                                                    value="{{ old('email') }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label"> Mobile
                                                                Number</label>
                                                            <div class="col-lg-9 col-xl-6">
                                                                <input class="form-control" type="text" name="mobile"
                                                                    value="{{ old('mobile') }}" required>
                                                            </div>
                                                        </div>
                                                        {{-- <!-- <div class="form-group row">
                         <label class="col-xl-3 col-lg-3 col-form-label">Location</label>
                         <div class="col-lg-9 col-xl-6">
                          <input class="form-control" type="text"  name="location"value="{{ old('location') }}"
                       >
                         </div>
                        </div> --> --}}
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Company
                                                                Name</label>
                                                            <div class="col-lg-9 col-xl-6">
                                                                <input class="form-control" type="text"
                                                                    name="company_name"value="{{ old('company_name') }}">
                                                            </div>
                                                        </div>
                                                        @php
                                                            $business_categories = DB::table('business_categories')->get();

                                                        @endphp

                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Business
                                                                Category</label>
                                                            <div class="col-lg-9 col-xl-6">

                                                                <select id="e1" name="business_category_id"
                                                                    class="form-control">
                                                                    @if (!empty($data))
                                                                        @php
                                                                            $business_category = DB::table('clients')
                                                                                ->where('business_category_id', '=', $data->client->business_category_id)
                                                                                ->where('user_id', $data->id)
                                                                                ->first();
                                                                        @endphp

                                                                        @foreach ($business_categories as $business_categories)
                                                                            <option value="{{ $business_categories->id }}"
                                                                                @if ($business_category->business_category_id == $business_categories->id) selected @endif>
                                                                                {{ $business_categories->business_category_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    @else
                                                                        <option value="">Business Category</option>
                                                                        @foreach ($business_categories as $business_categories)
                                                                            <option value="{{ $business_categories->id }}">
                                                                                {{ $business_categories->business_category_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    @endif
                                                                    {{-- <!-- <input class="form-control" type="text" value="{{ old('project_name') }}" name="project_name"> --> --}}

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">country</label>
                                                            <div class="col-lg-9 col-xl-6">
                                                                {{-- <input class="form-control" type="text"
                                                                    name="country"value="{{ old('country') }}"> --}}
                                                                {{-- <label for="exampleInputEmail1" id="form-name">Country</label> --}}

                                                                <select placeholder="Country" name="country" id="country"
                                                                    class="form-control">
                                                                    <option value="0" selected disabled>Select Country
                                                                    </option>
                                                                    @foreach ($countries as $key => $countries)
                                                                        <option value="{{ $key }}">
                                                                            {{ $countries }}</option>
                                                                    @endforeach

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 ">State</label>
                                                            <div class="col-lg-9 col-xl-6">
                                                                <input class="form-control" type="text"
                                                                    name="state"value="{{ old('state') }}">
                                                                {{-- <select placeholder="State" name="state" id="state" class="form-control">
                                                                        <option value="0" selected >Select State</option>
                                                                    </select> --}}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Area</label>
                                                            <div class="col-lg-9 col-xl-6">
                                                                <input class="form-control" type="text"
                                                                    name="area"value="{{ old('area') }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Pincode</label>
                                                            <div class="col-lg-9 col-xl-6">
                                                                <input class="form-control" type="text"
                                                                    name="pincode"value="{{ old('pincode') }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">Address</label>
                                                            <div class="col-lg-9 col-xl-6">
                                                                <input class="form-control" type="text"
                                                                    name="address"value="{{ old('address') }}">
                                                            </div>
                                                        </div>
                                                        @if (!empty($data))
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-xl-3 col-lg-3 col-form-label">Status</label>
                                                                <div class="col-lg-9 col-xl-6">
                                                                    <span class="kt-switch">
                                                                        <label>
                                                                            <input type="checkbox"
                                                                                {{ $data->status ? 'checked="checked"' : '' }}
                                                                                name="status" />
                                                                            <span></span>
                                                                        </label>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-xl-3 col-lg-3 col-form-label">Status</label>
                                                                <div class="col-lg-9 col-xl-6">
                                                                    <span class="kt-switch">
                                                                        <label>
                                                                            <input type="checkbox" checked="checked"
                                                                                name="status" />
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
                                                <div class="col-lg-7"></div>
                                                <div class="col-lg-5">
                                                    <button type="submit" class="btn btn-success">Submit</button>
                                                    <button class="btn btn-outline-danger"><a
                                                            href="{{ url('admin/client') }}">Cancel</a></button>
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
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            $(document).ready(function(e) {
                $('#mySelect2').trigger('change.select2');
                var BaseUrl = location.origin;
                $('#country').on('change', function() {
                    // $("#state").empty();
                    var country = $('#country').val();
                    $.ajax({
                        url: BaseUrl + '/state/' + country,
                        success: function(data) {
                            console.log(data);
                            $.each(data.states, function(key, value) {
                                $('#state').append($("<option></option>").attr("value", key)
                                    .text(value));
                            });
                        }
                    })
                })
            });
        </script>
    @endpush
@endsection
