@include('admin.templates.header')

@include('admin.templates.sidebar')

@include('admin.templates.navbar')


<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class=" col-sm-6 ">
						<h2>Manage <b>Admins</b></h2>
					</div>
					<div class=" col-sm-6 ">
						<a href="#addAdminModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Admin</span></a>
						<!-- <a href="#deleteSemesterModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						 -->
					</div>
				</div>
			</div>
			<table style="table-layout:fixed; width: 100%;" class="table table_condensed table-striped table-hover">
				<thead>
					<tr>
						<!-- <th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th> -->
						<th>ID</th>
						<th>Name</th>
                        <th>Email</th>
						<th>Role</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
				@foreach ($all_admins as $admin)

					<tr>
						<!-- <td style="word-wrap: break-word">
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td> -->
						<td style="word-wrap: break-word"> {{$admin->id}} </td>
						<td style="word-wrap: break-word"> {{$admin->name}} </td>
                        <td style="word-wrap: break-word"> {{$admin->email}} </td>
                        @if( $admin->level == 0 )
                        <td style="word-wrap: break-word"> General </td>
                        @elseif ( $admin->level == 1 )
                        <td style="word-wrap: break-word"> Content </td>
                        @elseif ( $admin->level == 2 )
                        <td style="word-wrap: break-word"> Payment </td>
                        @endif
						<td style="word-wrap: break-word">
							<a onClick="edit_function({{$admin->id}})" href="#editAdminModal" class="edit" data-toggle="modal"><i class="bi bi-pencil-fill"></i></a>
                            <a onClick="delete_function({{$admin->id}})" href="#deleteAdminModal"  class="delete" data-toggle="modal"><i class="bi bi-trash"></i></a>
						</td>
					</tr>

				@endforeach

				</tbody>
			</table>
			<div class="d-flex pages">
                {{ $all_admins->links() }}
            </div>
			<!-- <div class="clearfix">
				<div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
				<ul class="pagination">
					<li class="page-item disabled"><a href="#">Previous</a></li>
					<li class="page-item"><a href="#" class="page-link">1</a></li>
					<li class="page-item"><a href="#" class="page-link">2</a></li>
					<li class="page-item active"><a href="#" class="page-link">3</a></li>
					<li class="page-item"><a href="#" class="page-link">4</a></li>
					<li class="page-item"><a href="#" class="page-link">5</a></li>
					<li class="page-item"><a href="#" class="page-link">Next</a></li>
				</ul>
			</div> -->
		</div>
	</div>
</div>
<!-- Add Modal HTML -->
<div id="addAdminModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post" action="{{route('admins.add')}}" enctype="multipart/form-data">
				@csrf
				<div class="modal-header">
					<h4 class="modal-title">Add Admin</h4>
					<button type="button " class="close btn-danger" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>Email</label>
						<input type="text" name="email" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>Password</label>
						<input type="text" name="password" class="form-control" required>
					</div>
                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" name="role" required>
							<option value="0">General</option>
							<option value="1">Content</option>
                            <option value="2">Payment</option>
						</select>
                    </div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Edit Modal HTML -->
<div id="editAdminModal" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
            <form method="post" action="{{route('admins.edit')}}" >
				@csrf
                <input type="hidden" id="edit_hidden_id" name="id" >
				<div class="modal-header">
					<h4 class="modal-title">Edit Admin</h4>
					<button type="button " class="close btn-danger" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
                <div class="form-group">
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" id="edit_name" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>Email</label>
						<input type="text" name="email" id="edit_email" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>Password</label>
						<input type="text" name="password" id="edit_password" class="form-control" required>
					</div>
                    <div>
						<label>Role</label>
						<select class="form-control" name="role" id="edit_role" required>
							<option value="0">General</option>
							<option value="1">Content</option>
                            <option value="2">Payment</option>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>


<div id="deleteAdminModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="delete_form" method="post" action="{{route('admins.delete')}}">
                <input type="hidden" id="delete_hidden_id" name="id" >
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Delete Research</h4>
                    <button type="button" class="close btn-danger" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete these Records?</p>
                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-danger" value="Delete">
                </div>
            </form>
		</div>
	</div>
</div>

<script>

    var edit_id = 0;
	var delete_id = 0;
    //$('#editAdminModal').modal('show');

	function delete_function(id){

		delete_id = id;
        $("#delete_hidden_id").attr("value", delete_id);
		// alert(delete_id);
	}

	function edit_function(id){
		edit_id = id;
		//alert(edit_id);
        $("#edit_hidden_id").attr("value", edit_id);

		var formData = {
			id:edit_id,
		};

		$.ajax({
			headers: {
     			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   			},
			type: "GET",
			url: "{{ route('admins.data_to_edit') }}" ,
			data: formData,
			dataType: "json",
			encode: true,
			}).done(function (data) {
			console.log(data);
			$("#edit_name").attr("value", data.name);
            $("#edit_email").attr("value", data.email);
            $("#edit_password").attr("value", data.password2);
			$("#edit_role> option[value=" + data.level + "]").prop("selected",true);
		});

	}

</script>


