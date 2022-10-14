@extends('admin.layouts.master')
@section('title', 'Project Settings')
@section('content')
    <input type="hidden" id="view_message" value="{{ Session::get('message') }}">
    <!--begin:: Widgets/Stats-->
    <div class="kt-portlet">
        {{-- <div class="kt-portlet__body  kt-portlet__body--fit">
            <div class="row row-no-padding row-col-separator-lg">
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
                                0
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
                                0
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
                                0
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
                                0
                            </span>
                        </div>
                        <div class="kt-widget24__action">
                        </div>
                    </div> --}}

        <!--end::Unpaid Clients-->
        {{-- </div>
            </div>
        </div> --}}
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
                                Purpose Table
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-wrapper">
                                <div class="kt-portlet__head-actions">
                                    <a href="#" data-toggle="modal" data-target="#addProjectModal"
                                        class="btn btn-brand btn-elevate btn-icon-sm">
                                        <i class="la la-plus"></i>
                                        Add New Purpose
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
                                    <th>Purpose Name</th>
                                    <th>Description</th>
                                    <th>Purpose Type</th>
                                    <th>Purpose Value</th>
                                    <th>Purpose Owner</th>
                                    <th>Purpose Status</th>
                                    <th>Added on</th>
                                    <th>Action</th>
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
        <div class="modal fade" id="addProjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add Purpose</h5>
                        <button type="button" class="close form-close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <form class="kt-form kt-form--label-right" id="addForm" name="addForm" method="post"
                        action="{{ url('admin/project') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Enter Purpose Name<span
                                        style="color: red;">*</span></label>
                                <input type="text" class="form-control" placeholder="Enter Purpose Name"
                                    value="{{ old('project_name') }}" name="project_name" id="project_name" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Description<span
                                        style="color: red;">*</span></label>
                                <textarea class="form-control" name="description" id="description" placeholder="Please Enter description" required>{{ old('description') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Select Purpose Type<span
                                        style="color: red;">*</span></label>
                                <select id="e1" name="project_type" class="form-control" required>
                                    <option value="0" selected disabled>Select Purpose Types</option>
                                    @foreach ($project_types as $project_types)
                                        <option value="{{ $project_types->id }}">{{ $project_types->project_type }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Purpose Value<span
                                        style="color: red;">*</span></label>
                                <input type="text" class="form-control" placeholder="Enter Purpose Value"
                                    value="{{ old('project_value') }}" name="project_value" id="project_value" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Select Purpose Owners<span
                                        style="color: red;">*</span></label>
                                <select id="e1" name="project_owners" class="form-control" required>
                                    <option value="0" selected disabled>Select Purpose Owners</option>
                                    @foreach ($project_owners as $project_owners)
                                        <option value="{{ $project_owners->id }}"> {{ $project_owners->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Select Purpose  Status<span
                                        style="color: red;">*</span></label>
                                <select id="e1" name="project_statuses" class="form-control" required>
                                    <option value="0" selected disabled>Select Purpose Status</option>
                                    @foreach ($project_statuses as $project_statuses)
                                        <option value="{{ $project_statuses->id }}">{{ $project_statuses->status }}
                                        </option>
                                    @endforeach
                                </select>
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
        {{-- <style type="text/css">
            .swal2-icon .swal2-icon-content {
                font-size: 1.75em;
            }

            .swal2-icon {
                width: 3em !important;
                height: 3em !important;
            }

            .swal2-title {
                font-size: 1.6em !important;
            }

            .swal2-content,
            .swal2-html-container {
                font-size: 1.15em !important;
            }

            .swal2-icon.swal2-success [class^=swal2-success-line][class$=tip] {
                top: 1.9em;
                left: 0.3em;
                width: 1.1em;
            }

            .swal2-icon.swal2-success [class^=swal2-success-line][class$=long] {
                top: 1.475em;
                right: 0.3em;
                width: 1.7em;
            }

            .swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=left] {
                left: 0.4625em;
            }

            .swal2-icon.swal2-error [class^=swal2-x-mark-line] {
                top: 1.3125em;
                width: 2.1375em;
                height: 0.3125em;
            }

            .swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=right] {
                right: 0.4em;
            }
        </style> --}}
        @push('scripts')
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
            <style type="text/css">
                .swal2-icon .swal2-icon-content {
                    font-size: 1.75em;
                }

                .swal2-icon {
                    width: 3em !important;
                    height: 3em !important;
                }

                .swal2-title {
                    font-size: 1.6em !important;
                }

                .swal2-content,
                .swal2-html-container {
                    font-size: 1.15em !important;
                }

                .swal2-icon.swal2-success [class^=swal2-success-line][class$=tip] {
                    top: 1.9em;
                    left: 0.3em;
                    width: 1.1em;
                }

                .swal2-icon.swal2-success [class^=swal2-success-line][class$=long] {
                    top: 1.475em;
                    right: 0.3em;
                    width: 1.7em;
                }

                .swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=left] {
                    left: 0.4625em;
                }

                .swal2-icon.swal2-error [class^=swal2-x-mark-line] {
                    top: 1.3125em;
                    width: 2.1375em;
                    height: 0.3125em;
                }

                .swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=right] {
                    right: 0.4em;
                }
            </style>

            <script>
                var productCatDataTable = $('#example').DataTable({
                    processing: true,
                    responsive: true,
                    serverSide: true,
                    bDestroy: true,
                    "pageLength": 50,
                    order: [
                        [0, 'desc']
                    ],
                    columnDefs: [


                        {
                            targets: -1,
                            title: 'Actions',
                            orderable: true,
                            render: function(data, type, full, meta) {
                                return `

                            <div class="d-grid gap-2 d-md-flex" >
    <button type="button" class="btn btn-info" style="margin-right :3%;" onclick="window.location='{{ url('project/` + full.id + `/edit') }}'">Edit</button>
    <button type="button" class="btn btn-danger" onclick="deleteConfirmation(` + full.id + `)">Delete</button>
 </div>
						`;
                            },
                        },
                    ],
                    "ajax": {
                        "url": "projectlist",
                        "type": "GET"
                    },
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'project_name',
                            name: 'project_name'
                        },
                        {
                            data: 'description',
                            name: 'description'
                        },
                        {
                            data: 'project_type.project_type',
                            name: 'project_type.project_type'
                        },
                        {
                            data: 'project_value',
                            name: 'project_value'
                        },
                        {
                            data: 'project_owner.name',
                            name: 'project_owner.name'
                        },
                        {
                            data: 'project_status.status',
                            name: 'project_status.status'
                        },
                        {
                            data: 'created_at',
                            name: 'created_at'
                        },
                    ]
                });

                function deleteConfirmation(id) {
                    swal.fire({
                        title: "Delete?",
                        text: "Please ensure and then confirm!",
                        type: "warning",
                        showCancelButton: !0,
                        confirmButtonText: "Yes, delete it!",
                        cancelButtonText: "No, cancel!",
                        reverseButtons: !0
                    }).then(function(e) {
                        if (e.value === true) {
                            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                            $.ajax({
                                type: 'GET',
                                url: "{{ url('/admin/projectdelete') }}/" + id,
                                data: {
                                    _token: CSRF_TOKEN
                                },
                                dataType: 'JSON',
                                success: function(results) {
                                    if (results.success === true) {
                                        $('#example').DataTable().ajax.reload();
                                        swal.fire("Done!", results.message, "success");
                                    } else {
                                        swal.fire("Error!", results.message, "error");
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

                $(function() {
                    $("form[name='addForm']").validate({
                        rules: {
                            project_name: "required",
                            description: {
                                required: true,
                            },
                            project_type: {
                                required: true,
                            },
                            project_value: "required",
                            project_owners: "required",
                            project_statuses: "required",
                        },
                        messages: {
                            project_name: "Please enter Project name",
                            description: "Please enter Description",
                            project_type: "Please Select Project Type",
                            project_value: "Please Enter Project Value",
                            project_owners: "Please Select Project Owner",
                            project_statuses: "Please Select Project Status",
                        },
                        submitHandler: function(form) {
                            form.submit();
                        }
                    });
                });

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
