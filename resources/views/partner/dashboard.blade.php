@extends('admin.layouts.master')
@section('content')

<!--begin:: Widgets/Stats-->
<input type="hidden" id="view_message" value="{{ Session::get('message') }}">
    <!--begin:: Widgets/Stats-->
    <div class="kt-portlet">
        <div class="kt-portlet__body  kt-portlet__body--fit">
            <div class="row row-no-padding row-col-separator-lg">
                {{-- <div class="col-md-12 col-lg-6 col-xl-6">
                    <div class="kt-widget24">
                        <a href="{{ url('admin/client') }}">
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
                        </a>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-6">
                    <a href="{{ url('admin/channel-partner') }}">
                        <div class="kt-widget24">
                            <div class="kt-widget24__details">
                                <div class="kt-widget24__info">
                                    <h4 class="kt-widget24__title">
                                        Total channel partner
                                    </h4>
                                </div>
                                <span class="kt-widget24__stats kt-font-warning">
                                    {{ $aprtner }}
                                </span>
                            </div>
                            <div class="kt-widget24__action">
                            </div>
                        </div>
                    </a>
                </div> --}}
               <div class="col-md-12 col-lg-6 col-xl-3"> 

                <!--begin::New Orders-->
                <div class="kt-widget24">
                    <div class="kt-widget24__details">
                        <div class="kt-widget24__info">
                            <h4 class="kt-widget24__title">
                                Total Business Collaboration
                            </h4>
                            <span class="kt-widget24__desc">
                                Overall Business Contribution
                            </span>
                        </div>
                        <span class="kt-widget24__stats kt-font-danger">
                           {{ $total_business }} ₹
                        </span>
                    </div>
                    <div class="progress progress--sm">
                        <div class="progress-bar kt-bg-danger" role="progressbar" style="width: 70%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    {{-- <div class="kt-widget24__action">
                        <span class="kt-widget24__change">
                            Change
                        </span>
                        <span class="kt-widget24__number">
                            69%
                        </span>
                    </div> --}}
                </div>

                <!--end::New Orders-->
            </div>
            <div class="col-md-12 col-lg-6 col-xl-3">

                <!--begin::New Users-->
                <div class="kt-widget24">
                    <div class="kt-widget24__details">
                        <div class="kt-widget24__info">
                            <h4 class="kt-widget24__title">
                                Total Commission
                            </h4>
                            <span class="kt-widget24__desc">
                                Total Revenue 
                            </span>
                        </div>
                        <span class="kt-widget24__stats kt-font-success">
                            {{ $total_commision }} ₹
                        </span>
                    </div>
                    <div class="progress progress--sm">
                        <div class="progress-bar kt-bg-success" role="progressbar" style="width: 70%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    {{-- <div class="kt-widget24__action">
                        <span class="kt-widget24__change">
                            Change
                        </span>
                        <span class="kt-widget24__number">
                            90%
                        </span>
                    </div> --}}
                </div>

                <!--end::New Users-->
            </div> 
            </div>
        </div>
    </div>

    <!--end:: Widgets/Stats-->

    <!--Begin::Row-->
    <div class="row">
        <div class="col-md-6">

            <!--begin:: Widgets/Sale Reports-->
            <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Pending Payments
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
    
                    <!--Begin::Tab Content-->
                    <div class="tab-content">
    
                        <!--begin::tab 1 content-->
                        <div class="tab-pane " id="kt_widget11_tab1_content">
    
                            <!--begin::Widget 11-->
    
                            <!--end::Widget 11-->
                        </div>
    
                        <!--end::tab 1 content-->
    
                        <!--begin::tab 2 content-->
                        <div class="tab-pane active" id="kt_widget11_tab2_content">
    
                            <!--begin::Widget 11-->
                            <div class="kt-widget11">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <td style="width:1%">#</td>
                                                <td style="width:25%">Client</td>
                                                <td style="width:30%">Bussiness Type</td>
                                                <td style="width:25%">Commission</td>
                                                <td style="width:15%">Status</td>
                                                <td style="width:25%" class="kt-align-right">Total revenue</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pending_payments as $key => $pending)
                                            <tr>
                                                <td>
                                                    <label class="kt-checkbox kt-checkbox--single">
                                                        <input type="checkbox"><span></span>
                                                    </label>
                                                </td>
                                                <td>{{ $pending->company_name}} </td>
                                                <td>
                                                    <span class="kt-widget11__title">{{ $pending->plan_type == 1 ? "Product" : "Service"}}</span>
                                                    <span class="kt-widget11__sub">{{ App\Models\Admin\ProductAndService::where('id',$pending->plan_id)->first()->plan_name }}</span>
                                                </td>
                                                <td>{{ $pending->commission_amount ? $pending->commission_amount." ₹" : 'not disclosed'}} </td>
                                                <td>
                                                @if ($pending->payment_status == 1)
                                                    <span class="kt-badge kt-badge--inline kt-badge--brand">not paid</span>    
                                                @endif
                                                @if ($pending->payment_status == 2)
                                                    <span class="kt-badge kt-badge--inline kt-badge--info">pending</span>       
                                                @endif
                                                </td>
                                                <td class="kt-align-right kt-font-brand  kt-font-bold">{{ $pending->total_amount ?  $pending->total_amount." ₹" : 'not disclosed'
                                                 }} </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{-- <div class="kt-widget11__action kt-align-right">
                                    <button type="button" class="btn btn-label-success btn-bold btn-sm">Generate Report</button>
                                </div> --}}
                            </div>
    
                            <!--end::Widget 11-->
                        </div>
    
                        <!--end::tab 2 content-->
    
                        <!--begin::tab 3 content-->
                        <div class="tab-pane" id="kt_widget11_tab3_content">
                        </div>
    
                        <!--end::tab 3 content-->
                    </div>
    
                    <!--End::Tab Content-->
                </div>
            </div>
    
            <!--end:: Widgets/Sale Reports-->
    </div>
    <div class="col-md-6">

        <!--begin:: Widgets/Sale Reports-->
        <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Latest Leads
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">

                <!--Begin::Tab Content-->
                <div class="tab-content">

                    <!--begin::tab 1 content-->
                    <div class="tab-pane " id="kt_widget11_tab1_content">

                        <!--begin::Widget 11-->

                        <!--end::Widget 11-->
                    </div>

                    <!--end::tab 1 content-->

                    <!--begin::tab 2 content-->
                    <div class="tab-pane active" id="kt_widget11_tab2_content">

                        <!--begin::Widget 11-->
                        <div class="kt-widget11">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td style="width:1%">#</td>
                                             <td style="width:25%">Client</td>
                                            <td style="width:32%">Bussiness Type</td>
                                            <td style="width:20%">Commission</td>
                                            <td style="width:15%">Status</td>
                                            <td style="width:20%" class="kt-align-right">Total revenue</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($latest_leads as $lead)
                                        <tr>
                                            <td>
                                                <label class="kt-checkbox kt-checkbox--single">
                                                    <input type="checkbox"><span></span>
                                                </label>
                                            </td>
                                            <td>{{ $lead->company_name}} </td>
                                            <td>
                                                <span class="kt-widget11__title">{{ $lead->plan_type == 1 ? "Product" : "Service"}}</span>
                                                <span class="kt-widget11__sub">{{ App\Models\Admin\ProductAndService::where('id',$lead->plan_id)->first()->plan_name }}</span>
                                            </td>
                                            <td>{{ $lead->commission_amount ? $lead->commission_amount." ₹" : 'not disclosed'}} </td>
                                            <td>
                                                @if ($lead->payment_status == 0)
                                                    <span class="kt-badge kt-badge--inline kt-badge--success">paid</span>
                                                @endif
                                                @if ($lead->payment_status == 1)
                                                    <span class="kt-badge kt-badge--inline kt-badge--brand">not paid</span>    
                                                @endif
                                                @if ($lead->payment_status == 2)
                                                    <span class="kt-badge kt-badge--inline kt-badge--info">pending</span>       
                                                @endif
                                            </td>
                                            <td class="kt-align-right kt-font-brand  kt-font-bold">{{ $lead->total_amount ? $lead->total_amount." ₹" : 'not disclosed'}} </td>
                                        </tr>
                                        @endforeach
                                        
                                      
                                    </tbody>
                                </table>
                            </div>
                            {{-- <div class="kt-widget11__action kt-align-right">
                                <button type="button" class="btn btn-label-success btn-bold btn-sm">Generate Report</button>
                            </div> --}}
                        </div>

                        <!--end::Widget 11-->
                    </div>

                    <!--end::tab 2 content-->

                    <!--begin::tab 3 content-->
                    <div class="tab-pane" id="kt_widget11_tab3_content">
                    </div>

                    <!--end::tab 3 content-->
                </div>

                <!--End::Tab Content-->
            </div>
        </div>

        <!--end:: Widgets/Sale Reports-->
</div> 

</div> 


    <!--End::Row-->
    @push('scripts')
        <script>
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
