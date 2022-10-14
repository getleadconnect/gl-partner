@extends('admin.layouts.master')
@section('title','Business Account Settings')
@section('content')
<div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Business Account  List</a></li>
						
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
                                <h4 class="card-title">Business Account Table</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display min-w850" style="width: 100%;">
                                        <thead>
				<tr>
					<th>Sl No.</th>
					<th>Name</th>
					<th>Mobile</th>
					<th>Email</th>
					<th>Company Name</th>
					<th>Website</th>
					<th>Team Size</th>
					<th>Country</th>
					<th>State</th>
					<th>City</th>
					<th>Pincode</th>
			 <th>Added On</th> 
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
			order: [ [0, 'desc'] ],
			"pageLength": 5,
			columnDefs: [
				
			{
					targets: 12,
					title: 'Actions',
					orderable: true,
					render: function(data, type, full, meta) {
						   if(full.email_verified_at ===null){
return `
					
  

						<p>Email is not Verified</p>
						`;
						   }
						   else{
						return `
					
  

						<a class="btn btn-info" onclick="deleteConfirmation(`+full.id+`)">Add to Channel Partner</a>
						`;
					}
					},
				},	
			],
			"ajax": {
			            "url": "businessregistrationlist",
			            "type": "GET"
			        },
			columns: [
			{ data: 'id', name: 'id' },
			{ data: 'name', name: 'name' },
			
				{ data: 'mobile', name: 'mobile' },
				{ data: 'email', name: 'email' },
			
				{ data: 'company_name', name: 'company_name' },
			
				{ data: 'website', name: 'website' },
			
				{ data: 'team_size', name: 'team_size' },
			
				{ data: 'country', name: 'country' },
			    
			    { data: 'state', name: 'state' },
			    { data: 'city', name: 'city' },
                { data: 'pin_code', name: 'pin_code' },
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
title: "Add to Channel Partner?",
text: "Please ensure and then confirm!",
type: "success",
showCancelButton: !0,
confirmButtonText: "Yes, Add to Channel Partner!",
cancelButtonText: "No, cancel!",
reverseButtons: !0
}).then(function (e) {
if (e.value === true) {
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$.ajax({
type: 'GET',
url: "{{url('/admin/addto-channel')}}/" + id,
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
