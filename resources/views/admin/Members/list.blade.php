@extends('admin.layouts.master')
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
                                    Total Referal Leads
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
                                    Unpaid Leads
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
                                Referal Leads Table
                            </h3>
                        </div>

                        {{-- //*filter: Start --}}

                        <div class="kt-portlet__head-toolbar filter-right">
                            <div class="kt-portlet__head-wrapper">
                                <div class="kt-portlet__head-actions">
                                   <select name="status_filter" id="status_filter" class="form-control">
                                        <option value="">Select Status</option>
                                        <option value="0">Paid</option>
                                        <option value="1">Not Paid</option>
                                        <option value="2">Pending</option>
                                   </select>
                                </div>
                            </div>
                        </div>

                        {{-- //*filter: End --}}

                        <div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-wrapper">
                                <div class="kt-portlet__head-actions">
                                    <a href="#" data-toggle="modal" data-target="#addModal"
                                        class="btn btn-brand btn-elevate btn-icon-sm">
                                        <i class="la la-plus"></i>
                                        {{-- {{ url('admin/client/create') }} --}}
                                        Add New Lead
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
                                    <th>Customer Name</th>
                                    <th>Designation</th>
                                    <th>Email</th>
                                    <th>Mobile Number</th>
                                    <th>Plan</th>
                                    <th>Partner</th>
                                    <th>Status</th>
                                    <th>Commission</th>
                                    <th>Total Amount</th>
                                    <th>Remarks</th>
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
                        <h5 class="modal-title" id="exampleModalLongTitle">Add Lead</h5>
                        <button type="button" class="close form-close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <form class="kt-form kt-form--label-right" id="addForm" name="addForm" method="post"
                        action="{{ url('admin/client') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row modal-body">
                            <div class="col-md-6 form-group">
                                <label for="recipient-name" class="form-control-label">Customer Name<span
                                        style="color: red;">*</span></label>
                                <input type="text" class="form-control" placeholder="Customer Name"
                                    value="{{ old('name') }}" name="name" id="name" required>
                            </div>
                            {{-- //*Designation Start --}}
                            <div class="col-md-6 form-group">
                                <label for="recipient-name" class="form-control-label">Designation<span
                                        style="color: red;">*</span></label>
                                <input type="text" class="form-control" placeholder="Designation"
                                    value="{{ old('designation') }}" name="designation" id="designation" required>
                            </div>
                            {{-- //*Designation END --}}
                            <div class="col-md-6 form-group">
                                <label for="recipient-name" class="form-control-label">Partner<span
                                        style="color: red;">*</span></label>
                                    <select class="form-control " id="partner_id" name="partner_id" style="width: 100%;">
                                        <option value="0" selected disabled>Partner</option>
                                        @foreach (clone $partners as $partner)
                                            <option value="{{ $partner->id }}">{{ $partner->name }}</option>
                                        @endforeach
                                    </select>
                                    {{-- {!! Form::select('partner_id', $partners, null, ['class' => 'form-control', 'id' => 'partner_id']) !!} --}}
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="recipient-name" class="form-control-label">Mobile Number<span
                                        style="color: red;">*</span></label>
                                <input type="number" class="form-control" placeholder="Mobile Number"
                                    value="{{ old('mobile') }}" name="mobile" id="mobile" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="recipient-name" class="form-control-label">Email</label>
                                <input type="text" class="form-control" placeholder="Email"
                                    value="{{ old('email') }}" name="email" id="email">
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="recipient-name" class="form-control-label">Plan Type</label>
                                <select id="plan_type" name="plan_type" class="form-control">
                                    <option value="0" selected disabled>Plan Type</option>
                                    <option value="1">Product</option>
                                    <option value="2">Service</option>
                                </select>
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="recipient-name" class="form-control-label">Plan</label>
                                <select id="pad" name="pad" class="form-control">
                                    <option value="0" selected disabled>Plan</option>

                                </select>
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="recipient-name" class="form-control-label">Company Name</label>
                                <input type="text" class="form-control" placeholder="Company Name"
                                    value="{{ old('company_name') }}" name="company_name" id="company_name">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="recipient-name" class="form-control-label">Business Category</label>
                                <select id="e1" name="business_category_id" class="form-control">
                                    <option value="">Business Category</option>
                                    @foreach ($business_categories as $business_category)
                                        <option value="{{ $business_category->id }}">
                                            {{ $business_category->business_category_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="recipient-name" class="form-control-label">Country</label>
                                <select placeholder="Country" name="country" id="country" class="form-control">
                                    <option value="0" selected disabled>Country
                                    </option>
                                    @foreach ($countries as $key => $coutry)
                                        <option value="{{ $key }}">
                                            {{ $coutry }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="recipient-name" class="form-control-label">State</label>
                                <select placeholder="State" name="state" id="state" class="form-control">
                                    <option value="0" selected disabled>State</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="recipient-name" class="form-control-label">Area</label>
                                <input type="text" class="form-control" placeholder="Area"
                                    value="{{ old('area') }}" name="area" id="area">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="recipient-name" class="form-control-label">Pincode</label>
                                <input type="text" class="form-control" placeholder="Pincode"
                                    value="{{ old('pincode') }}" name="pincode" id="pincode">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="recipient-name" class="form-control-label">Address</label>
                                <textarea class="form-control" name="address" id="address" placeholder="Address">{{ old('address') }}</textarea>
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="recipient-name" class="form-control-label">Remarks</label>
                                <textarea class="form-control" name="remarks" id="remarks" placeholder="Remarks">{{ old('remarks') }}</textarea>
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

        {{-- //*edit Modal:Start --}}
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Lead</h5>
                        <button type="button" class="close form-close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <form class="kt-form kt-form--label-right" id="editForm" name="editForm" method="post"
                        action="{{ url('admin/update-client') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row modal-body">
                            <input type="hidden" class="form-control" name="update_client_id" id="update_client_id">
                            <input type="hidden" class="form-control" name="update_user_id" id="update_user_id">
                            <div class="col-md-6 form-group">
                                <label for="recipient-name" class="form-control-label">Customer Name<span
                                        style="color: red;">*</span></label>
                                <input type="text" class="form-control" placeholder="Customer Name"
                                    value="{{ old('edit_name') }}" name="edit_name" id="edit_name" required>
                            </div>
                            {{-- //*Designation Start --}}
                            <div class="col-md-6 form-group">
                                <label for="recipient-name" class="form-control-label">Designation<span
                                        style="color: red;">*</span></label>
                                <input type="text" class="form-control" placeholder="Designation"
                                    value="{{ old('edit_designation') }}" name="edit_designation" id="edit_designation"
                                    required>
                            </div>
                            {{-- //*Designation END --}}
                            <div class="col-md-6 form-group">
                                <label for="recipient-name" class="form-control-label">Partner<span
                                        style="color: red;">*</span></label>
                                <select id="edit_partner" name="edit_partner" class="form-control">
                                    <option value="0" selected disabled>Partner</option>
                                    @foreach ($partners as $partnr)
                                        <option value="{{ $partnr->id }}">{{ $partnr->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="recipient-name" class="form-control-label">Mobile Number<span
                                        style="color: red;">*</span></label>
                                <input type="number" class="form-control" placeholder="Mobile Number"
                                    value="{{ old('edit_mobile') }}" name="edit_mobile" id="edit_mobile" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="recipient-name" class="form-control-label">Email</label>
                                <input type="text" class="form-control" placeholder="Email"
                                    value="{{ old('edit_email') }}" name="edit_email" id="edit_email">
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="recipient-name" class="form-control-label">Plan Type</label>
                                <select id="edit_plan_type" name="edit_plan_type" class="form-control">
                                    <option value="0" selected disabled>Plan Type</option>
                                    <option value="1">Product</option>
                                    <option value="2">Service</option>
                                </select>
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="recipient-name" class="form-control-label">Plan</label>
                                <select id="edit_pad" name="edit_pad" class="form-control">
                                    <option value="0" selected disabled>Plan</option>

                                </select>
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="recipient-name" class="form-control-label">Company Name</label>
                                <input type="text" class="form-control" placeholder="Company Name"
                                    value="{{ old('edit_company_name') }}" name="edit_company_name"
                                    id="edit_company_name">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="recipient-name" class="form-control-label">Business Category</label>
                                <select id="edit_business_category_id" name="edit_business_category_id"
                                    class="form-control">
                                    <option value="">Business Category</option>
                                    @foreach ($business_categories as $business_category)
                                        <option value="{{ $business_category->id }}">
                                            {{ $business_category->business_category_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="recipient-name" class="form-control-label">Country</label>
                                <select placeholder="Country" name="edit_country" id="edit_country"
                                    class="form-control">
                                    <option value="0" selected disabled>Country
                                    </option>
                                    @foreach ($countries as $key => $country)
                                        <option value="{{ $key }}"> {{ $country }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="recipient-name" class="form-control-label">State</label>
                                <select placeholder="State" name="edit_state" id="edit_state" class="form-control">
                                    <option value="0" selected disabled>State</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="recipient-name" class="form-control-label">Area</label>
                                <input type="text" class="form-control" placeholder="Area"
                                    value="{{ old('edit_area') }}" name="edit_area" id="edit_area">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="recipient-name" class="form-control-label">Pincode</label>
                                <input type="text" class="form-control" placeholder="Pincode"
                                    value="{{ old('edit_pincode') }}" name="edit_pincode" id="edit_pincode">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="recipient-name" class="form-control-label">Address</label>
                                <textarea class="form-control" name="edit_address" id="edit_address" placeholder="Address">{{ old('address') }}</textarea>
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="recipient-name" class="form-control-label">Remarks</label>
                                <textarea class="form-control" name="edit_remarks" id="edit_remarks" placeholder="Remarks">{{ old('remarks') }}</textarea>
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
        {{-- //*edit Modal:End --}}

        {{-- //*statusModal : Start --}}
        <div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Change Status</h5>
                        <button type="button" class="close form-close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <form class="kt-form kt-form--label-right" id="addForm" name="statusForm" method="post"
                        action="{{ url('admin/data-update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <input type="hidden" id="client_id" name="client_id">
                                <label for="recipient-name" class="form-control-label">Status<span
                                        style="color: red;">*</span></label>
                                <select id="change_status" name="change_status" class="form-control">
                                    <option value="" selected disabled>Status</option>
                                    <option value="0">Paid</option>
                                    <option value="1">Not Paid</option>
                                    <option value="2">Pending</option>
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
        {{-- //*statusModal : End --}}

        {{-- //*amountModal : Start --}}
        <div class="modal fade" id="amountModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Change Amount</h5>
                        <button type="button" class="close form-close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <form class="kt-form kt-form--label-right" id="addForm" name="statusForm" method="post"
                        action="{{ url('admin/data-update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <input type="hidden" id="payment_client_id" name="payment_client_id">
                                <label for="recipient-name" class="form-control-label">Paid Amount</label>
                                <input type="text" name="paid_amount" id="paid_amount" placeholder="Paid Amount" class="form-control">
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
        {{-- //*amountModal : End --}}
        {{-- //*remarksModal : Start --}}
        <div class="modal fade" id="remarksModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Change Remarks</h5>
                        <button type="button" class="close form-close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <form class="kt-form kt-form--label-right" id="addForm" name="statusForm" method="post"
                        action="{{ url('admin/data-update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <input type="hidden" id="remarks_client_id" name="remarks_client_id">
                                <label for="recipient-name" class="form-control-label">Remarks</label>
                                <textarea name="add_remarks" id="add_remarks" placeholder="Remarks" class="form-control"> </textarea>
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
        {{-- //*remarksModal : End --}}
        <!--End::Row-->
        @push('scripts')
            <script>
                $(document).ready(function() {
                    listData();
                });

                $('#status_filter').on('change',function(){
                    listData();
                })

                function listData() {
                    var BaseUrl = location.origin;
                    var productCatDataTable = $('#example').DataTable({
                        processing: true,
                            responsive: false,
                            serverSide: true,
                            bDestroy: true,
                            scrollX: true,

                        "pageLength": 50,
                        order: [
                            [0, 'desc']
                        ],
                        "ajax": {
                            "url": BaseUrl + "/admin/clientlist",
                            "type": "GET",
                            'data': {
                                "status_filter" : $('#status_filter').val(),
                            }
                        },
                        columns: [{
                                // data: function(data, type, full, meta) {
                                //     return meta.row + meta.settings._iDisplayStart + 1;
                                // },
                                data: 'id',
                                name: 'id'
                            },
                            {
                                data: 'name',
                                name: 'name'
                            },
                            {
                                data: 'client.designation',
                                name: 'designation'
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
                                data: 'plan',
                                name: 'plan'
                            },
                            {
                                data: 'partner',
                                name: 'partner'
                            },
                            {
                                data: 'status',
                                name: 'status'
                            },
                            {
                                data: 'commission',
                                name: 'commission'
                            },
                            {
                                data: 'amount',
                                name: 'amount'
                            },
                            {
                                data: 'remarks',
                                name: 'remarks'
                            },
                            {
                                data: 'created_at',
                                name: 'created_at'
                            },
                            {
                                data: 'actions',
                                name: 'actions'
                            },
                        ]
                    });
                }


                $(document).ready(function() {
                    var mes = $('#view_message').val().split('#');
                    if (mes[0] == "success") {
                        toastr.success(mes[1]);
                    } else if (mes[0] == "danger") {
                        toastr.error(mes[1]);
                    }
                });

                $(document).ready(function(e) {
                    $('#mySelect2').trigger('change.select2');
                    var BaseUrl = location.origin;
                    var country = $('#country').val();
                    stateFind(country, 'add');

                    $('#edit_country').on('change', function() {
                        var country = $('#edit_country').val();
                        $.ajax({
                            url: BaseUrl + '/state/' + country,
                            success: function(data) {
                                $.each(data.states, function(key, value) {
                                    $('#edit_state').append($("<option></option>").attr("value",
                                        key).text(value));
                                });
                            }
                        })
                    })
                });

                function stateFind(country, flag) {
                    var BaseUrl = location.origin;
                    if (flag == 'add') {
                        $('#country').on('change', function() {
                            var country = $('#country').val();
                            $.ajax({
                                url: BaseUrl + '/state/' + country,
                                success: function(data) {
                                    $.each(data.states, function(key, value) {
                                        $('#state').append($("<option></option>").attr("value", key)
                                            .text(value));
                                    });
                                }
                            })
                        })
                    } else {
                        countryId = country.country;
                        stateId = country.state;

                        $.ajax({
                            url: BaseUrl + '/state/' + countryId,
                            success: function(data) {
                                $.each(data.states, function(key, value) {
                                    $('#edit_state').append($("<option></option>").attr("value", key).text(
                                        value));
                                });

                                $('#edit_state').val(stateId)
                            }
                        })



                    }
                }

                $(function() {
                    $("form[name='addForm']").validate({
                        rules: {
                            name: "required",
                            mobile: {
                                required: true,
                                number: true,
                            },
                            designation: "required",
                            partner_id: "required"
                        },
                        messages: {
                            firstname: "Please enter your name",
                            mobile: "Please enter your mobile number",
                            designation: "Please Enter Designation",
                            partner_id: "Please Select Partner"
                        },
                        submitHandler: function(form) {
                            form.submit();
                        }
                    });
                });


                $(document).ready(function(e) {

                    $('#plan_type').on('change', function() {
                        var type = $('#plan_type').val();
                        planService(type, 'add')
                    })
                });

                function planService(type, flag) {
                    var BaseUrl = location.origin;
                    if (flag == 'add') {
                        $.ajax({
                            url: BaseUrl + '/admin/plan-service-list/' + type,
                            success: function(data) {
                                $("#pad").empty()
                                $("#pad").html(data.result)

                            }
                        })
                    } else {
                        typeId = type.plan_type;
                        plan = type.plan_id;
                        $.ajax({
                            url: BaseUrl + '/admin/plan-service-list/' + typeId,
                            success: function(data) {
                                $("#edit_pad").empty()
                                $("#edit_pad").html(data.result)
                                $('#edit_pad').val(plan);
                            }
                        })
                    }

                }

                $('#example').on('click', '.editBtn', function() {
                    $('.editBtn').attr('disabled', 'disabled');
                    var sid = $(this).data('id');
                    jQuery.ajax({
                        method: "get",
                        url: "{{ url('admin/edit-client') }}" + "/" + sid,
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function(res) {
                            $('.editBtn').removeAttr('disabled');
                            $('#update_client_id').val(res.result.client.id);
                            $('#update_user_id').val(res.result.id);
                            $('#edit_name').val(res.result.name);
                            $('#edit_designation').val(res.result.client.designation);
                            $('#edit_partner').val(res.result.client.partner_id);
                            $('#edit_mobile').val(res.result.mobile);
                            $('#edit_email').val(res.result.email);
                            $('#edit_plan_type').val(res.result.client.plan_type);
                            // $('#edit_pad').val(res.result.client.plan_id);
                            $('#edit_company_name').val(res.result.client.company_name);
                            $('#edit_business_category_id').val(res.result.client.business_category_id);
                            $('#edit_country').val(res.result.client.country);
                            // $('#edit_state').val(res.result.client.states);
                            $('#edit_area').val(res.result.client.area);
                            $('#edit_pincode').val(res.result.client.pincode);
                            $('#edit_address').val(res.result.client.address);
                            $('#edit_remarks').val(res.result.client.remarks);
                            planService(res.result.client, 'edit')
                            stateFind(res.result.client, 'edit')
                            $('#editModal').modal('show');
                        }
                    });
                })

                $('#example').on('click', '.statusBtn', function() {
                    $('.statusBtn').attr('disabled', 'disabled');
                    var mid = $(this).data('id');
                    jQuery.ajax({
                        method: "get",
                        url: "{{ url('admin/edit-client') }}" + "/" + mid,
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function(res) {
                            $('.statusBtn').removeAttr('disabled');
                            $('#change_status').val(res.result.client.payment_status);
                            $('#client_id').val(res.result.client.id);
                            $('#statusModal').modal('show');
                        }
                    });
                })

                $('#example').on('click', '.amountBtn', function() {
                    var mid = $(this).data('id');
                    jQuery.ajax({
                        method: "get",
                        url: "{{ url('admin/edit-client') }}" + "/" + mid,
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function(res) {
                            $('.amountBtn').removeAttr('disabled');
                            $('#paid_amount').val(res.result.client.amount_collected);
                            $('#payment_client_id').val(res.result.client.id);
                            $('#amountModal').modal('show');
                        }
                    });
                })
                $('#example').on('click', '.remarksBtn', function() {
                    var mid = $(this).data('id');
                    jQuery.ajax({
                        method: "get",
                        url: "{{ url('admin/edit-client') }}" + "/" + mid,
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function(res) {
                            $('.remarksBtn').removeAttr('disabled');
                            $('#add_remarks').html(res.result.client.remarks);
                            $('#remarks_client_id').val(res.result.client.id);
                            $('#remarksModal').modal('show');
                        }
                    });
                })
                $('#partner_id').select2({
                    selectOnClose: true
                });
            </script>
        @endpush
    @endsection
