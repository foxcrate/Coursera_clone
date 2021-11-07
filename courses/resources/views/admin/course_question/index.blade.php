@include('admin.templates.header')

@include('admin.templates.sidebar')

@include('admin.templates.navbar')


<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class=" col-sm-6 ">
						<h2>Manage <b>Course Questions</b></h2>
					</div>
					<div class=" col-sm-6 ">
						<a href="#addCourseQuestionModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Course Question</span></a>
					</div>
				</div>
			</div>
            <!-- table-layout:fixed; width: 100%; -->
			<table style="" class="table table-striped table-hover">
				<thead>
					<tr>
						<!-- <th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th> -->
						<th>ID</th>
                        <th>Question</th>
						<th>Actions</th> 
					</tr>
				</thead>
				<tbody>
				@foreach ($all_course_question as $course_question)
     
					<tr>
						<!-- <td style="word-wrap: break-word">
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td> -->
						<td style="word-wrap: break-word"> {{$course_question->id}} </td>
						<td style="word-wrap: break-word"> {{$course_question->question}} </td>
						<td style="word-wrap: break-word">
							<a onClick="edit_function({{$course_question->id}})" href="#editCourseQuestionModal" class="edit" data-toggle="modal"><i class="bi bi-pencil-fill"></i></a>
							<a onClick="delete_function({{$course_question->id}})" href="#deleteCourseQuestionModal" class="delete" data-toggle="modal"><i class="bi bi-trash"></i></a>
						</td>
					</tr>

				@endforeach

				</tbody>
			</table>
			<div class="d-flex">
                {{ $all_course_question->links() }}
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
<div id="addCourseQuestionModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post" action="{{route('course_question.add')}}" >
				@csrf
				<div class="modal-header">						
					<h4 class="modal-title">Add Course Question</h4>
					<button type="button " class="close btn-danger" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">	
					<div class="form-group">
						<label>Course</label>
						<select class="form-control" id='edit_cycle' name="course_id">
							@foreach ( $all_courses as $course )
								<option value="{{ $course->id }}">{{ $course->name }}</option>
							@endforeach
						</select>
					</div>
                    <div class="form-group">
						<label>Question</label>
						<input type="text" name="question" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>First Answer</label>
						<input type="text" name="first_answer" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>Second Answer</label>
						<input type="text" name="second_answer" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>Third Answer</label>
						<input type="text" name="third_answer" class="form-control">
					</div>
                    <div class="form-group">
						<label>Fourth Answer</label>
						<input type="text" name="fourth_answer" class="form-control">
					</div>
                    <div class="form-group">
						<label>Answer</label>
						<input type="number" name="correct_answer" class="form-control" required>
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
<div id="editCourseQuestionModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
            <form method="post" action="{{route('course_question.edit')}}" >
				@csrf
                <input type="hidden" id="edit_hidden_id" name="id" >
				<div class="modal-header">						
					<h4 class="modal-title">Edit Teacher</h4>
					<button type="button " class="close btn-danger" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
                    <div class="form-group">
						<label>Course</label>
						<select class="form-control" id='edit_course_id' name="course_id">
							@foreach ( $all_courses as $course )
								<option value="{{ $course->id }}">{{ $course->name }}</option>
							@endforeach
						</select>
					</div>
                    <div class="form-group">
						<label>Question</label>
						<input type="text" id="edit_question" name = "question" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>First Answer</label>
						<input type="text" id="edit_first_answer" name = "first_answer" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>Second Answer</label>
						<input type="text" id="edit_second_answer" name = "second_answer" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>Third Answer</label>
						<input type="text" id="edit_third_answer" name = "third_answer" class="form-control">
					</div>
                    <div class="form-group">
						<label>Fourth Answer</label>
						<input type="text" id="edit_fourth_answer" name = "fourth_answer" class="form-control">
					</div>
                    <div class="form-group">
						<label>Answer</label>
						<input type="number" id="edit_correct_answer" name = "correct_answer" class="form-control" required>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Save">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteCourseQuestionModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="delete_form" method="post" action="{{route('course_question.delete')}}">
				@csrf
                <input type="hidden" id="delete_hidden_id" name="id" >
				<div class="modal-header">						
					<h4 class="modal-title">Delete Course Question</h4>
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
			url: "{{ route('course_question.data_to_edit') }}" ,
			data: formData,
			dataType: "json",
			encode: true,
			}).done(function (data) {
			//console.log(data);
            $("#edit_course_id> option[value=" + data.course_id + "]").prop("selected",true);
			$("#edit_question").attr("value", data.question);
            $("#edit_first_answer").attr("value", data.first_answer);
            $("#edit_second_answer").attr("value", data.second_answer);
            $("#edit_third_answer").attr("value", data.third_answer);
            $("#edit_fourth_answer").attr("value", data.fourth_answer);
            $("#edit_correct_answer").attr("value", data.correct_answer);
		});

	}

</script>


