@extends('admin.layouts.client_master')
@section('title','Dashboard')
      
@section('content')
<div class="content-body">
	<!-- row -->
	<div class="container-fluid">
		<!-- <div class="form-head d-flex mb-3 mb-md-4 align-items-start">
			<div class="mr-auto d-none d-lg-block">
				<h3 class="text-black font-w600">Welcome to GetLead Channel Partner!</h3>
				
			</div>
			
			<div class="input-group search-area ml-auto d-inline-flex">
				<input type="text" class="form-control" placeholder="Search here">
				<div class="input-group-append">
					<button type="button" class="input-group-text"><i class="flaticon-381-search-2"></i></button>
				</div>
			</div> 
			<a href="javascript:void(0);" class="settings-icon  ml-3"><i class="flaticon-381-settings-2 mr-0"></i></a>
		</div> -->
		<div class="row">
			@php
				$client = DB::table('clients')->where('partner_id',Auth::user()->id)->count();
				$amount_paid = DB::table('clients')->where('partner_id',Auth::user()->id)->where('payment_status','0')->sum('total_amount');
				$amount_not_paid = DB::table('clients')->where('partner_id',Auth::user()->id)->where('payment_status','1')->sum('commission_amount');
				$unpaid_client = DB::table('clients')->where('partner_id',Auth::user()->id)->where('payment_status','1')->count();
			@endphp	
			<div class="col-xl-3 col-xxl-3 col-sm-3">
				<div class="card gradient-bx text-white bg-danger rounded">	
				<a href="{{ url('admin/client') }}" class="client">
					<div class="card-body">
						<div class="media align-items-center">
							<div class="media-body">
								<p class="mb-1 text-white">Total Clients</p>
								<div class="d-flex flex-wrap">
									<h2 class="fs-40 font-w600 text-white mb-0 mr-3">{{$client}}</h2>
								</div>
							</div>
						</div>
					</div>
				</a>
				</div>
			</div>
			<div class="col-xl-3 col-xxl-3 col-sm-3">
				<div class="card gradient-bx text-white bg-success rounded">
				<!-- <a href="{{ url('admin/channel-partner')}}" class="client">	 -->
					<div class="card-body">
						<div class="media align-items-center">
							<div class="media-body">
								<p class="mb-1">Amount Paid</p>
								<div class="d-flex flex-wrap">
									<h2 class="fs-40 font-w600 text-white mb-0 mr-3">{{$amount_paid}}</h2>
								</div>
							</div>
						</div>
					</div>
				<!-- </a> -->
				</div>
			</div>
			<div class="col-xl-3 col-xxl-3 col-sm-3">
				<div class="card gradient-bx text-white bg-danger rounded">
				<!-- <a href="{{ url('admin/channel-partner')}}" class="client">	 -->
					<div class="card-body">
						<div class="media align-items-center">
							<div class="media-body">
								<p class="mb-1">Amount not Paid</p>
								<div class="d-flex flex-wrap">
									<h2 class="fs-40 font-w600 text-white mb-0 mr-3">{{$amount_not_paid}}</h2>
								</div>
							</div>
						</div>
					</div>
				<!-- </a> -->
				</div>
			</div>
			<div class="col-xl-3 col-xxl-3 col-sm-3">
				<div class="card gradient-bx text-white bg-success rounded">
				<!-- <a href="{{ url('admin/channel-partner')}}" class="client">	 -->
					<div class="card-body">
						<div class="media align-items-center">
							<div class="media-body">
								<p class="mb-1">Unpaid Clients</p>
								<div class="d-flex flex-wrap">
									<h2 class="fs-40 font-w600 text-white mb-0 mr-3">{{$unpaid_client}}</h2>
								</div>
							</div>
						</div>
					</div>
				<!-- </a> -->
				</div>
			</div>
		</div>
	</div>
</div>
@push('scripts')
@endsection