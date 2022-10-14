@extends('admin.layouts.master')
@section('title', 'Business Category Settings')
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
                                Business Category Table
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-wrapper">
                                <div class="kt-portlet__head-actions">
                                    <a href="#" data-toggle="modal" data-target="#addModal"
                                        class="btn btn-brand btn-elevate btn-icon-sm">
                                        <i class="la la-plus"></i>
                                        Add New Business Category
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
                                    <th>Business Category</th>
                                    <th>Added on</th>
                                    {{-- <th>Actions</th> --}}
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
                        <h5 class="modal-title" id="exampleModalLongTitle">Add Business Category</h5>
                        <button type="button" class="close form-close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <form class="kt-form kt-form--label-right" id="addForm" name="addForm" method="post"
                        action="{{ url('admin/business-category') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Enter Business Category</label>
                                <input type="text" class="form-control" placeholder="Enter Business Category"
                                    value="{{ old('business_category_name') }}" name="business_category_name"
                                    id="business_category_name" required autofocus>
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

        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Business Category</h5>
                        <button type="button" class="close form-close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <form class="kt-form kt-form--label-right" id="addForm" name="addForm" method="post"
                        action="{{ url('admin/update-business-category') }}" enctype="multipart/form-data">
                        {{ method_field('post') }}
                        @csrf
                        <input type="hidden" name="category_id" id="category_id">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Enter Business Category</label>
                                <input type="text" class="form-control" placeholder="Enter Name"
                                    value="{{ old('business_category_name') }}" name="business_category_name"
                                    id="edit_business_category_name" required autofocus>
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
                var productCatDataTable = $('#example').DataTable({
                    processing: true,
                    responsive: true,
                    serverSide: true,
                    bDestroy: true,
                    order: [
                        [0, 'desc']
                    ],
                    "pageLength": 50,
                    columnDefs: [


                        {
                            targets: -1,
                            title: 'Actions',
                            orderable: true,
                            render: function(data, type, full, meta) {
                                return `

                                <div class="d-grid gap-2 d-md-flex" >
    <button type="submit"  id="` + full.id + `" class="btn btn-info editBtn"  style="margin-right :3%;"><i class="la la-edit"></i></button>
    <button type="button" class="btn btn-danger" onclick="deleteConfirmation(` + full.id + `)"><i class="fa fa-trash" aria-hidden="true"></i></button>
 </div>`;
                            },
                        },
                    ],
                    "ajax": {
                        "url": "businesscategorylist",
                        "type": "GET"
                    },
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'business_category_name',
                            name: 'business_category_name'
                        },


                        {
                            data: 'created_at',
                            name: 'created_at'
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
                                url: "{{ url('/admin/businesscategorydelete') }}/" + id,
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
                    $('.editBtn').attr('disabled','disabled');
                    var sid = $(this).attr('id');
                    jQuery.ajax({
                        method: "get",
                        url: "{{ url('admin/edit-business-category') }}" + "/" + sid,
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function(res) {
                            $('.editBtn').removeAttr('disabled');
                            $('#edit_business_category_name').val(res.result.business_category_name);
                            $('#category_id').val(res.result.id);
                            $('#editModal').modal('show');
                            // Result.html(res);
                        }
                    });
                })
            </script>
        @endpush
    @endsection
