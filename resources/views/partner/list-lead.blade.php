@extends('admin.layouts.master')
@section('style')
<style>
    .bluish{color:#22b9ff;}
    .hide_select{display:none;}
</style>
@endsection
@section('content')
<input type="hidden" id="view_message" value="{{ session()->get('message') }}">
<div class="kt-portlet">
</div>

<div class="col-xl-12">
    {{-- @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session()->get('message') }}
        </div>
    @endif --}}
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet kt-portlet--mobile">

            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        My Leads
                    </h3>
                </div>

                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            <a href="#" data-toggle="modal" data-target="#create-edit-lead" class="btn btn-brand btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                                
                                Add New Lead
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="kt-portlet__body">
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Email</th>
                            <th>Designation</th>
                            <th>Company name</th>
                            <th>Total Amount</th>
                            <th>Commission</th>
                            <th>Lead status</th>
                            <th>Payment Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="create-edit-lead" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add Lead</h5>
                        <button type="button" class="close form-close" data-dismiss="modal" aria-label="Close" id="close_btn">
                        </button>
                    </div>
                    <form class="kt-form kt-form--label-right" id="lead-form" name="addForm" method="post"
                        action="{{ url('partner/create-lead') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="lead_id" name="lead_id">
                        <input type="hidden" id="user_id" name="user_id">
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
                            {{-- <div class="col-md-6 form-group"> --}}
                                {{-- <label for="recipient-name" class="form-control-label">Partner<span
                                        style="color: red;">*</span></label>
                                    <select class="form-control " id="partner_id" name="partner_id" style="width: 100%;">
                                        <option value="0" selected disabled>Partner</option>
                                        @foreach (clone $partners as $partner)
                                            <option value="{{ $partner->id }}">{{ $partner->name }}</option>
                                        @endforeach
                                    </select> --}}
                                    {{-- {!! Form::select('partner_id', $partners, null, ['class' => 'form-control', 'id' => 'partner_id']) !!} --}}
                            {{-- </div> --}}

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
                                    <option value="2" selected>Service</option>
                                </select>
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="recipient-name" class="form-control-label">Plan</label>
                                {!! Form::select('plan_list', $product, null, ['class' => 'form-control hide_select','id'=>'product_list']) !!}
                                {!! Form::select('services_list', $services, null, ['class' => 'form-control','id'=>'service_list']) !!}
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="recipient-name" class="form-control-label">Company Name</label>
                                <input type="text" class="form-control" placeholder="Company Name"
                                    value="{{ old('company_name') }}" name="company_name" id="company_name">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="recipient-name" class="form-control-label">Business Category</label>
                                {!! Form::select('business_category_id', $business_categories, null, ['class' => 'form-control','id'=>'']) !!}
                                {{-- <select id="e1" name="business_category_id" class="form-control">
                                    <option value="">Business Category</option>
                                    @foreach ($business_categories as $business_category)
                                        <option value="{{ $business_category->id }}">
                                            {{ $business_category->business_category_name }}
                                        </option>
                                    @endforeach
                                </select> --}}
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

                            <div class="col-md-6 form-group">
                                <label for="recipient-name" class="form-control-label">Remarks</label>
                                <textarea class="form-control" name="remarks" id="remarks" placeholder="Remarks">{{ old('remarks') }}</textarea>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" id="cancel_action"
                                data-dismiss="modal">Close</button>
                            <button type="submit" id="lead_submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@push('scripts')   
<script type="text/javascript">
    $(function () {
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('display-leads') }}",
            columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            {data: 'email', name: 'email'},
            {data: 'designation', name: 'designation'},
            {data: 'company_name', name: 'company_name'},
            {data: 'total_amount', name: 'total_amount'},
            {data: 'commission_amount', name: 'commission_amount'},
            {data: 'state', name: 'state'},
            {data: 'payment_stats', name: 'payment_stats'},
            {data: 'actions', name: 'actions'},
            ]
        });
    });
