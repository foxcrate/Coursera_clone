@include('admin.templates.header')

@include('admin.templates.sidebar')

@include('admin.templates.navbar')


<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class=" col-sm-6 ">
						<h2>Manage <b>Requests To Projects</b></h2>
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
						<th>Student ID</th>
						<th>Student Name</th>
						<th>Student Email</th>
                        <th>Student Phone</th>
                        <th>Project Name</th>
						<th>status</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
				@foreach ($all_requests as $request)

					<tr>
						<!-- <td style="word-wrap: break-word">
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td> -->
						<td style="word-wrap: break-word"> {{$request->student->id}} </td>
						<td style="word-wrap: break-word"> {{$request->student->name}} </td>
						<td style="word-wrap: break-word"> {{$request->student->email}} </td>
						<td style="word-wrap: break-word"> {{$request->student->phone}} </td>
                        <td style="word-wrap: break-word"> {{$request->project->name}} </td>
						@if ($request->status == 'accepted')
							<td style="word-wrap: break-word"> <i class="bi bi-check2-all"></i> </td>
						@elseif($request->status == 'pending')
							<td style="word-wrap: break-word"> <i class="bi bi-exclamation-diamond"></i> </td>
						@endif
						<td style="word-wrap: break-word">
							<a onClick="edit_function( {{ $request->id }} , {{ $request->student->id }})" href="#editRequestModal" class="edit" data-toggle="modal"><i class="bi bi-pencil-fill"></i></a>
						</td>
					</tr>

				@endforeach

				</tbody>
			</table>
			<div class="d-flex pages">
                {{ $all_requests->links() }}
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

<!-- Edit Modal HTML -->
<div id="editRequestModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
            <form method="post" action="{{route('requests_to_projects.edit')}}" enctype="multipart/form-data">
				@csrf
                <input type="hidden" id="edit_hidden_id_1" name="request_id" >
				<input type="hidden" id="edit_hidden_id_2" name="student_id" >
				<div class="modal-header">
					<h4 class="modal-title">Edit Cyle Payment</h4>
					<button type="button " class="close btn-danger" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<!-- <div class="form-group">
						<label>Comfirmed Payment Amount</label>
						<input type="number" name="amount_paid" id="edit_amount_paid" class="form-control" required>
					</div> -->
					<div class="form-group">
						<select class="form-control" id='edit_cycle' name="cycle_id">
							@foreach ( $all_cycles as $cycle )
								<option value="{{ $cycle->id }}">{{ $cycle->name }}</option>
							@endforeach

						</select>
					<!-- </div>
                    <div class="form-group">
						<label>Note</label>
						<textarea class="form-control" name="note" id="edit_note" rows="3"  required></textarea>
					</div> -->
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>

<script>

    var edit_id = 0;

	function edit_function( request_id , student_id ){
		//edit_id = id;
		//console.log(request_id , student_id);
		$("#edit_hidden_id_1").attr("value", request_id);
		$("#edit_hidden_id_2").attr("value", student_id);
	}
	// function edit_function(id){
	// 	edit_id = id;
	// 	//alert(edit_id);
    //     $("#edit_hidden_id").attr("value", edit_id);

	// 	var formData = {
	// 		id:edit_id,
	// 	};

	// 	$.ajax({
	// 		headers: {
    //  			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   	// 		},
	// 		type: "GET",
	// 		url: "{{ route('cycle_payments.data_to_edit') }}" ,
	// 		data: formData,
	// 		dataType: "json",
	// 		encode: true,
	// 		}).done(function (data) {
	// 		console.log(data);
	// 		$("#edit_amount_paid").attr("value", data.edit_amount_paid);
	// 		$("#edit_status> option[value=" + data.status + "]").prop("selected",true);
    //         $("#edit_note").val( edit_note.bio );
	// 	});

</script>


