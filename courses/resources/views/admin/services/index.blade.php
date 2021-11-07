@include('admin.templates.header')

@include('admin.templates.sidebar')

@include('admin.templates.navbar')


<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class=" col-sm-6 ">
						<h2>Manage <b>Services</b></h2>
					</div>
					<div class=" col-sm-6 ">
						<a href="#addServiceModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Service</span></a>
						<!-- <a href="#deleteSemesterModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						 -->
					</div>
				</div>
			</div>
			<table style="table-layout:fixed; width: 100%;" class="table table-striped table-hover">
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
						<th>Cost</th>
						<th>Actions</th> 
					</tr>
				</thead>
				<tbody>
				@foreach ($services as $service)
     
					<tr>
						<!-- <td style="word-wrap: break-word">
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td> -->
						<td style="word-wrap: break-word"> {{$service->id}} </td>
						<td style="word-wrap: break-word"> {{$service->name}} </td>
                        <td style="word-wrap: break-word"> {{$service->cost}} </td>
						<td style="word-wrap: break-word">
							<a onClick="edit_function({{$service->id}})" href="#editServiceModal" class="edit" data-toggle="modal"><i class="bi bi-pencil-fill"></i></a>
							<a onClick="delete_function({{$service->id}})" href="#deleteServiceModal" class="delete" data-toggle="modal"><i class="bi bi-trash"></i></a>
						</td>
					</tr>

				@endforeach

				</tbody>
			</table>
			<div class="d-flex">
                {{ $services->links() }}
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
<div id="addServiceModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post" action="{{route('services.add')}}" enctype="multipart/form-data">
				@csrf
				<div class="modal-header">						
					<h4 class="modal-title">Add Service</h4>
					<button type="button " class="close btn-danger" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
                    <div class="form-group">		
                        <label>Photo</label>
						<input type="file" name="photo" class="form-control" name="photo" required>
                        </div>		
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Cost</label>
						<input type="number" name="cost" class="form-control"required>
					</div>
                    <div class="form-group">
						<label>Summery</label>
						<textarea class="form-control" name="summery" rows="3"  required></textarea>
					</div>
                    <div class="form-group">
						<label>Details</label>
						<textarea class="form-control" name="details" rows="3"  required></textarea>
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
<div id="editServiceModal" class="modal fade">
	<div class="modal-dialog ">
		<div class="modal-content">
            <form method="post" action="{{route('services.edit')}}" enctype="multipart/form-data">
				@csrf
                <input type="hidden" id="edit_hidden_id" name="id" >
				<div class="modal-header">						
					<h4 class="modal-title">Edit Service</h4>
					<button type="button " class="close btn-danger" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">	
                <div class="form-group">
                        <img style="height: 150px; width: 300px; margin-bottom: 15px; border-radius:2em;" id="edit_photo">
						<label>Photo</label>
						<input type="file" name="photo" class="form-control" required>
					</div>				
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" id="edit_name" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Cost</label>
						<input type="number" name="cost" id="edit_cost" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>Summery</label>
						<textarea class="form-control" name="summery" id="edit_summery" rows="3"  required></textarea>
					</div>
                    <div class="form-group">
						<label>Details</label>
						<textarea class="form-control" name="details" id="edit_details" rows="3"  required></textarea>
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
<div id="deleteServiceModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="delete_form" method="post" action="{{route('services.delete')}}">
				@csrf
                <input type="hidden" id="delete_hidden_id" name="id" >
				<div class="modal-header">						
					<h4 class="modal-title">Delete Service</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
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
			url: "{{ route('services.data_to_edit') }}" ,
			data: formData,
			dataType: "json",
			encode: true,
			}).done(function (data) {
			console.log(data);
			$("#edit_name").attr("value", data.name);
            $("#edit_cost").attr("value", data.cost);
            $("#edit_photo").attr("src", data.photo);
            $("#edit_summery").val( data.summery );
            $("#edit_details").val( data.details );
		});

	}

</script>


