@extends('admin.templates.header')

@include('admin.templates.sidebar')

@include('admin.templates.navbar')

@section('title')
<title>My Projects</title>
@endsection

<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class=" col-sm-6 ">
						<h2>Manage <b>Projects</b></h2>
                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </
                        @endif
					</div>
					<div class=" col-sm-6 ">
						<a href="#addCycleModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Project</span></a>
						<!-- <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						 -->
					</div>
				</div>
			</div>
			<table style="table-layout:fixed; width: 100%;" class="table table-striped table-hover">
				<thead>
					<tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
						<th>ID</th>
						<th>Name</th>
                        <th>Image</th>
                        <th>Type</th>
                        <th>Price</th>
                        <!-- <th>Summery</th> -->
						<th>Actions</th> 
					</tr>
				</thead>
				<tbody>
				@foreach ($projects as $project)
     
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
						<td style="word-wrap: break-word"> {{$project->id}} </td>
                        <td style="word-wrap: break-word"> <p class="my_p">{{$project->name}}</p> </td>
						<!-- <td> {{$project->image}} </td> -->
                        @if(isset($project->image))
                            <td>
                                <img style="height: 40px; width: 40px; margin-bottom: 15px; border-radius:2em;" src="{{asset($project->image)}}">
                            </td>
                        @else
                        <td>No Image</td>
                        @endif
                        <td style="word-wrap: break-word"> {{$project->type}} </td>
                        <!-- <td> {{$project->video}} </td> -->
                        <td style="word-wrap: break-word"> {{$project->price}} </td>
                        <!-- <td> {{$project->summery}} </td> -->
						<td style="word-wrap: break-word" >
							<!-- <a onClick="edit_function({{$project->id}})" href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a> -->
							<a onClick="edit_function({{$project->id}})" href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="bi bi-pencil-fill"></i></a>
							<!-- <a onClick="delete_function({{$project->id}})" href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a> -->
							<a onClick="delete_function({{$project->id}})" href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="bi bi-trash"></i></a>
							<a href="{{ route('projects.details',['id'=>$project->id]) }}" title="Semesters" class="details"><i class="bi bi-eye-fill"></i></a>
						</td>
					</tr>

				@endforeach

				</tbody>
			</table>
			<div class="clearfix">
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
			</div>
		</div>
	</div>        
</div>

 <!-- <video width="400" controls>
                <source src="http://localhost:8000/{{ $project->video }}" type="video/mp4">
                Your browser does not support HTML video.
            </video> -->

<!-- Add Modal HTML -->
<div id="addCycleModal" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form method="post" action="{{route('projects.add')}}" enctype="multipart/form-data" >
				@csrf
				<div class="modal-header">						
					<h4 class="modal-title">Add Project</h4>
					<button type="button " class="close btn-danger" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" class="form-control" required >
					</div>
                    <div class="form-group">
						<label>Image</label>
						<input type="file" name="image" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>Type</label>
						<select name="type" class="form-select" aria-label="Default select example">
                            <option selected value="php">PHD</option>
                            <option value="master">Master</option>
                            <option value="diploma">Diploma</option>
                            <option value="fellowship">Fellowship</option>
                        </select>
					</div>
                    <div class="form-group">
						<label>Video</label>
						<input type="file" name="video" class="form-control"  required>
					</div>
                    <div class="form-group">
						<label>Price</label>
						<input type="number" name="price" class="form-control" required >
					</div>
                    <!-- <div class="form-group">
						<label>Summery</label>
						<input type="text" name="summery" class="form-control" >
					</div>		 -->
					
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Summery</label>
						<textarea class="form-control" name="summery" id="summery" rows="3"  required></textarea>
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
<div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form method="post" action="{{route('projects.add')}}" enctype="multipart/form-data" >
				@csrf
				<div class="modal-header">						
					<h4 class="modal-title">Add Project</h4>
					<button type="button " class="close btn-danger" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				
				<div class="modal-body">					
					<div class="form-group">
						<label>Name</label>
						<input type="text" id="edit_name" name="name" class="form-control" required >
					</div>
                    <div class="form-group">
						<label>Image</label>
						<input type="file" id="edit_image" name="image" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>Type</label>
						<select name="type" class="form-select" aria-label="Default select example">
                            <option selected value="phd">PHD</option>
                            <option value="master">Master</option>
                            <option value="diploma">Diploma</option>
                            <option value="fellowship">Fellowship</option>
                        </select>
					</div>
                    <div class="form-group">
						<label>Video</label>
						<input type="file" id="edit_video" name="video" class="form-control"  required>
					</div>
                    <div class="form-group">
						<label>Price</label>
						<input type="number" id="edit_price" name="price" class="form-control" required >
					</div>
					
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Summery</label>
						<textarea class="form-control" name="summery" id="edit_summery" rows="3"  required></textarea>
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
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="delete_form" method="post" action="{{route('projects.delete')}}">
				@csrf
				<div class="modal-header">						
					<h4 class="modal-title">Delete Project</h4>
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

	// $(document).ready(function(){
	// 	// $("#edit_button").click(function(){
	// 	// 	alert("Alo");
	// 	// });
	// });
	var edit_id = 0;
	var delete_id = 0;

	function edit_function(id){
		edit_id = id;
		//alert(edit_id);
		
		var formData = {
			id:edit_id,
		};

		$.ajax({
			headers: {
     			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   			},
			type: "GET",
			url: "{{ route('projects.data_to_edit') }}" ,
			data: formData,
			dataType: "json",
			encode: true,
			}).done(function (data) {
			console.log(data);
			$("#edit_name").attr("placeholder", data.name);
		});

	}

	function delete_function(id){
		
		delete_id = id;
		// alert(delete_id);
	}

	$("#edit_form").submit(function(e) {

		e.preventDefault(); // avoid to execute the actual submit of the form.

		var formData = {
			id:edit_id,
			name: $("#edit_modal_name").val(),
			start_date: $("#edit_modal_start_date").val(),
		};

		$.ajax({
			headers: {
     			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   			},
			type: "POST",
			url: e.target.action,
			data: formData,
			dataType: "json",
			encode: true,
			}).done(function (data) {
			// console.log(data);
			window.location.reload();
		});

	});

	$("#delete_form").submit(function(e) {

		//alert(delete_id);

		e.preventDefault(); // avoid to execute the actual submit of the form.

		var formData = {
			id: delete_id,
		};

		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			type: "POST",
			url: e.target.action,
			data: formData,
			dataType: "json",
			encode: true,
			}).done(function (data) {
			//console.log(data);
			window.location.reload();
		});

	});

</script>
