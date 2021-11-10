@include('admin.templates.header')

@include('admin.templates.sidebar')

@include('admin.templates.navbar')



<div class="container" >
        <div class="row mt-3">
            <section class="col">
                <div class="card p-3">
                    <h3 class="card-title" >Edit <span style="color:blue;"> {{$semester->name}}   </span>Courses </h3>
                    <!-- action="{{ route('projects.edit') }}" -->

                    <form id="edit_form"  method="post" action="{{ route('semesters.mass_edit') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="idy" value=" {{$semester->id}} ">

                        <div class="form-group my-4">
                            <h4>All Courses</h4>
                            <div class="form-control">
                                @foreach ( $courses as $course )
                                    <div class=" m-2 form-check form-switch form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="{{$course->id}}" value= "{{$course->id}}" name=courses_array[]  {{ in_array($course->id, $array_of_courses) ? 'checked' : '' }} >
                                        <label class="form-check-label" for="{{$course->id}}">{{$course->name}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <input onclick="new_class()" type="submit" class="btn btn-info mx-2" value="Save">
                    </form>

                </div>
                <a href="#myModal2" onclick="arrange_courses( '{{$semester->id}}' )" data-toggle="modal" class="btn btn-success text-dark">Arrange Courses After Saving</a>
            </section>

        </div>
    </div>

    <div class="modal fade" id="myModal2" data-bs-backdrop="static">
        <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="{{route('projects.edit')}}" enctype="multipart/form-data" >
				@csrf
				<input type="hidden" name="semester_id" value="{{$semester->name}}" >
				<div class="modal-header">
					<h4 class="modal-title">Arrange Courses</h4>
					<button type="button " class="close btn-danger" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>

				<div class="modal-body">
					<div class="form-group">

                        @foreach ( $my_courses as $key => $course )

						<label>Course {{$key}}</label>
						<select class="form-control" id='edit_course_id' name="course_id">
							@foreach ( $my_courses as $course  )

								<option value="{{$course->id}}"> {{$course->name}} </option>

							@endforeach

						</select>

                        @endforeach

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

    <script>

    function arrange_courses(id){
        var formData = {
			semester_id: id,
		};
        //alert(formData.semester_id);
		// $.ajax({
		// 	headers: {
     	// 		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   		// 	},
		// 	type: "GET",
		// 	url: "{{ route('projects.data_to_edit') }}" ,
		// 	data: formData,
		// 	dataType: "json",
		// 	encode: true,
		// 	}).done(function (data) {
		// 	console.log(data);
		// 	$("#edit_name").attr("value", data.name);
		// 	$("#edit_price").attr("value", data.price);
		// 	$("#edit_type> option[value=" + data.type + "]").prop("selected",true);
		// 	$("#edit_summery").val( data.summery );
		// 	$("#edit_image").attr("src", 'http://localhost:8000/'+ data.image);
		// 	video_url = 'http://localhost:8000/' + data.video  ;
		// });
    }

    function new_class(){

        // $('#idy').after(
        // $('<input>')
        //     .attr("type", "number")
        // );

        //alert("alo");

    }


	// $("#edit_form").submit(function(e) {

        // e.preventDefault();
        // alert("From Stopped ..");

        // var formData = {
        //     id:edit_id,
        //     name: $("#edit_modal_name").val(),
        //     start_date: $("#edit_modal_start_date").val(),
        // };

        // $.ajax({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     },
        //     type: "POST",
        //     url: e.target.action,
        //     data: formData,
        //     dataType: "json",
        //     encode: true,
        //     }).done(function (data) {
        //     // console.log(data);
        //     window.location.reload();
        // });

    // });

    </script>
