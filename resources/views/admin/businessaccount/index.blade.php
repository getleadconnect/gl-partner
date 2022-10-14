@extends('admin.layouts.master')
@section('title', 'Business Account Settings')
@section('content')
    <input type="hidden" id="view_message" value="{{ Session::get('message') }}">
    <!--begin:: Widgets/Stats-->
    <div class="kt-portlet">
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
                                Business Account Table
                            </h3>
                        </div>

                    </div>
                    <div class="kt-portlet__body">

                        <!--begin: Datatable -->
                        <table class="table table-striped- table-bordered table-hover table-checkable" id="example">
                            <thead>
                                <tr>
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
        @push('scripts')
            <script>
                var productCatDataTable = $('#example').DataTable({
                    processing: true,
                    responsive: false,
                    serverSide: true,
                    bDestroy: true,
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
						<a class="btn btn-info" onclick="deleteConfirmation(` + full.id + `)">Approve</a>
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
                            data: 'channel_partner.country',
                            name: 'channel_partner.country'
                        },

                        {
                            data: 'channel_partner.state',
                            name: 'channel_partner.state'
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
