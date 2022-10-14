{{-- @extends('errors::minimal')

@section('title', __('Page Expired'))
@section('code', '419')
@section('message', __('Page Expired'))
 --}}
@extends('admin.layouts.error')
@section('error', __('Page Expired'))

@section('content')
	<link href="{{ asset('backend/css/pages/error/error-5.css') }}" rel="stylesheet" type="text/css" />
<div class="kt-grid kt-grid--ver kt-grid--root kt-page">
	<div class="kt-grid__item kt-grid__item--fluid kt-grid  kt-error-v5" style="background-image: url({{ asset('backend/media/error/bg5.jpg') }});">
		<div class="kt-error_container">
			<span class="kt-error_title">
				<h1>Oops!</h1>
			</span>
			<p class="kt-error_subtitle">
				Something went wrong here.
			</p>
			<p class="kt-error_description">
				We're working on it and we'll get it fixed<br>
				as soon possible.<br>
				You can back or use our <a href="{{ url('admin/help-center') }}">Help Center</a>.
			</p>
		</div>
	</div>
</div>
@endsection