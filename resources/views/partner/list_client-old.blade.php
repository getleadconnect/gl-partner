@extends('admin.layouts.client_master')
@section('content')

        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Client List</a></li>
					</ol>
                </div>
		    </div>
            <!-- row -->
            @if(session()->has('message'))
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
            @include('admin.partials.validation_error_box')
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Client Table</h4>
                            <h6 class="card-title" style="float:left"  ><a class="btn btn-info"  href="{{url('partner/client/create')}}">Add New Client</a></h4>
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
                                            <th>Commission</th>
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

        <!--**********************************
            Content body end
        ***********************************-->
        
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
@push('scripts')
	<script>

		var clientDatatable = $('#example').DataTable( {
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
                        console.log(data);
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
			            "url": "list_client",
			            "type": "GET"
			        },
			columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'mobile', name: 'mobile' },
                { data: 'commission_amount', name: 'commission_amount'},
                { data: 'payment_status', name: 'status' },
                { data: 'created_at', name: 'created_at' },
			]
		} );
	</script>
@endpush
@endsection