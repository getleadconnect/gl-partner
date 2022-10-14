<!DOCTYPE html>

<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4 & Angular 8
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">

<!-- begin::Head -->

<head>
    <base href="#">
    <meta charset="utf-8" />
    <title>Getlead Partner</title>
    <meta name="description" content="Login page example">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--begin::Fonts -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

    <!--end::Fonts -->

    <!--begin::Page Custom Styles(used by this page) -->
    <link href="{{ url('admin/assets/css/pages/login/login-5.css') }}" rel="stylesheet" type="text/css" />

    <!--end::Page Custom Styles -->

    <!--begin::Global Theme Styles(used by all pages) -->

    <!--begin:: Vendor Plugins -->
    <link href="{{ url('admin/assets/plugins/general/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('admin/assets/plugins/general/tether/dist/css/tether.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('admin/assets/plugins/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ url('admin/assets/plugins/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ url('admin/assets/plugins/general/bootstrap-timepicker/css/bootstrap-timepicker.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ url('admin/assets/plugins/general/bootstrap-daterangepicker/daterangepicker.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ url('admin/assets/plugins/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ url('admin/assets/plugins/general/bootstrap-select/dist/css/bootstrap-select.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ url('admin/assets/plugins/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ url('admin/assets/plugins/general/select2/dist/css/select2.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('admin/assets/plugins/general/ion-rangeslider/css/ion.rangeSlider.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('admin/assets/plugins/general/nouislider/distribute/nouislider.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('admin/assets/plugins/general/owl.carousel/dist/assets/owl.carousel.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('admin/assets/plugins/general/owl.carousel/dist/assets/owl.theme.default.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ url('admin/assets/plugins/general/dropzone/dist/dropzone.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('admin/assets/plugins/general/quill/dist/quill.snow.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('admin/assets/plugins/general/@yaireo/tagify/dist/tagify.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('admin/assets/plugins/general/summernote/dist/summernote.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('admin/assets/plugins/general/bootstrap-markdown/css/bootstrap-markdown.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ url('admin/assets/plugins/general/animate.css/animate.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('admin/assets/plugins/general/toastr/build/toastr.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('admin/assets/plugins/general/dual-listbox/dist/dual-listbox.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('admin/assets/plugins/general/morris.js/morris.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('admin/assets/plugins/general/sweetalert2/dist/sweetalert2.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('admin/assets/plugins/general/socicon/css/socicon.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('admin/assets/plugins/general/plugins/line-awesome/css/line-awesome.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('admin/assets/plugins/general/plugins/flaticon/flaticon.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('admin/assets/plugins/general/plugins/flaticon2/flaticon.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('admin/assets/plugins/general/@fortawesome/fontawesome-free/css/all.min.css') }}"
        rel="stylesheet" type="text/css" />

    <!--end:: Vendor Plugins -->
    <link href="{{ url('admin/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />

    <!--begin:: Vendor Plugins for custom pages -->
    <link href="{{ url('admin/assets/plugins/custom/plugins/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('admin/assets/plugins/custom/@fullcalendar/core/main.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('admin/assets/plugins/custom/@fullcalendar/daygrid/main.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('admin/assets/plugins/custom/@fullcalendar/list/main.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('admin/assets/plugins/custom/@fullcalendar/timegrid/main.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('admin/assets/plugins/custom/datatables.net-bs4/css/dataTables.bootstrap4.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ url('admin/assets/plugins/custom/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ url('admin/assets/plugins/custom/datatables.net-autofill-bs4/css/autoFill.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link
        href="{{ url('admin/assets/plugins/custom/datatables.net-colreorder-bs4/css/colReorder.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link
        href="{{ url('admin/assets/plugins/custom/datatables.net-fixedcolumns-bs4/css/fixedColumns.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link
        href="{{ url('admin/assets/plugins/custom/datatables.net-fixedheader-bs4/css/fixedHeader.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ url('admin/assets/plugins/custom/datatables.net-keytable-bs4/css/keyTable.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link
        href="{{ url('admin/assets/plugins/custom/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ url('admin/assets/plugins/custom/datatables.net-rowgroup-bs4/css/rowGroup.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link
        href="{{ url('admin/assets/plugins/custom/datatables.net-rowreorder-bs4/css/rowReorder.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ url('admin/assets/plugins/custom/datatables.net-scroller-bs4/css/scroller.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ url('admin/assets/plugins/custom/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ url('admin/assets/plugins/custom/jstree/dist/themes/default/style.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('admin/assets/plugins/custom/jqvmap/dist/jqvmap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('admin/assets/plugins/custom/uppy/dist/uppy.min.css') }}" rel="stylesheet" type="text/css" />

    <!--end:: Vendor Plugins for custom pages -->
    <link href="{{url('backend/css/form-custom-style.css')}}" rel="stylesheet" type="text/css">
    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->

    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="{{ url('admin/assets/media/favicon/favicon.ico') }}" />
