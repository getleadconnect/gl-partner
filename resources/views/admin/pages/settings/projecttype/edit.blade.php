<form class="kt-form kt-form--label-right" id="addForm" name="addForm" method="post"
    action="{{ url('admin/projecttype') }}" enctype="multipart/form-data">
    {{ method_field('PUT') }}
    @csrf
    <div class="modal-body">
        <div class="form-group">
            <label for="recipient-name" class="form-control-label">Enter Project Type</label>
            <input type="text" class="form-control" placeholder="Enter Name"
                value="" name="name" id="name" required autofocus>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" id="addClientSubmit"
            data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</form>