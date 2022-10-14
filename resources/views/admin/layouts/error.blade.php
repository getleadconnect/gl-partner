<!DOCTYPE html>

<html lang="en">

<!-- begin::Head -->
<head>
	<base href="../../../">
	<meta charset="utf-8" />
	<title>{{ config('app.name') }} | @yield('error')</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!--begin::Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

	<!--end::Fonts -->

	<!--begin::Page Custom Styles(used by this page) -->
	<link rel="shortcut icon" href="{{ asset('backend/media/logos/favicon.ico') }}" />
		<link href="{{ asset('backend/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-aside--minimize kt-page--loading">

	<!-- begin:: Page -->
	@yield('content')
</body>

<!-- end::Body -->
</html>