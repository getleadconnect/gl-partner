@extends('admin.layouts.master')
@section('title', 'Project Type Settings')
@section('content')
    <input type="hidden" id="view_message" value="{{ Session::get('message') }}">
    <!--begin:: Widgets/Stats-->
    <div class="kt-portlet">
        <div class="kt-portlet__body  kt-portlet__body--fit">

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
                                Product/Service Table
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-wrapper">
                                <div class="kt-portlet__head-actions">
                                    <a href="#" data-toggle="modal" data-target="#addModal"
                                        class="btn btn-brand btn-elevate btn-icon-sm">
                                        <i class="la la-plus"></i>
                                        Add New Product/Service
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
                                    <th>Plan Name</th>
                                    <th>Type</th>
                                    <th>Users</th>
                                    <th>Months</th>
                                    <th>Price</th>
                                    <th>Added By</th>
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
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add Product/Service</h5>
                        <button type="button" class="close form-close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <form class="kt-form kt-form--label-right" id="addForm" name="addForm" method="post"
                        action="{{ url('admin/product-and-services') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Enter Plan Name</label>
                                <input type="text" class="form-control" placeholder="Enter Plan Name"
                                    value="{{ old('name') }}" name="name" id="name" required>
                            </div>

                            {{-- //*type Start --}}
                            <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Select Type</label>
                                <select class="form-control" id="plan_type" name="plan_type">
                                    <option value="0" selected disabled>Select Plan Type</option>
                                    <option value="1">Product</option>
                                    <option value="2">Service</option>
                                </select>
                            </div>
                            {{-- //*type End --}}

                            {{-- //*users count :Start --}}
                            <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Enter Number Of Users</label>
                                <input type="number" class="form-control" placeholder="Enter Number Of Users"
                                    value="{{ old('users') }}" name="users" id="users" required>
                            </div>
                            {{-- //*users count :End --}}

                            {{-- //*Month Count: Start --}}
                            <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Enter Number Of Months </label>
                                <input type="number" class="form-control" placeholder="Enter Number Of Months"
                                    value="{{ old('months') }}" name="months" id="months" required>
                            </div>
                            {{-- //*Month Count:: End --}}

                            {{-- //*Pricing :Start --}}
                            <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Enter Price Per Month</label>
                                <input type="number" class="form-control" placeholder="Enter Price Per Month"
                                    value="{{ old('price') }}" name="price" id="price" required>
                            </div>
                            {{-- //*Pricing :End --}}
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
        {{-- //*Edit Modal --}}
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Product/Service</h5>
                        <button type="button" class="close form-close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <form class="kt-form kt-form--label-right" id="addForm" name="addForm" method="post"
                        action="{{ url('admin/update-pad') }}" enctype="multipart/form-data">
                        {{ method_field('post') }}
                        @csrf
                        <input type="hidden" name="type_id" id="type_id">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Enter Plan Name</label>
                                <input type="text" class="form-control" placeholder="Enter Plan Name"
                                    value="{{ old('edit_name') }}" name="edit_name" id="edit_name" required>
                            </div>

                            {{-- //*type Start --}}
                            <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Select Type</label>
                                <select class="form-control" id="edit_plan_type" name="edit_plan_type">
                                    <option value="0" selected disabled>Select Plan Type</option>
                                    <option value="1">Product</option>
                                    <option value="2">Service</option>
                                </select>
                            </div>
                            {{-- //*type End --}}

                            {{-- //*users count :Start --}}
                            <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Enter Number Of Users</label>
                                <input type="number" class="form-control" placeholder="Enter Number Of Users"
                                    value="{{ old('edit_users') }}" name="edit_users" id="edit_users" required>
                            </div>
                            {{-- //*users count :End --}}

                            {{-- //*Month Count: Start --}}
                            <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Enter Number Of Months </label>
                                <input type="number" class="form-control" placeholder="Enter Number Of Months"
                                    value="{{ old('edit_months') }}" name="edit_months" id="edit_months" required>
                            </div>
                            {{-- //*Month Count:: End --}}

                            {{-- //*Pricing :Start --}}
                            <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Enter Price Per Month</label>
                                <input type="number" class="form-control" placeholder="Enter Price Per Month"
                                    value="{{ old('edit_price') }}" name="edit_price" id="edit_price" required>
                            </div>
                            {{-- //*Pricing :End --}}
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
                var productCatDataTable = $('#example').DataTable({
                    processing: true,
                    responsive: true,
                    serverSide: true,
                    bDestroy: true,
                    "pageLength": 10,

                    "ajax": {
                        "url": "product-service-list",
                        "type": "GET"
                    },
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'plan_name',
                            name: 'plan_name'
                        },
                        {
                            data: 'type',
                            name: 'type'
                        },
                        {
                            data: 'users',
                            name: 'users'
                        },
                        {
                            data: 'month',
                            name: 'month'
                        },
                        {
                            data: 'pricing',
                            name: 'pricing'
                        },
                        {
                            data: 'added_by',
                            name: 'added_by'
                        },
                        {
                            data: "action",
                            name: 'Action',
                            orderable: false,
                            searchable: false
                        },

                    ]
                });

                function deleteConfirmation(id) {
                    swal({
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
                                url: "{{ url('/admin/delete-pad') }}/" + id,
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

                $('#example').on('click', '.editBtn', function() {
                    $('.editBtn').attr('disabled', 'disabled');
                    var sid = $(this).attr('id');
                    jQuery.ajax({
                        method: "get",
                        url: "{{ url('admin/edit-pad') }}" + "/" + sid,
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function(res) {
                            $('.editBtn').removeAttr('disabled');
                            $('#type_id').val(res.result.id);
                            $('#edit_name').val(res.result.plan_name);
                            $('#edit_months').val(res.result.month);
                            $('#edit_users').val(res.result.users);
                            $('#edit_price').val(res.result.pricing);
                            $('#edit_plan_type').val(res.result.type);
                            $('#editModal').modal('show');
                        }
                    });
                })
            </script>
        @endpush
    @endsection
