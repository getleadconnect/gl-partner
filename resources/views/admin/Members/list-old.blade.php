@extends('admin.layouts.master')
@section('content')
<input type="hidden" id="view_message" value="{{Session::get('message') }}">
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                {{-- <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Client List</a></li>
					</ol>
                </div> --}}
                <div class="row">
                    @php
                        $client = DB::table('users')->where('role_id',1)->count();
                        $amount_paid = DB::table('clients')->where('payment_status','0')->sum('total_amount');
                        $amount_not_paid = DB::table('clients')->where('payment_status','1')->sum('total_amount');
                        $unpaid_client = DB::table('clients')->where('payment_status','1')->count();
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
                <!-- row -->
                {{-- @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session()->get('message') }}
                </div>
                @endif
                @if (count($errors) > 0)
                <div class = "alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
                @endif
                @include('admin.partials.validation_error_box') --}}
                <div class="row">
                    <div class="col-12">
                        <div class="card" style="padding:1%;">
                            <div class="card-header">
                                <h4 class="card-title">Client Table</h4>
                                <h6 class="card-title" style="float:left"  ><a class="btn btn-info"  href="{{url('admin/client/create')}}">Add New Client</a></h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display min-w850">
                                        <thead>
                                            <tr>
                                                <th>Sl No.</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Mobile Number</th>
                                                <th>Status</th>
                                                <th>Added on</th>
                                                {{-- <th>Action</th> --}}
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->



    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
@push('scripts')
	<script>
		var productCatDataTable = $('#example').DataTable( {
			processing: true,
			responsive: true,
			serverSide: true,
			bDestroy: true,
			"pageLength": 50,
                order: [ [0, 'desc'] ],
			columnDefs: [

				{
					targets: 5,
				orderable: true,
					render: function(data, type, full, meta) {
						var status = {
							1: {'title': 'Active', 'class': ' badge light badge-success'},
							0: {'title': 'Inactive', 'class': 'badge light badge-warning'},
							2: {'title': 'Pending', 'class': 'badge light badge-danger'},
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="kt-badge ' + status[data].class + ' kt-badge--inline kt-badge--pill">' + status[data].title + '</span>';
					},
				},
				{
					targets: -1,
					title: 'Actions',
					orderable: true,
					render: function(data, type, full, meta) {
						return `
						<a class="btn btn-info" href="client/`+full.id+`/edit" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Edit Details">
						<i class="la la-edit"></i>Edit
						</a>`;
					},
				},
			],
			"ajax": {
			            "url": "clientlist",
			            "type": "GET"
			        },
			columns: [
			{ data: 'id', name: 'id' },
			{ data: 'name', name: 'name' },
			{ data: 'email', name: 'email' },
			{ data: 'mobile', name: 'mobile' },
			{ data: 'status', name: 'status' },
			{ data: 'created_at', name: 'created_at' },
			]
		} );

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