</script> 
<script>

    $(document).on('click','#cancel_action,#close_btn',function(){
        create_url = location.origin+'/partner/create-lead'
        $('#lead-form').attr('action', create_url); 
        $('#lead_submit').html("Save");
        $("#lead-form").trigger("reset");
    })

    $(document).on('click','.edit-lead-btn',function()
    {
        udpate_url = location.origin+'/partner/update-lead'
        $.ajax({
                type:'GET',
                url: "{{ url('partner/edit-lead') }}",
                data: {
                "_token": "{{ csrf_token() }}",
                "id":$(this).data('id')
                },
                success:function(data) {
                console.log(data.lead[0])
                
                $('#lead-form').attr('action', udpate_url); 
                $('#lead_submit').html("Update");
                // $('.editBtn').removeAttr('disabled');
                $('#lead_id').val(data.lead[0]['id']);
                // $('#update_client_id').val(data.lead.id);
                $('#user_id').val(data.lead[0]['user_id']);
                $('#name').val(data.lead[0]['user']['name']);
                $('#area').val(data.lead[0]['area']);
               
                $('#country').val(data.lead[0]['country']);
                $('#country').trigger('change')
                setTimeout(function() {
                    $('#state').val(data.lead[0]['state']);
                }, 100);
                // $('#mySelect2').trigger('change.select2');
                // console.log(data.lead[0]['state'])
                
                $('#pincode').val(data.lead[0]['pincode']);
                $('#remarks').val(data.lead[0]['remarks']);
                $('#company_name').val(data.lead[0]['company_name']);
                $('#designation').val(data.lead[0]['designation']);
                // $('#edit_partner').val(data.lead.client.partner_id);
                $('#mobile').val(data.lead[0]['user']['mobile']);
                $('#email').val(data.lead[0]['email']);
                $('#plan_type').val(data.lead[0]['plan_type']);
                // $('#edit_pad').val(res.result.client.plan_id);
                // $('#edit_company_name').val(data.lead.client.company_name);
                // $('#edit_business_category_id').val(data.resleadult.client.business_category_id);
                // $('#edit_country').val(data.lead.client.country);
                // $('#edit_state').val(res.result.client.states);
                // $('#edit_area').val(data.lead.client.area);
                // $('#edit_pincode').val(data.lead.client.pincode);
                // $('#edit_address').val(data.lead.client.address);
                // $('#edit_remarks').val(data.lead.client.remarks);
                // planService(data.lead.client, 'edit')
                // stateFind(data.lead.client, 'edit')
                // 
                // stateFind(data.lead[0]['country'],"update"),
                // $('#state').trigger('change')
                
                $('#create-edit-lead').modal('show');
                
                }
            });
    })
    
    $('#status_filter').on('change',function(){
        listData();
    })


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
            if($(this).val()==1)
            {
                $("#product_list").removeClass("hide_select")
                $("#service_list").addClass("hide_select")
            }
            else{
                $("#product_list").addClass("hide_select")
                $("#service_list").removeClass("hide_select")
            }
        })
    });

    // function planService(type, flag) {
    //     var BaseUrl = location.origin;
    //     if (flag == 'add') {
    //         $.ajax({
    //             url: BaseUrl + '/admin/plan-service-list/' + type,
    //             success: function(data) {
    //                 $("#pad").empty()
    //                 $("#pad").html(data.result)

    //             }
    //         })
    //     } else {
    //         typeId = type.plan_type;
    //         plan = type.plan_id;
    //         $.ajax({
    //             url: BaseUrl + '/admin/plan-service-list/' + typeId,
    //             success: function(data) {
    //                 $("#edit_pad").empty()
    //                 $("#edit_pad").html(data.result)
    //                 $('#edit_pad').val(plan);
    //             }
    //         })
    //     }

    // }

    // $('#example').on('click', '.editBtn', function() {
    //     $('.editBtn').attr('disabled', 'disabled');
    //     var sid = $(this).data('id');
    //     jQuery.ajax({
    //         method: "get",
    //         url: "{{ url('edit-lead') }}" + "/" + sid,
    //         data: {
    //             "_token": "{{ csrf_token() }}",
    //         },
    //         success: function(res) {
    //             $('.editBtn').removeAttr('disabled');
    //             $('#update_client_id').val(res.result.client.id);
    //             $('#update_user_id').val(res.result.id);
    //             $('#edit_name').val(res.result.name);
    //             $('#edit_designation').val(res.result.client.designation);
    //             $('#edit_partner').val(res.result.client.partner_id);
    //             $('#edit_mobile').val(res.result.mobile);
    //             $('#edit_email').val(res.result.email);
    //             $('#edit_plan_type').val(res.result.client.plan_type);
    //             $('#edit_pad').val(res.result.client.plan_id);
    //             $('#edit_company_name').val(res.result.client.company_name);
    //             $('#edit_business_category_id').val(res.result.client.business_category_id);
    //             $('#edit_country').val(res.result.client.country);
    //             $('#edit_state').val(res.result.client.states);
    //             $('#edit_area').val(res.result.client.area);
    //             $('#edit_pincode').val(res.result.client.pincode);
    //             $('#edit_address').val(res.result.client.address);
    //             $('#edit_remarks').val(res.result.client.remarks);
    //             planService(res.result.client, 'edit')
    //             stateFind(res.result.client, 'edit')
    //             $('#create-edit-lead').modal('show');
    //         }
    //     });
    // })

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