@if (count($errors) > 0)
	<div class="alert alert-danger" role="alert">
		<div class="alert-text">
			<h4 class="alert-heading">Got Issues!</h4>
			<p>There were some problems with your input.</p>
			<hr>
			@foreach ($errors->all() as $error)

			    <p class="mb-0">{{ $error }}</p>

			@endforeach
			
		</div>
	</div>
@endif