</head>

<!-- end::Head -->

<!-- begin::Body -->

<body
    class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-aside--minimize kt-page--loading">

    <!-- begin:: Page -->
    <div class="kt-grid kt-grid--ver kt-grid--root kt-page">
        <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v5 kt-login--signin" id="kt_login">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile"
                style="background-image: url(admin/assets/media/bg/bg-3.jpg);">
                <div class="kt-login__left">
                    <div class="kt-login__wrapper">
                        <div class="kt-login__content">
                            <a class="kt-login__logo" href="#">
                                <img  class="partner-logo" style="width: 22% !important;" src="{{ url('admin/assets/media/logos/getlead-logo.svg') }}">
                            </a>
                            <h3 class="kt-login__title">Partner with Getlead</h3>
                            <span class="kt-login__desc">
                                Enable customer success and deliver outstanding business with the help of the right set of CRM tools
                            </span>
                            <div class="kt-login__actions">
                                <button type="button" id="kt_login_signup"
                                    class="btn btn-outline-brand btn-pill">Be A Partner</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kt-login__divider">
                    <div></div>
                </div>
                <div class="kt-login__right">
                    <div class="kt-login__wrapper">
                        <div class="kt-login__signin">
                            <div class="kt-login__head">
                                <h3 class="kt-login__title">Login To Your Account</h3>
                            </div>
                            <div class="kt-login__form">
                                <form class="kt-form kt-form--fit kt-form--label-right" action="{{ url('login') }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Email"
                                            name="email" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control form-control-last" type="Password" id="Password"
                                            placeholder="Password" name="password" required>
                                    </div>
                                    <div class="row kt-login__extra">
                                        {{-- <div class="col kt-align-left">
                                            <label class="kt-checkbox">
                                                <input type="checkbox" id="checkbox">&nbsp; Show Password
                                                <span></span>
                                            </label>
                                        </div> --}}
                                        {{-- <div class="col kt-align-right">
                                            <a href="javascript:;" id="kt_login_forgot" class="kt-link">Forget
                                                Password ?</a>
                                        </div> --}}
                                    </div>
                                    <div class="kt-login__actions">
                                        <button id="kt_login_signin_submit"
                                            class="btn btn-brand btn-pill btn-elevate">Sign In</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="kt-login__forgot">
                            <div class="kt-login__head">
                                <h3 class="kt-login__title">Forgotten Password ?</h3>
                                <div class="kt-login__desc">Enter your email to reset your password:</div>
                            </div>
                            <div class="kt-login__form">
                                <form class="kt-form" action="">
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Email"
                                            name="email" id="kt_email" autocomplete="off">
                                    </div>
                                    <div class="kt-login__actions">
                                        <button id="kt_login_forgot_submit"
                                            class="btn btn-brand btn-pill btn-elevate">Request</button>
                                        <button id="kt_login_forgot_cancel"
                                            class="btn btn-outline-brand btn-pill">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="kt-login__signup">
                            <div class="kt-login__head">
                                <h3 class="kt-login__title">Register Now</h3>
                            </div>
                            <div class="kt-login__form">
                                <form class="kt-form" action="{{ url('signup-frontend') }}" method="post"
                                    enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Name"
                                            id="name" name="name" value="{{ old('name') }}"
                                            autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="number" id="mobile"
                                            placeholder="Mobile Number" name="mobile" value="{{ old('mobile') }}"
                                            autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" id="company_name"
                                            placeholder="Company Name" name="company_name"
                                            value="{{ old('company_name') }}" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" id="email"
                                            placeholder="Email" name="email"
                                            value="{{ old('email') }}" autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="website" id="website"
                                            placeholder="Website" name="website"
                                            value="{{ old('website') }}" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" id="team_size"
                                            placeholder="Team size" name="team_size"
                                            value="{{ old('team_size') }}" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <select placeholder="Country" name="country" id="country"
                                            class="form-control">
                                            <option value="0" selected disabled>Select Country</option>
                                            @foreach ($countries as $key => $countries)
                                                <option value="{{ $key }}">{{ $countries }}</option>
                                            @endforeach

                                        </select>
                                        <input type="hidden" class="countrys" id="countrys" value=""
                                            name="countrys">
                                    </div>
                                    <div class="form-group">
                                        <select placeholder="State" name="state" id="state"
                                            class="form-control">
                                            <option value="0" selected disabled>Select State</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" id="city" placeholder="city"
                                            name="city" value="{{ old('city') }}" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" id="pin_code"
                                            placeholder="pincode" name="pin_code" value="{{ old('pin_code') }}"
                                            autocomplete="off">
                                    </div>

                                    <div class="kt-login__actions">
                                        <button id="kt_login_signup_submit"
                                            class="btn btn-brand btn-pill btn-elevate">Sign Up</button>
                                        <button id="kt_login_signup_cancel"
                                            class="btn btn-outline-brand btn-pill">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end:: Page -->

    <!-- begin::Global Config(global config for global JS sciprts) -->
    <script>
        var KTAppOptions = {
            "colors": {
                "state": {
                    "brand": "#22b9ff",
                    "light": "#ffffff",
                    "dark": "#282a3c",
                    "primary": "#5867dd",
                    "success": "#34bfa3",
                    "info": "#36a3f7",
                    "warning": "#ffb822",
                    "danger": "#fd3995"
                },
                "base": {
                    "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                    "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
                }
            }
        };
    </script>

    <!-- end::Global Config -->

    <!--begin::Global Theme Bundle(used by all pages) -->

    <!--begin:: Vendor Plugins -->
    <script src="{{ url('admin/assets/plugins/general/jquery/dist/jquery.js') }}" type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/general/popper.js/dist/umd/popper.js') }}" type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/general/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ url('admin/assets/plugins/general/js-cookie/src/js.cookie.js') }}" type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/general/moment/min/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/general/tooltip.js/dist/umd/tooltip.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ url('admin/assets/plugins/general/perfect-scrollbar/dist/perfect-scrollbar.js') }}"
        type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/general/sticky-js/dist/sticky.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/general/wnumb/wNumb.js') }}" type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/general/jquery-form/dist/jquery.form.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ url('admin/assets/plugins/general/block-ui/jquery.blockUI.js') }}" type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/general/js/global/integration/plugins/bootstrap-datepicker.init.js') }}"
        type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/general/js/global/integration/plugins/bootstrap-timepicker.init.js') }}"
        type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/general/bootstrap-daterangepicker/daterangepicker.js') }}"
        type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js') }}"
        type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/general/bootstrap-maxlength/src/bootstrap-maxlength.js') }}"
        type="text/javascript"></script>
    <script
        src="{{ url('admin/assets/plugins/general/plugins/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/general/bootstrap-select/dist/js/bootstrap-select.js') }}"
        type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/general/bootstrap-switch/dist/js/bootstrap-switch.js') }}"
        type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/general/js/global/integration/plugins/bootstrap-switch.init.js') }}"
        type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/general/select2/dist/js/select2.full.js') }}" type="text/javascript">
    </script>
    <script src="{{ url('admin/assets/plugins/general/ion-rangeslider/js/ion.rangeSlider.js') }}" type="text/javascript">
    </script>
    <script src="{{ url('admin/assets/plugins/general/typeahead.js/dist/typeahead.bundle.js') }}" type="text/javascript">
    </script>
    <script src="{{ url('admin/assets/plugins/general/handlebars/dist/handlebars.js') }}" type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/general/inputmask/dist/jquery.inputmask.bundle.js') }}"
        type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/general/inputmask/dist/inputmask/inputmask.date.extensions.js') }}"
        type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js') }}"
        type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/general/nouislider/distribute/nouislider.js') }}" type="text/javascript">
    </script>
    <script src="{{ url('admin/assets/plugins/general/owl.carousel/dist/owl.carousel.js') }}" type="text/javascript">
    </script>
    <script src="{{ url('admin/assets/plugins/general/autosize/dist/autosize.js') }}" type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/general/clipboard/dist/clipboard.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ url('admin/assets/plugins/general/dropzone/dist/dropzone.js') }}" type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/general/js/global/integration/plugins/dropzone.init.js') }}"
        type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/general/quill/dist/quill.js') }}" type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/general/@yaireo/tagify/dist/tagify.polyfills.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/general/@yaireo/tagify/dist/tagify.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ url('admin/assets/plugins/general/summernote/dist/summernote.js') }}" type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/general/markdown/lib/markdown.js') }}" type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/general/bootstrap-markdown/js/bootstrap-markdown.js') }}"
        type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/general/js/global/integration/plugins/bootstrap-markdown.init.js') }}"
        type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/general/bootstrap-notify/bootstrap-notify.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/general/js/global/integration/plugins/bootstrap-notify.init.js') }}"
        type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/general/jquery-validation/dist/jquery.validate.js') }}"
        type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/general/jquery-validation/dist/additional-methods.js') }}"
        type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/general/js/global/integration/plugins/jquery-validation.init.js') }}"
        type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/general/toastr/build/toastr.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/general/dual-listbox/dist/dual-listbox.js') }}" type="text/javascript">
    </script>
    <script src="{{ url('admin/assets/plugins/general/raphael/raphael.js') }}" type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/general/morris.js/morris.js') }}" type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/general/chart.js/dist/Chart.bundle.js') }}" type="text/javascript"></script>
    <script
        src="{{ url('admin/assets/plugins/general/plugins/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/general/plugins/jquery-idletimer/idle-timer.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/general/waypoints/lib/jquery.waypoints.js') }}" type="text/javascript">
    </script>
    <script src="{{ url('admin/assets/plugins/general/counterup/jquery.counterup.js') }}" type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/general/es6-promise-polyfill/promise.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ url('admin/assets/plugins/general/sweetalert2/dist/sweetalert2.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ url('admin/assets/plugins/general/js/global/integration/plugins/sweetalert2.init.js') }}"
        type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/general/jquery.repeater/src/lib.js') }}" type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/general/jquery.repeater/src/jquery.input.js') }}" type="text/javascript">
    </script>
    <script src="{{ url('admin/assets/plugins/general/jquery.repeater/src/repeater.js') }}" type="text/javascript">
    </script>
    <script src="{{ url('admin/assets/plugins/general/dompurify/dist/purify.js') }}" type="text/javascript"></script>

    <!--end:: Vendor Plugins -->
    <script src="{{ url('admin/assets/js/scripts.bundle.js') }}" type="text/javascript"></script>

    <!--begin:: Vendor Plugins for custom pages -->
    <script src="{{ url('admin/assets/plugins/custom/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ url('admin/assets/plugins/custom/@fullcalendar/core/main.js') }}" type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/custom/@fullcalendar/daygrid/main.js') }}" type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/custom/@fullcalendar/google-calendar/main.js') }}" type="text/javascript">
    </script>
    <script src="{{ url('admin/assets/plugins/custom/@fullcalendar/interaction/main.js') }}" type="text/javascript">
    </script>
    <script src="{{ url('admin/assets/plugins/custom/@fullcalendar/list/main.js') }}" type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/custom/@fullcalendar/timegrid/main.js') }}" type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/custom/gmaps/gmaps.js') }}" type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/custom/flot/dist/es5/jquery.flot.js') }}" type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/custom/flot/source/jquery.flot.resize.js') }}" type="text/javascript">
    </script>
    <script src="{{ url('admin/assets/plugins/custom/flot/source/jquery.flot.categories.js') }}" type="text/javascript">
    </script>
    <script src="{{ url('admin/assets/plugins/custom/flot/source/jquery.flot.pie.js') }}" type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/custom/flot/source/jquery.flot.stack.js') }}" type="text/javascript">
    </script>
    <script src="{{ url('admin/assets/plugins/custom/flot/source/jquery.flot.crosshair.js') }}" type="text/javascript">
    </script>
    <script src="{{ url('admin/assets/plugins/custom/flot/source/jquery.flot.axislabels.js') }}" type="text/javascript">
    </script>
    <script src="{{ url('admin/assets/plugins/custom/datatables.net/js/jquery.dataTables.js') }}" type="text/javascript">
    </script>
    <script src="{{ url('admin/assets/plugins/custom/datatables.net-bs4/js/dataTables.bootstrap4.js') }}"
        type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/custom/js/global/integration/plugins/datatables.init.js') }}"
        type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/custom/datatables.net-autofill/js/dataTables.autoFill.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/custom/datatables.net-autofill-bs4/js/autoFill.bootstrap4.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/custom/jszip/dist/jszip.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/custom/pdfmake/build/pdfmake.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/custom/pdfmake/build/vfs_fonts.js') }}" type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/custom/datatables.net-buttons/js/dataTables.buttons.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/custom/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/custom/datatables.net-buttons/js/buttons.colVis.js') }}"
        type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/custom/datatables.net-buttons/js/buttons.flash.js') }}"
        type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/custom/datatables.net-buttons/js/buttons.html5.js') }}"
        type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/custom/datatables.net-buttons/js/buttons.print.js') }}"
        type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/custom/datatables.net-colreorder/js/dataTables.colReorder.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/custom/datatables.net-fixedcolumns/js/dataTables.fixedColumns.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/custom/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/custom/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/custom/datatables.net-responsive/js/dataTables.responsive.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/custom/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/custom/datatables.net-rowgroup/js/dataTables.rowGroup.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/custom/datatables.net-rowreorder/js/dataTables.rowReorder.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/custom/datatables.net-scroller/js/dataTables.scroller.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/custom/datatables.net-select/js/dataTables.select.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/custom/jstree/dist/jstree.js') }}" type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/custom/jqvmap/dist/jquery.vmap.js') }}" type="text/javascript"></script>
    <script src="{{ url('admin/assets/plugins/custom/jqvmap/dist/maps/jquery.vmap.world.js') }}" type="text/javascript">
    </script>
    <script src="{{ url('admin/assets/plugins/custom/jqvmap/dist/maps/jquery.vmap.russia.js') }}" type="text/javascript">
    </script>
    <script src="{{ url('admin/assets/plugins/custom/jqvmap/dist/maps/jquery.vmap.usa.js') }}" type="text/javascript">
    </script>
    <script src="{{ url('admin/assets/plugins/custom/jqvmap/dist/maps/jquery.vmap.germany.js') }}" type="text/javascript">
    </script>
    <script src="{{ url('admin/assets/plugins/custom/jqvmap/dist/maps/jquery.vmap.europe.js') }}" type="text/javascript">
    </script>
    <script src="{{ url('admin/assets/plugins/custom/uppy/dist/uppy.min.js') }}" type="text/javascript"></script>

    <!--end:: Vendor Plugins for custom pages -->

    <!--end::Global Theme Bundle -->

    <!--begin::Page Scripts(used by this page) -->
    <script src="{{ url('admin/assets/js/pages/custom/login/login-general.js') }}" type="text/javascript"></script>

    <!--end::Page Scripts -->

    <script>
        $(document).ready(function() {
            var BaseUrl = location.origin;

            $('#country').on('change', function() {
                var selectedText = $(this).find('option:selected').text();
                    // alert(selectedText);

                $('#countrys').val(selectedText);
                        var country = $('#country').val();
                        // alert(country);

                var country = $('#country').val();
                $.ajax({
                    url: BaseUrl + '/state/' + country,
                    success: function(data) {
                        // console.log(data);
                        $.each(data.states, function(key, value) {
                            $('#state')
                                .append($("<option></option>").attr("value", key).text(
                                    value));
                        });
                    }
                })
            })
        });

        // $('#checkbox').on('change', function(){
        //     // if(checkbox.checked)
        //     // {
        //     //     alert($('#password').attr());
        //     //     $('#password').attr("type","text");
        //     // }
        //     $('#password').attr('type',$('#checkbox').prop('checked')==true? "text":"password");
        // });
    </script>
</body>

<!-- end::Body -->

</html>
