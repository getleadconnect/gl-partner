@extends('admin.layouts.master')
@section('title','Project  Settings')
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
						<li class="breadcrumb-item"><a href="javascript:void(0)">Project List</a></li>

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
                                <h4 class="card-title">Project Table</h4>
                                 <h6 class="card-title" style="float:left"  ><a class="btn btn-info"  href="{{url('admin/project/create')}}">Add New Project</a></h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display min-w850">

			<thead>
				<tr>
					<th>Sl No.</th>
					<th>Project Name</th>
					<th>Description</th>
					<th>Project Type</th>
					<th>Project Value</th>
					<th>Project Owner</th>
					<th>Project Status</th>
					<th>Added on</th>
			 <th>Action</th>
				</tr>
			</thead>

		</table>

	</div>
</div>
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<style type="text/css">
    .swal2-icon .swal2-icon-content {
        font-size: 1.75em;
    }
    .swal2-icon {
        width: 3em !important;
        height: 3em !important;
      }
      .swal2-title {
          font-size: 1.6em !important;
        }
        .swal2-content, .swal2-html-container{
          font-size: 1.15em !important;
        }
        .swal2-icon.swal2-success [class^=swal2-success-line][class$=tip] {
            top: 1.9em;
            left: 0.3em;
            width: 1.1em;
        }
        .swal2-icon.swal2-success [class^=swal2-success-line][class$=long] {
            top: 1.475em;
            right: 0.3em;
            width: 1.7em;
        }
        .swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=left] {
            left: 0.4625em;
        }
        .swal2-icon.swal2-error [class^=swal2-x-mark-line] {
            top: 1.3125em;
            width: 2.1375em;
            height: 0.3125em;
        }
        .swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=right] {
            right: 0.4em;
        }
      /*  .swal2-styled.swal2-confirm{
          background-color: #1F3C5B !important;
          border:none !important;
        }
        .swal2-styled.swal2-confirm a{
          color:#fff !important;
        }*/
</style>
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
					targets: 8,
					title: 'Actions',
					orderable: true,
					render: function(data, type, full, meta) {
						return `

                            <a class="btn btn-info" href="project/`+full.id+`/edit" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Edit Details">
                        <i class="la la-edit"></i>Edit
                        </a>


                        <a class="btn btn-danger" onclick="deleteConfirmation(`+full.id+`)">Delete</a>

						`;
					},
				},
			],
			"ajax": {
			            "url": "projectlist",
			            "type": "GET"
			        },
			columns: [
			{ data: 'id', name: 'id' },
			{ data: 'project_name', name: 'project_name' },
			{ data: 'description', name: 'description' },
			{ data: 'project_type.project_type', name: 'project_type.project_type' },
			{ data: 'project_value', name: 'project_value' },
			{ data: 'project_owner.name', name: 'project_owner.name' },
            { data: 'project_status.status', name: 'project_status.status' },
			{ data: 'created_at', name: 'created_at' },
			]
		} );
	</script>


        </script>
>
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
url: "{{url('/admin/projectdelete')}}/" + id,
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
