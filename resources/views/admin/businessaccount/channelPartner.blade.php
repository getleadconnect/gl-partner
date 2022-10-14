@extends('admin.layouts.master')
@section('content')
    <input type="hidden" id="view_message" value="{{ Session::get('message') }}">
    <!--begin:: Widgets/Stats-->
    <div class="kt-portlet">
        {{-- <div class="kt-portlet__body  kt-portlet__body--fit"> --}}
        {{-- <div class="row row-no-padding row-col-separator-lg">

                <div class="col-md-12 col-lg-3 col-xl-3"> --}}
        <!--begin::Total Profit-->
        {{-- <div class="kt-widget24">
                        <div class="kt-widget24__details">
                            <div class="kt-widget24__info">
                                <h4 class="kt-widget24__title">
                                    Total Clients
                                </h4>
                            </div>
                            <span class="kt-widget24__stats kt-font-brand">
                                {{ $client }}
                            </span>
                        </div>



                        <div class="kt-widget24__action">

                        </div>
                    </div> --}}

        <!--end::Total Profit-->
        {{-- </div>
                <div class="col-md-12 col-lg-3 col-xl-3"> --}}

        <!--begin::Amount Paid-->
        {{-- <div class="kt-widget24">
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
                    </div> --}}
        <!--end::New Feedbacks-->
        {{-- </div>
                <div class="col-md-12 col-lg-3 col-xl-3"> --}}

        <!--begin::Amount not Paid-->
        {{-- <div class="kt-widget24">
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
                    </div> --}}

        <!--end::Amount not Paid-->
        {{-- </div>
                <div class="col-md-12 col-lg-3 col-xl-3"> --}}

        <!--begin::Unpaid Clients-->
        {{-- <div class="kt-widget24">
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
                    </div> --}}

        <!--end::Unpaid Clients-->
        {{-- </div>
            </div> --}}
        {{-- </div> --}}
    </div>

    <!--end:: Widgets/Stats-->

    <!--Begin::Row-->
    {{-- <div class="row"> --}}
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
                            Channel Partner Table
                        </h3>

                    </div>
                    {{-- <div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-wrapper">
                                <div class="kt-portlet__head-actions">
                                    <a href="#" data-toggle="modal" data-target="#addModal"
                                        class="btn btn-brand btn-elevate btn-icon-sm">
                                        <i class="la la-plus"></i>
                                        Add New Client
                                    </a>
                                </div>
                            </div>
                        </div> --}}
                    <div class=" kt-portlet__head-title">
                        <div class="form-check form-switch">
                            <span class="kt-switch">
                                <label>
                                    <input type="checkbox" id="type_change" name="status">
                                    <span></span>
                                </label>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body">

                    <!--begin: Datatable -->
                    <table class="table table-striped- table-bordered table-hover table-checkable table-responsive" id="example">
                        <thead>
                            <tr id="channelPartner">
                                <th>Sl No.</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Company Name</th>
                                <th>Website</th>
                                <th>Team Size</th>
                                <th>Country</th>
                                <th>State</th>
                                <th>City</th>
                                <th>Pincode</th>
                                <th>Added On</th>

                            </tr>
                            <tr id="registered">
                                <th>Sl No.</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Company Name</th>
                                <th>Website</th>
                                <th>Team Size</th>
                                <th>Country</th>
                                <th>State</th>
                                <th>City</th>
                                <th>Pincode</th>
                                <th>Added On</th>
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
    {{-- <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
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

                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="recipient-name" class="form-control-label">Select Country</label>
                                <select placeholder="Country" name="country" id="country" class="form-control">
                                    <option value="0" selected disabled>Select Country
                                    </option>

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
        </div> --}}
    <!--End::Row-->
    @push('scripts')
        <script>
            $(document).ready(function() {
                var BaseUrl = location.origin;
                $('#registered').hide();

                $('#type_change').on('change', function() {
                    if ($(this).is(':checked')) {
                        $('#channelPartner').hide();
                        $('#registered').show();
                        var productCatDataTable = $('#example').DataTable({

                            processing: true,
                            responsive: false,
                            serverSide: true,
                            bDestroy: true,
                            scrollX: true,

                            order: [
                                [0, 'desc']
                            ],
                            "pageLength": 10,
                            columnDefs: [
                                {
                                    targets: -1,
                                    title: 'Actions',
                                    orderable: true,
                                    render: function(data, type, full, meta) {
                                        if (full.email_verified_at === null) {
                                            return `
						<p>Email is not Verified</p>
						`;
                                        } else {
                                            return `
						<button class="btn btn-info" onclick="deleteConfirmation(` + full.id + `)">Approve</button>
						`;
                                        }
                                    },
                                },
                            ],
                            "ajax": {
                                "url": "businessregistrationlist",
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
                                    data: 'mobile',
                                    name: 'mobile'
                                },
                                {
                                    data: 'email',
                                    name: 'email'
                                },

                                {
                                    data: 'company_name',
                                    name: 'company_name'
                                },

                                {
                                    data: 'website',
                                    name: 'website'
                                },

                                {
                                    data: 'team_size',
                                    name: 'team_size'
                                },

                                {
                                    data: 'country',
                                    name: 'country'
                                },

                                {
                                    data: 'state',
                                    name: 'state'
                                },
                                {
                                    data: 'city',
                                    name: 'city'
                                },
                                {
                                    data: 'pin_code',
                                    name: 'pin_code'
                                },
                                {
                                    data: 'created_at',
                                    name: 'created_at'
                                },
                            ]
                        });
                    } else {
                        $('#channelPartner').show();
                        $('#registered').hide();
                        var productCatDataTable = $('#example').DataTable({

                            processing: true,
                            responsive: false,
                            serverSide: true,
                            bDestroy: true,
                            order: [
                                [0, 'desc']
                            ],
                            "pageLength": 10,
                            "ajax": {
                                "url": "channel-partnerlist",
                                "type": "GET"
                            },
                            columnDefs: [ {
                                    targets: 3,
                                    render: function ( data, type, row ) {
                                        return type === 'display' && data.length > 10 ?
                                            data.substr( 0, 10 ) +'…' :
                                            data;
                                    }
                            },
                            {
                                    targets: 2,
                                    render: function ( data, type, row ) {
                                        return type === 'display' && data.length > 10 ?
                                            data.substr( 0, 10 ) +'…' :
                                            data;
                                    }
                            }],
                            columns: [{
                                    data: 'id',
                                    name: 'id'
                                },
                                {
                                    data: 'name',
                                    name: 'name'
                                },

                                {
                                    data: 'mobile',
                                    name: 'mobile'
                                },
                                {
                                    data: 'email',
                                    name: 'email'
                                },

                                {
                                    data: 'channel_partner.company_name' ?? null,
                                    name: 'company_name'
                                },

                                {
                                    data: 'channel_partner.website' ?? null,
                                    name: 'website'
                                },

                                {
                                    data: 'channel_partner.team_size' ?? null,
                                    name: 'team_size'
                                },

                                {
                                    data: 'channel_partner.country',
                                    name: 'country'
                                },

                                {
                                    data: 'channel_partner.state' ?? null,
                                    name: 'state'
                                },
                                {
                                    data: 'channel_partner.city' ?? null,
                                    name: 'city'
                                },
                                {
                                    data: 'channel_partner.pin_code' ?? null,
                                    name: 'pin_code'
                                },
                                {
                                    data: 'created_at',
                                    name: 'created_at'
                                },
                            ]
                        });
                    }
                })

                var productCatDataTable = $('#example').DataTable({
                    processing: true,
                    responsive: false,
                    serverSide: true,
                    bDestroy: true,
                    order: [
                        [0, 'desc']
                    ],
                    "pageLength": 10,
                    "ajax": {
                        "url": "channel-partnerlist",
                        "type": "GET"
                    },
                    columnDefs: [ {
                            targets: 3,
                            render: function ( data, type, row ) {
                                return type === 'display' && data.length > 10 ?
                                    data.substr( 0, 10 ) +'…' :
                                    data;
                            }
                    }],
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },

                        {
                            data: 'mobile',
                            name: 'mobile'
                        },
                        {
                            data: 'email',
                            name: 'email'
                        },

                        {
                            data: 'channel_partner.company_name' ?? null,
                            name: 'company_name'
                        },

                        {
                            data: 'channel_partner.website' ?? null,
                            name: 'website'
                        },

                        {
                            data: 'channel_partner.team_size' ?? null,
                            name: 'team_size'
                        },

                        {
                            data: 'channel_partner.country' ?? null,
                            name: 'country'
                        },

                        {
                            data: 'channel_partner.state' ?? null,
                            name: 'state'
                        },
                        {
                            data: 'channel_partner.city' ?? null,
                            name: 'city'
                        },
                        {
                            data: 'channel_partner.pin_code' ?? null,
                            name: 'pin_code'
                        },
                        {
                            data: 'created_at',
                            name: 'created_at'
                        },
                    ]
                });
            });



            function deleteConfirmation(id) {
                    swal({
                        title: "Add to Channel Partner?",
                        text: "Please ensure and then confirm!",
                        type: "success",
                        showCancelButton: !0,
                        confirmButtonText: "Yes, Add to Channel Partner!",
                        cancelButtonText: "No, cancel!",
                        reverseButtons: !0
                    }).then(function(e) {
                        if (e.value === true) {
                            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                            $.ajax({
                                type: 'GET',
                                url: "{{ url('/admin/addto-channel') }}/" + id,
                                data: {
                                    _token: CSRF_TOKEN
                                },
                                dataType: 'JSON',
                                success: function(results) {
                                    if (results.success === true) {
                                        $('#example').DataTable().ajax.reload();
                                        swal("Done!", results.message, "success");
                                    } else {
                                        swal("Error!", results.message, "error");
                                    }
                                }
                            });
                        } else {
                            e.dismiss;
                        }
                    }, function(dismiss) {
                        return false;
                    })
                }

            $(document).ready(function() {
                var mes = $('#view_message').val().split('#');
                if (mes[0] == "success") {
                    toastr.success(mes[1]);
                } else if (mes[0] == "danger") {
                    toastr.error(mes[1]);
                }
            });
        </script>
    @endpush
@endsection
