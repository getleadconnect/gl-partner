{{-- @extends('errors::minimal')

@section('title', __('Server Error'))
@section('code', '500')
@section('message', __('Server Error')) --}}

@extends('admin.layouts.master')
@section('error', __('Server Error'))

@section('content')
	<link href="{{ asset('backend/css/pages/error/error-2.css') }}" rel="stylesheet" type="text/css" />
	<div class="kt-grid kt-grid--ver kt-grid--root kt-page">
		<div class="kt-grid__item kt-grid__item--fluid kt-grid  kt-error-v2" style="background-image: url({{ asset('backend/media/error/bg2.jpg') }});">
			<div class="kt-error_container">
				<span class="kt-error_title2 kt-font-light">
					<h1>OOPS 500!</h1>
				</span>
				<span class="kt-error_desc kt-font-light">
					Something went wrong here
				</span>
			</div>
		</div>
	</div>
@endsection
