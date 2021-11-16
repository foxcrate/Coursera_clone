@include('admin.templates.header')

@include('admin.templates.sidebar')

@include('admin.templates.navbar')


<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class=" col-sm-6 ">
						<h2>Manage <b>Researches</b></h2>
					</div>
					<div class=" col-sm-6 ">
						<a href="#addResearchModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Research</span></a>
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
						<th>Semester Name</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
				@foreach ($all_researches as $research)

					<tr>
						<!-- <td style="word-wrap: break-word">
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td> -->
						<td style="word-wrap: break-word"> {{$research->id}} </td>
						<td style="word-wrap: break-word"> {{$research->name}} </td>
                        <td style="word-wrap: break-word"> {{$research->semester->name}} </td>
						<td style="word-wrap: break-word">
							<a onClick="edit_function({{$research->id}})" href="#editResearchModal" class="edit" data-bs-toggle="modal" ><i class="bi bi-pencil-fill"></i></a>
                            <a onClick="delete_function({{$research->id}})" href="#deleteResearchModal" class="delete" data-bs-toggle="modal"><i class="bi bi-trash"></i></a>
						</td>
					</tr>

				@endforeach

				</tbody>
			</table>
			<div class="d-flex pages">
                {{ $all_researches->links() }}
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
<div id="addResearchModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post" action="{{route('researches.add')}}" enctype="multipart/form-data">
				@csrf
				<div class="modal-header">
					<h4 class="modal-title">Add Research</h4>
					<button type="button " class="close btn-danger" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" class="form-control" required>
					</div>
                    <div class="form-group">
                        <label>Description</label>
						<textarea class="form-control" name="description" id="description" rows="3"  required></textarea>
                    </div>
                    <div class="form-group">
						<label>Semester</label>
						{{-- <input type="number" id="edit_project_id" name="project_id" class="form-control"> --}}
                        <select class="form-control" id='semestert_id' name="semester_id">
							@foreach ( $all_semesters as $semester  )

								<option value="{{$semester->id}}">{{$semester->id}} - {{$semester->name}} </option>

							@endforeach

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

<div id="editResearchModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post" action="{{route('researches.edit')}}">
				<input type="hidden" id="edit_hidden_id" name="id" >
				@csrf
				<div class="modal-header">
					<h4 class="modal-title">Submit Research</h4>
					<button type="button" class="close btn-danger" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">

					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" id="edit_name" class="form-control" required>
					</div>
                    <div class="form-group">
                        <label>Description</label>
						<textarea class="form-control" name="description" id="edit_description" rows="3"  required></textarea>
                    </div>
                    <div class="form-group">
						<label>Semester</label>
						{{-- <input type="number" id="edit_project_id" name="project_id" class="form-control"> --}}
                        <select class="form-control" id='edit_semestert_id' name="semester_id">
							@foreach ( $all_semesters as $semester  )

								<option value="{{$semester->id}}">{{$semester->id}} - {{$semester->name}} </option>

							@endforeach

						</select>
					</div>

				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-info" value="Save">
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Delete Modal HTML -->
<div id="deleteResearchModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="delete_form" method="post" action="{{route('researches.delete')}}">
                <input type="hidden" id="delete_hidden_id" name="id" >
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Delete Research</h4>
                    <button type="button" class="close btn-danger" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete these Records?</p>
                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-danger" value="Delete">
                </div>
            </form>
		</div>
	</div>
</div>



<script>

    var edit_id = 0;
	var delete_id = 0;

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
			url: "{{ route('researches.data_to_edit') }}" ,
			data: formData,
			dataType: "json",
			encode: true,
			}).done(function (data) {
			console.log(data);
			$("#edit_name").attr("value", data.name);
            $("#edit_description").val( data.description );
            document.getElementById('edit_semestert_id').value = data.semester_id;
        });

	}

</script>


