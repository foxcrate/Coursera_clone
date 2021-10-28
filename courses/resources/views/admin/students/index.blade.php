@include('admin.templates.header')

@include('admin.templates.sidebar')

@include('admin.templates.navbar')


<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class=" col-sm-6 ">
						<h2>Manage <b>Students</b></h2>
					</div>
					<div class=" col-sm-6 ">
						<a href="#addStudentModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Student</span></a>
						<!-- <a href="#deleteSemesterModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						 -->
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
						<th>Basic Information</th>
                        <th>Case</th>
                        <th>Status</th>
                        <th>country</th>
						<th>Actions</th> 
					</tr>
				</thead>
				<tbody>
				@foreach ($students as $student)
     
					<tr>
						<td style="word-wrap: break-word">
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
						<td style="word-wrap: break-word"> {{$student->id}} </td>
						<td style="word-wrap: break-word"> <p> {{$student->name}} <br>  {{$student->email}} <br>  {{$student->phone1}} </p> </td>
                        <td style="word-wrap: break-word"> {{$student->case}} </td>
                        <td style="word-wrap: break-word"> {{$student->status}} </td>
                        <td style="word-wrap: break-word"> {{$student->country}} </td>
						<td style="word-wrap: break-word">
							<a onClick="edit_function({{$student->id}})" href="#editStudentModal" class="edit" data-toggle="modal"><i class="bi bi-pencil-fill"></i></a>
							<a onClick="delete_function({{$student->id}})" href="#deleteStudentModal" class="delete" data-toggle="modal"><i class="bi bi-trash"></i></a>
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
<!-- Add Modal HTML -->
<div id="addStudentModal" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form method="post" action="{{route('students.add')}}">
				@csrf
				<div class="modal-header">						
					<h4 class="modal-title">Add Student</h4>
					<button type="button " class="close btn-danger" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>Email</label>
						<input type="email" name="email" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>Password</label>
						<input type="text" name="password" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>Primary Phone</label>
						<input type="number" name="phone1" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>Secondary Phone</label>
						<input type="number" name="phone2" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>Case</label>
						<input type="text" name="case" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>Country</label>
						<input type="text" name="country" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>Status</label>
						<input type="text" name="status" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>Passport</label>
						<input type="number" name="passport" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>Job</label>
						<input type="text" name="job" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>General Note</label>
						<input type="text" name="general_note" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>Payment Note</label>
						<input type="text" name="payment_note" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>Money Paid</label>
						<input type="number" name="money_paid" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>Money To Pay</label>
						<input type="number" name="money_to_pay" class="form-control" required>
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
<div id="editStudentModal" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
            <form method="post" action="{{route('students.edit')}}"">
				@csrf
                <input type="hidden" id="edit_hidden_id" name="id" >
				<div class="modal-header">						
					<h4 class="modal-title">Edit Student</h4>
					<button type="button " class="close btn-danger" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				
				<div class="modal-body">					
					<div class="form-group">
						<label>Name</label>
						<input type="text" id="edit_name" name="name" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>Email</label>
						<input type="email" id="edit_email" name="email" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>Password</label>
						<input type="text" id="edit_password" name="password" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>Primary Phone</label>
						<input type="number" id="edit_phone1" name="phone1" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>Secondary Phone</label>
						<input type="number" id="edit_phone2" name="phone2" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>Case</label>
						<input type="text" id="edit_case" name="case" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>Country</label>
						<input type="text" id="edit_country" name="country" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>Status</label>
						<input type="text" id="edit_status" name="status" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>Passport</label>
						<input type="number" id="edit_passport" name="passport" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>Job</label>
						<input type="text" id="edit_job" name="job" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>General Note</label>
						<input type="text" id="edit_general_note" name="general_note" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>Payment Note</label>
						<input type="text" id="edit_payment_note" name="payment_note" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>Money Paid</label>
						<input type="number" id="edit_money_paid" name="money_paid" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>Money To Pay</label>
						<input type="number" id="edit_money_to_pay" name="money_to_pay" class="form-control" required>
					</div>
                    <div class="modal-footer">
					    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					    <input type="submit" class="btn btn-primary" value="Save">
				    </div>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteStudentModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="delete_form" method="post" action="{{route('students.delete')}}">
				@csrf
                <input type="hidden" id="delete_hidden_id" name="id" >
				<div class="modal-header">						
					<h4 class="modal-title">Delete Teacher</h4>
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
			url: "{{ route('students.data_to_edit') }}" ,
			data: formData,
			dataType: "json",
			encode: true,
			}).done(function (data) {
			console.log(data);
			$("#edit_name").attr("value", data.name);
            $("#edit_email").attr("value", data.email);
            $("#edit_password").attr("value", data.password);
            $("#edit_phone1").attr("value", data.phone1);
            $("#edit_phone2").attr("value", data.phone2);
            $("#edit_case").attr("value", data.case);
            $("#edit_country").attr("value", data.country);
            $("#edit_status").attr("value", data.status);
            $("#edit_passport").attr("value", data.passport);
            $("#edit_job").attr("value", data.job);
            $("#edit_general_note").attr("value", data.general_note);
            $("#edit_payment_note").attr("value", data.payment_note);
            $("#edit_money_paid").attr("value", data.money_paid);
            $("#edit_money_to_pay").attr("value", data.money_to_pay);
		});

	}

</script>


