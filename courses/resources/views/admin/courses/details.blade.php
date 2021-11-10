@include('admin.templates.header')

@include('admin.templates.sidebar')

@include('admin.templates.navbar')



<div class="container" >
        <div class="row mt-3">
            <section class="col">
                <div class="card p-3">
                    <!-- <h3 class="card-title" >Edit <span style="color:blue;"> {{$course->name}}   </span>'s Name & Lessons </h3> -->
                    <h3 class="card-title" >Edit "<span style="color:blue;">{{$course->name}}</span>" Course </h3>
                    <!-- action="{{ route('projects.edit') }}" -->

                    <form id="edit_form"  method="post" action="{{ route('courses.edit') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="idy" value=" {{$course->id}} ">

                        <label class="form-check-label mt-2" for="{{$course->id}}">Name</label>
                        <input class="form-control" type="text" id="{{$course->id}}" value= "{{$course->name}}" name="name">

                        <div class="form-group my-4">
                            <label>Teachers</label>
                            <div class="form-control">
                                @foreach ( $all_teachers as $teacher )
                                    <div class=" m-2 form-check form-switch form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="{{$teacher->id}}" value= "{{$teacher->id}}" name=teachers_array[]  {{ in_array($teacher->id, $array_of_teachers) ? 'checked' : '' }} >
                                        <label class="form-check-label" for="{{$teacher->id}}">{{$teacher->name}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group my-4">

                            <label>Lessons</label>

                            <!-- <div class="form-control">
                                @foreach ( $lessons as $lesson )
                                    <div class=" m-2 form-check form-switch form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="{{$lesson->id}}" value= "{{$lesson->id}}" name=lesson_array[]  {{ in_array($lesson->id, $array_of_lessons) ? 'checked' : '' }} >
                                        <label class="form-check-label" for="{{$course->id}}">{{$lesson->name}}</label>
                                    </div>
                                @endforeach
                            </div> -->
                            <div class="form-control">
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
                                            <th>Order</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($elequent_lessons as $lesson)

                                        <tr>
                                            <td style="word-wrap: break-word">
                                                <span class="custom-checkbox">
                                                    <input type="checkbox" id="checkbox1" name="options[]" value="1">
                                                    <label for="checkbox1"></label>
                                                </span>
                                            </td>
                                            <td style="word-wrap: break-word"> {{$lesson->id}} </td>
                                            <td style="word-wrap: break-word"> {{$lesson->name}} </td>
                                            <td style="word-wrap: break-word"> {{ $lesson->order }} </td>
                                            <td style="word-wrap: break-word">
                                            <!-- href="#editSemesterModal"  data-toggle="modal" -->
                                                <a onClick="edit_function({{$lesson->id}})" href="#editSemesterModal"  data-toggle="modal" class="edit" ><i class="bi bi-pencil-fill"></i></a>
                                                <!-- <a href="{{ route('courses.details',['id'=>$lesson->id]) }}" title="Lessons" class="details"><i class="bi bi-eye-fill"></i></a> -->
                                                <a onClick="delete_function({{$lesson->id}})" href="#deleteSemesterModal" class="delete" data-toggle="modal"><i class="bi bi-trash"></i></a>

                                            </td>
                                        </tr>

                                    @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <a href="#addLessonModal" data-toggle="modal" class="btn btn-success text-dark">Add New Lesson</a>
                        <input type="submit" class="btn btn-info mx-2" value="Save">
                    </form>
                </div>
            </section>

        </div>
    </div>

<!-- Add Modal HTML -->
<div id="addLessonModal" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form id="edit_form" name="alo" method="post" action="{{route('lessons.add')}}" enctype="multipart/form-data">
				@csrf
                <input type="hidden" name="id" value= {{$course->id}} >
				<div class="modal-header">
					<h4 class="modal-title">Add New Lesson</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Name</label>
						<input  name="name" type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Order</label>
						<input type="number" id="edit_modal_duration" name="order" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>Description</label>
						<input type="text" id="edit_modal_duration" name="description" class="form-control" required>
					</div>
                    <div class="form-group mt-2">
						<label>Video</label>
						<input type="file" id="edit_modal_duration" name="video" class="form-control" required>
					</div>
                    <div class="form-group mt-2">
						<label>Lesson Question</label>
						<!-- <input type="text" id="lesson_question" name="lesson_question" class="form-control" required> -->
                        <textarea class="form-control" name="question" id="lesson_question" rows="3"  required></textarea>
					</div>
                    <div class="form-group mt-2">
						<label>First Choice</label>
						<input type="text" id="lesson_question_first_choice" name="first_answer" class="form-control" required>
					</div>
                    <div class="form-group mt-2">
						<label>Second Choice</label>
						<input type="text" id="lesson_question_second_choice" name="second_answer" class="form-control" required>
					</div>
                    <div class="form-group mt-2">
						<label>Correct Answer</label>
						<input type="number" id="lesson_question_correct_answer" name="correct_answer" class="form-control" required>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-info" value="Save">
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Edit Modal HTML -->
<div id="editSemesterModal" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form id="edit_form" name="alo" method="post" action="{{route('lessons.edit')}}" enctype="multipart/form-data">
				@csrf
                <input type="hidden" name="id" id="hidden_in_edit" value= edit_id >
				<div class="modal-header">
					<h4 class="modal-title">Edit lesson</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
                    {{-- <a href="#myModal2" data-toggle="modal" class="btn btn-success text-dark">2nd Modal</a> --}}
					<div class="form-group">
						<label>Name</label>
						<input id="edit_modal_name" name="name" type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Order</label>
						<input type="number" id="edit_modal_order" name="order" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>Description</label>
						<input type="text" id="edit_modal_description" name="description" class="form-control" required>
					</div>
                    <div class="form-group mt-2">
                        <!-- <video class="project_video_in_edit" controls>
                            <source id="edit_modal_video" src="" type="video/mp4">
                            Your browser does not support HTML video.
                        </video> -->
                        <button onclick="video_tab()" class="btn btn-primary mb-2">View Video</button>
						<label>Video</label>
						<input type="file" id="edit_modal_video69" name="video" class="form-control" placeholder="Please upload the video again" >
					</div>
                    <div class="form-group">
						<label>Lesson Question</label>
						<textarea class="form-control" name="question" id="edit_modal_lesson_question" rows="3"  required></textarea>
					</div>
                    <div class="form-group">
						<label>First Choice</label>
						<input type="text" id="edit_modal_first_choice" name="first_answer" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>Second Choice</label>
						<input type="text" id="edit_modal_second_choice" name="second_answer" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>Correct Answer</label>
						<input type="number" id="edit_modal_correct_answer" name="correct_answer" class="form-control" required>
					</div>
				</div>

				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-info" value="Save">
				</div>
			</form>
		</div>
	</div>
</div>

{{-- <div class="modal fade" id="myModal2" data-bs-backdrop="static">
	<div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Lesson Video</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div><div class="container"></div>
        <div class="modal-body">
            <video class="project_video_in_edit" controls>
                <source id="edit_modal_video" src="" type="video/mp4">
                Your browser does not support HTML video.
            </video>
        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            <input type="submit" class="btn btn-info" value="Save">
        </div>
      </div>
    </div>
</div> --}}

<!-- Delete Modal HTML -->
<div id="deleteSemesterModal" class="modal fade">
	<div class="modal-dialog ">
		<div class="modal-content">
			<form id="delete_form" method="post" action="{{route('lessons.delete')}}">
				@csrf
                <input type="hidden" name="id" id="hidden_in_delete" value= delete_id >
				<div class="modal-header">
					<h4 class="modal-title">Delete Lesson</h4>
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

        var video_url = "";

        function edit_function(id){

            var edit_id = id;
            //alert(edit_id);
            document.getElementById("hidden_in_edit").value = edit_id;

            var formData = {
                id:edit_id,
            };

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "GET",
                url: "{{ route('lessons.data_to_edit') }}" ,
                data: formData,
                dataType: "json",
                encode: true,
                }).done(function (data) {
                    console.log(data);
                    $("#edit_modal_name").attr("value", data.lesson.name);
                    $("#edit_modal_order").attr("value", data.lesson.order);
                    $("#edit_modal_description").attr("value", data.lesson.description);
                    $("#edit_modal_video").attr("src", 'http://localhost:8000/' + data.lesson.video );
                    video_url = 'http://localhost:8000/' + data.lesson.video  ;
                    //$("#edit_modal_lesson_question").attr("value", data.lesson_question.question);
                    $("#edit_modal_lesson_question").val( data.lesson_question.question );
                    $("#edit_modal_first_choice").attr("value", data.lesson_question.first_answer);
                    $("#edit_modal_second_choice").attr("value", data.lesson_question.second_answer);
                    $("#edit_modal_correct_answer").attr("value", data.lesson_question.correct_answer);

                    //alert("Alo");
                    // $('#editSemesterModal').modal('toggle');
            });


        }

        function video_tab(){
            //alert("Alo");
            window.open(video_url, '_blank').focus();

        }

        function delete_function(id){

            var delete_id = id;
            // alert(delete_id);
            document.getElementById("hidden_in_delete").value = delete_id;
        }

        function new_class(){
            // $('#edit_form').append(

            //     $('<input>').attr('type','number');

            // );

            // $('#idy').after(
            // $('<input>')
            //     .attr("type", "number")
            // );

            $('#deleteSemesterModal').modal('show');

        }

    </script>
