{{-- @extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found'))
 --}}

@extends('admin.layouts.master')
@section('error', __('Not Found'))

@section('content')
	<link href="{{ asset('backend/css/pages/error/error-3.css') }}" rel="stylesheet" type="text/css" />
<div class="kt-grid kt-grid--ver kt-grid--root kt-page">
	<div class="kt-grid__item kt-grid__item--fluid kt-grid  kt-error-v3" style="background-image: url({{ asset('backend/media/error/bg3.jpg') }});">
		<div class="kt-error_container">
			<span class="kt-error_number">
				<h1>404</h1>
			</span>
			<p class="kt-error_title kt-font-light">
				How did you get here
			</p>
			<p class="kt-error_subtitle">
				Sorry we can't seem to find the page you're looking for.
			</p>
			<p class="kt-error_description">
				There may be amisspelling in the URL entered,<br>
				or the page you are looking for may no longer exist.
			</p>
		</div>
	</div>
</div>

@endsection
