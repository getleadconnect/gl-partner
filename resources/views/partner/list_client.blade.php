@extends('admin.layouts.client_master')
@section('content')
    <input type="hidden" id="view_message" value="{{ Session::get('message') }}">
    <!--begin:: Widgets/Stats-->
    <div class="kt-portlet">
        <div class="kt-portlet__body  kt-portlet__body--fit">
            <div class="row row-no-padding row-col-separator-lg">

                <div class="col-md-12 col-lg-3 col-xl-3">
                    <!--begin::Total Profit-->
                    <div class="kt-widget24">
                        <div class="kt-widget24__details">
                            <div class="kt-widget24__info">
                                <h4 class="kt-widget24__title">
                                    Total Clients
                                </h4>
                                {{-- <span class="kt-widget24__desc">
                                All Customs Value
                            </span> --}}
                            </div>
                            <span class="kt-widget24__stats kt-font-brand">
                                {{ $client }}
                            </span>
                        </div>



                        <div class="kt-widget24__action">

                        </div>
                    </div>

                    <!--end::Total Profit-->
                </div>
                <div class="col-md-12 col-lg-3 col-xl-3">

                    <!--begin::Amount Paid-->
                    <div class="kt-widget24">
                        <div class="kt-widget24__details">
                            <div class="kt-widget24__info">
                                <h4 class="kt-widget24__title">
                                    Amount Paid
                                </h4>

                            </div>
                            <span class="kt-widget24__stats kt-font-warning">
                                {{ $amount_paid }}
                            </span>
                        </div>

                        <div class="kt-widget24__action">

                        </div>
                    </div>
                    <!--end::New Feedbacks-->
                </div>
                <div class="col-md-12 col-lg-3 col-xl-3">

                    <!--begin::Amount not Paid-->
                    <div class="kt-widget24">
                        <div class="kt-widget24__details">
                            <div class="kt-widget24__info">
                                <h4 class="kt-widget24__title">
                                    Amount not Paid
                                </h4>
                            </div>
                            <span class="kt-widget24__stats kt-font-danger">
                                {{ $amount_not_paid }}
                            </span>
                        </div>
                        <div class="kt-widget24__action">
                        </div>
                    </div>

                    <!--end::Amount not Paid-->
                </div>
                <div class="col-md-12 col-lg-3 col-xl-3">

                    <!--begin::Unpaid Clients-->
                    <div class="kt-widget24">
                        <div class="kt-widget24__details">
                            <div class="kt-widget24__info">
                                <h4 class="kt-widget24__title">
                                    Unpaid Clients
                                </h4>
                            </div>
                            <span class="kt-widget24__stats kt-font-success">
                                {{ $unpaid_client }}
                            </span>
                        </div>
                        <div class="kt-widget24__action">
                        </div>
                    </div>

                    <!--end::Unpaid Clients-->
                </div>
            </div>
        </div>
    </div>

    <!--end:: Widgets/Stats-->

    <!--Begin::Row-->
    <div class="row">
        <div class="col-xl-12">

            <!--begin:: Widgets/Sale Reports-->
            <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

                <div class="kt-portlet kt-portlet--mobile">
                    <div class="kt-portlet__head kt-portlet__head--lg">
                        <div class="kt-portlet__head-label">
                            <span class="kt-portlet__head-icon">
                                <i class="kt-font-brand flaticon2-line-chart"></i>
                            </span>
                            <h3 class="kt-portlet__head-title">
                                Client Table
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-wrapper">
                                <div class="kt-portlet__head-actions">
                                    <a href="#" data-toggle="modal" data-target="#addModal"
                                        class="btn btn-brand btn-elevate btn-icon-sm">
                                        <i class="la la-plus"></i>
                                        {{-- {{ url('admin/client/create') }} --}}
                                        Add New Client
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body">

                        <!--begin: Datatable -->
                        <table class="table table-striped- table-bordered table-hover table-checkable" id="example">
                            <thead>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile Number</th>
                                    <th>Status</th>
                                    <th>Added on</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        </table>

                        <!--end: Datatable -->
                    </div>
                </div>
            </div>

            <!--end:: Widgets/Sale Reports-->
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add Clients</h5>
                        <button type="button" class="close form-close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <form class="kt-form kt-form--label-right" id="addForm" name="addForm" method="post"
                        action="{{ url('admin/client') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row modal-body">
                            <div class="col-md-6 form-group">
                                <label for="recipient-name" class="form-control-label">Enter Name<span
                                        style="color: red;">*</span></label>
                                <input type="text" class="form-control" placeholder="Enter Name"
                                    value="{{ old('name') }}" name="name" id="name" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="recipient-name" class="form-control-label">Enter Email<span
                                        style="color: red;">*</span></label>
                                <input type="text" class="form-control" placeholder="Enter Email"
                                    value="{{ old('email') }}" name="email" id="email" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="recipient-name" class="form-control-label">Enter Mobile Number<span
                                        style="color: red;">*</span></label>
                                <input type="number" class="form-control" placeholder="Enter Mobile Number"
                                    value="{{ old('mobile') }}" name="mobile" id="mobile" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="recipient-name" class="form-control-label">Enter Company Name</label>
                                <input type="text" class="form-control" placeholder="Enter Company Name"
                                    value="{{ old('company_name') }}" name="company_name" id="company_name">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="recipient-name" class="form-control-label">Select Business Category</label>
                                <select id="e1" name="business_category_id" class="form-control">
                                    <option value="">Business Category</option>
                                    @foreach ($business_categories as $business_categories)
                                        <option value="{{ $business_categories->id }}">
                                            {{ $business_categories->business_category_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="recipient-name" class="form-control-label">Select Country</label>
                                <select placeholder="Country" name="country" id="country" class="form-control">
                                    <option value="0" selected disabled>Select Country
                                    </option>
                                    @foreach ($countries as $key => $countries)
                                        <option value="{{ $key }}">
                                            {{ $countries }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="recipient-name" class="form-control-label">Select State</label>
                                <select placeholder="State" name="state" id="state" class="form-control">
                                    <option value="0" selected disabled>Select State</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="recipient-name" class="form-control-label">Enter Area</label>
                                <input type="text" class="form-control" placeholder="Enter Area"
                                    value="{{ old('area') }}" name="area" id="area">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="recipient-name" class="form-control-label">Enter Pincode</label>
                                <input type="text" class="form-control" placeholder="Enter Pincode"
                                    value="{{ old('pincode') }}" name="pincode" id="pincode">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="recipient-name" class="form-control-label">Enter Address</label>
                                <textarea class="form-control" name="address" id="address" placeholder="Please Enter Address">{{ old('address') }}</textarea>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" id="addClientSubmit"
                                data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--End::Row-->
        @push('scripts')
            <script>
                var clientDatatable = $('#example').DataTable({
                    processing: true,
                    responsive: true,
                    serverSide: true,
                    bDestroy: true,
                    "pageLength": 50,
                    order: [
                        [0, 'desc']
                    ],
                    columnDefs: [{
                            targets: -2,
                            orderable: true,
                            render: function(data, type, full, meta) {
                                var status = {
                                    1: {
                                        'title': 'Active',
                                        'class': ' badge light badge-success'
                                    },
                                    0: {
                                        'title': 'Inactive',
                                        'class': 'badge light badge-warning'
                                    },
                                    2: {
                                        'title': 'Pending',
                                        'class': 'badge light badge-danger'
                                    },
                                };
                                console.log(data);
                                if (typeof status[data] === 'undefined') {
                                    return data;
                                }
                                return '<span class="kt-badge ' + status[data].class +
                                    ' kt-badge--inline kt-badge--pill">' + status[data].title + '</span>';
                            },
                        },
                        {
                            targets: -1,
                            title: 'Actions',
                            orderable: true,
                            render: function(data, type, full, meta) {
                                return `
						<a class="btn btn-info" href="client/` + full.id + `/edit" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Edit Details">
						<i class="la la-edit"></i>Edit
						</a>`;
                            },
                        },
                    ],
                    "ajax": {
                        "url": "list_client",
                        "type": "GET"
                    },
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'email',
                            name: 'email'
                        },
                        {
                            data: 'mobile',
                            name: 'mobile'
                        },
                        {
                            data: 'commission_amount',
                            name: 'commission_amount'
                        },
                        {
                            data: 'payment_status',
                            name: 'status'
                        },
                        {
                            data: 'created_at',
                            name: 'created_at'
                        },
                    ]
                });
            </script>
        @endpush
    @endsection
