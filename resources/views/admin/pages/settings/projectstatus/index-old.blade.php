@extends('admin.layouts.master')
@section('title','Project Status Settings')
@section('content')


        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Project Status List</a></li>

					</ol>
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
                                <h4 class="card-title">Project Status Table</h4>
                                 <h6 class="card-title" style="float:left"  ><a class="btn btn-info"  href="{{url('admin/projectstatus/create')}}">Add New Project Status</a></h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display min-w850">
                                        <thead>
				<tr>
					<th>Sl No.</th>
					<th>Status</th>


					<th>Added on</th>
					<th>Action</th>
				</tr>
			</thead>

		</table>

	</div>
</div>
@push('scripts')
	<script>
		var productCatDataTable = $('#example').DataTable( {
			processing: true,
			responsive: true,
			serverSide: true,
			bDestroy: true,
			"pageLength": 50,
			columnDefs: [


				{
					targets: 3,
					title: 'Actions',
					orderable: true,
					render: function(data, type, full, meta) {
						return `
						<a class="btn btn-info" href="projectstatus/`+full.id+`/edit" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Edit Details">
						<i class="la la-edit"></i>
						</a>
                      <a class="btn btn-danger" onclick="deleteConfirmation(`+full.id+`)"><i class="fa fa-trash" aria-hidden="true"></i> </a>
						`;
					},
				},
			],
			"ajax": {
			            "url": "projectstatuslist",
			            "type": "GET"
			        },
			columns: [
			{ data: 'id', name: 'id' },
			{ data: 'status', name: 'status' },


			{ data: 'created_at', name: 'created_at' },
			]
		} );
	</script>
	</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
	<script type="text/javascript">
function deleteConfirmation(id) {
swal({
title: "Delete?",
text: "Please ensure and then confirm!",
type: "warning",
showCancelButton: !0,
confirmButtonText: "Yes, delete it!",
cancelButtonText: "No, cancel!",
reverseButtons: !0
}).then(function (e) {
if (e.value === true) {
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$.ajax({
type: 'GET',
url: "{{url('/admin/projectstatusdelete')}}/" + id,
data: {_token: CSRF_TOKEN},
dataType: 'JSON',
success: function (results) {
if (results.success === true) {
$('#example').DataTable().ajax.reload();
swal("Done!", results.message, "success");
} else {
swal("Error!", results.message, "error");
}
}
});
} else {
e.dismiss;
}
}, function (dismiss) {
return false;
})
}
</script>
@endpush
@endsection
