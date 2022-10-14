@extends('admin.layouts.master')
@section('content')
    <input type="hidden" id="view_message" value="{{ Session::get('message') }}">
    <!--begin:: Widgets/Stats-->
    <div class="kt-portlet">
        <div class="kt-portlet__body  kt-portlet__body--fit">
            <div class="row row-no-padding row-col-separator-lg">
                <div class="col-md-12 col-lg-6 col-xl-6">

                    <!--begin::Total Profit-->
                    <div class="kt-widget24">
                        <a href="{{ url('admin/client') }}">
                            <div class="kt-widget24__details">
                                <div class="kt-widget24__info">
                                    <h4 class="kt-widget24__title">
                                        Total Leads
                                    </h4>
                                    {{-- <span class="kt-widget24__desc">
                                    All Customs Value
                                </span> --}}
                                </div>
                                <span class="kt-widget24__stats kt-font-brand">
                                    {{ $client }}
                                </span>
                            </div>


                            {{-- <div class="progress progress--sm">
                            <div class="progress-bar kt-bg-brand" role="progressbar" style="width: 78%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div> --}}
                            <div class="kt-widget24__action">
                                {{-- <span class="kt-widget24__change">
                                Total Clients
                            </span> --}}
                                {{-- <span class="kt-widget24__number">
                                {{$client}}
                            </span> --}}
                            </div>
                        </a>
                    </div>

                    <!--end::Total Profit-->
                </div>
                <div class="col-md-12 col-lg-6 col-xl-6">

                    <!--begin::Total channel partner-->
                    <a href="{{ url('admin/channel-partner') }}">
                        <div class="kt-widget24">
                            <div class="kt-widget24__details">
                                <div class="kt-widget24__info">
                                    <h4 class="kt-widget24__title">
                                        Total Partners
                                    </h4>
                                    {{-- <span class="kt-widget24__desc">
                                Customer Review
                            </span> --}}
                                </div>
                                <span class="kt-widget24__stats kt-font-warning">
                                    {{ $aprtner }}
                                </span>
                            </div>
                            {{-- <div class="progress progress--sm">
                        <div class="progress-bar kt-bg-warning" role="progressbar" style="width: 84%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> --}}
                            <div class="kt-widget24__action">
                                {{-- <span class="kt-widget24__change">
                            Total channel partner
                        </span> --}}
                                {{-- <span class="kt-widget24__number">
                            {{$aprtner}}
                        </span> --}}
                            </div>
                        </div>
                    </a>
                    <!--end::New Feedbacks-->
                </div>
                {{-- <div class="col-md-12 col-lg-6 col-xl-3">

                <!--begin::New Orders-->
                <div class="kt-widget24">
                    <div class="kt-widget24__details">
                        <div class="kt-widget24__info">
                            <h4 class="kt-widget24__title">
                                New Orders
                            </h4>
                            <span class="kt-widget24__desc">
                                Fresh Order Amount
                            </span>
                        </div>
                        <span class="kt-widget24__stats kt-font-danger">
                            567
                        </span>
                    </div>
                    <div class="progress progress--sm">
                        <div class="progress-bar kt-bg-danger" role="progressbar" style="width: 69%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="kt-widget24__action">
                        <span class="kt-widget24__change">
                            Change
                        </span>
                        <span class="kt-widget24__number">
                            69%
                        </span>
                    </div>
                </div>

                <!--end::New Orders-->
            </div>
            <div class="col-md-12 col-lg-6 col-xl-3">

                <!--begin::New Users-->
                <div class="kt-widget24">
                    <div class="kt-widget24__details">
                        <div class="kt-widget24__info">
                            <h4 class="kt-widget24__title">
                                New Users
                            </h4>
                            <span class="kt-widget24__desc">
                                Joined New User
                            </span>
                        </div>
                        <span class="kt-widget24__stats kt-font-success">
                            276
                        </span>
                    </div>
                    <div class="progress progress--sm">
                        <div class="progress-bar kt-bg-success" role="progressbar" style="width: 90%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="kt-widget24__action">
                        <span class="kt-widget24__change">
                            Change
                        </span>
                        <span class="kt-widget24__number">
                            90%
                        </span>
                    </div>
                </div>

                <!--end::New Users-->
            </div> --}}
            </div>
        </div>
    </div>

    <!--end:: Widgets/Stats-->

    <!--Begin::Row-->
    {{-- <div class="row">
    <div class="col-xl-12">

        <!--begin:: Widgets/Sale Reports-->
        <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Sales Reports
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">

                <!--Begin::Tab Content-->
                <div class="tab-content">

                    <!--begin::tab 1 content-->
                    <div class="tab-pane active" id="kt_widget11_tab1_content">

                        <!--begin::Widget 11-->

                        <!--end::Widget 11-->
                    </div>

                    <!--end::tab 1 content-->

                    <!--begin::tab 2 content-->
                    <div class="tab-pane" id="kt_widget11_tab2_content">

                        <!--begin::Widget 11-->
                        <div class="kt-widget11">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td style="width:1%">#</td>
                                            <td style="width:40%">Application</td>
                                            <td style="width:14%">Sales</td>
                                            <td style="width:15%">Change</td>
                                            <td style="width:15%">Status</td>
                                            <td style="width:15%" class="kt-align-right">Total</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <label class="kt-checkbox kt-checkbox--single">
                                                    <input type="checkbox"><span></span>
                                                </label>
                                            </td>
                                            <td>
                                                <span class="kt-widget11__title">Loop</span>
                                                <span class="kt-widget11__sub">CRM System</span>
                                            </td>
                                            <td>19,200</td>
                                            <td>$63</td>
                                            <td><span class="kt-badge kt-badge--inline kt-badge--danger">pending</span></td>
                                            <td class="kt-align-right kt-font-brand  kt-font-bold">$23,740</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="kt-checkbox kt-checkbox--single"><input type="checkbox"><span></span></label>
                                            </td>
                                            <td>
                                                <span class="kt-widget11__title">Selto</span>
                                                <span class="kt-widget11__sub">Powerful Website Builder</span>
                                            </td>
                                            <td>24,310</td>
                                            <td>$39</td>
                                            <td><span class="kt-badge kt-badge--inline kt-badge--success">new</span></td>
                                            <td class="kt-align-right kt-font-success  kt-font-bold">$46,010</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="kt-checkbox kt-checkbox--single"><input type="checkbox"><span></span></label>
                                            </td>
                                            <td>
                                                <span class="kt-widget11__title">Jippo</span>
                                                <span class="kt-widget11__sub">The Best Selling App</span>
                                            </td>
                                            <td>9,076</td>
                                            <td>$105</td>
                                            <td><span class="kt-badge kt-badge--inline kt-badge--brand">approved</span></td>
                                            <td class="kt-align-right kt-font-danger kt-font-bold">$15,800</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="kt-checkbox kt-checkbox--single"><input type="checkbox"><span></span></label>
                                            </td>
                                            <td>
                                                <span class="kt-widget11__title">Verto</span>
                                                <span class="kt-widget11__sub">Web Development Tool</span>
                                            </td>
                                            <td>11,094</td>
                                            <td>$16</td>
                                            <td><span class="kt-badge kt-badge--inline kt-badge--info">done</span></td>
                                            <td class="kt-align-right kt-font-warning kt-font-bold">$8,520</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="kt-widget11__action kt-align-right">
                                <button type="button" class="btn btn-label-success btn-bold btn-sm">Generate Report</button>
                            </div>
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
</div> --}}

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
