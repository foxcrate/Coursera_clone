@include('student.templates.header')
@include('student.templates.navbar')
      
@extends('student.templates.header')

@section('title')
  <title>Project Details</title>
@endsection

<h1>{{ in_array( $project->id ,$ids_array) }}</h1>
<div class="col-12 project-header">
    <div class="row">
    </div>
</div>
<div class="container-fluid">
        <div class="row">
            <div class="col-12 icon-head-master">
                <p class="icon-head"><i class="fa fa-calendar"></i><span class="les-spa"> {{ count( $project->semesters ) }}</span> - Semesters</p>
                <p class="icon-head"><i class="fa fa-book"></i><span class="les-spa"> {{ count( $project->all_courses() ) }}</span> Courses</p>
                <p class="icon-head"><i class="far fa-money-bill-alt"></i><span class="les-spa"> $</span> {{ $project->price }}</p>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 video-intro">
                <video width="70%" height="90%" controls>
                    <source src="http://localhost:8000/{{ $project->video }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>
<div class="container-fluid Course-title">
    <h2 class="course-text-title">Project <span class="course-span">{{$project->name}}</span></h2>
    <!-- <a class="btn btn-outline-dark btn-lg btn-block" href="{{ route('project_view',[ 'id' => $project->id ]) }}" >Enrol Now</a> -->
    <!-- <a class="btn btn-outline-dark btn-lg btn-block" href="{{ route('project_view',[ 'id' => $project->id ]) }}" >Enrol Now</a> -->
    @if(Session::has('loggedID'))
        @if( in_array( $project->id ,$ids_array)  )
        <a class="btn btn-outline-dark btn-lg btn-block" href="{{ route('project_view',[ 'id' => $project->id ]) }}" >Go To Course</a>
        @else
        <!-- <a class="btn btn-outline-dark btn-lg btn-block" href="" data-bs-toggle="modal" data-bs-target="#enrolModal">Enroll Now</a> -->
        <a class="btn btn-outline-dark btn-lg btn-block"  href="{{ route('request_to_join',[ 'student_id' => session()->get('loggedID') ,'project_id' => $project->id ]) }}" >Enroll Now</a>
        @endif
    @else
        <a class="btn btn-dark m-1"  href="{{ route('student_login') }}">{{ __('Login') }}</a>
    @endif
    <div class="row corse-content">
        <div class="col-6">
            <h5 class="pro-desc"><i class="fas fa-database icon-s"></i> Project Description</h5>
            <p class="pro-desc1">{{ $project->summery }}</p>
        </div>
        <div class="col-6">
            <h5 class="pro-inst"><i class="fas fa-user-graduate icon-s"></i> Project instructors</h5> 
            <ul class="pro-desc1">
                @foreach($project->teachers_count() as $teacher)
                    <li class="inst-li"><span class="inst-span">Doctor</span> {{ $teacher->name }} </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<div class="container course-lesson">
    <div class="row">
        <div class="col-12">
            @foreach ($project->semesters as $semester)
                <div class="list-group m-3">
                    <a href="#" class="list-group-item list-group-item-action active lesson-head" aria-current="true">
                    <i class="fab fa-discourse"></i>Semester {{ $loop->iteration }} - {{$semester->name}}
                    </a>
                    @foreach ($semester->courses as $course)
                        <a href="#" class="list-group-item list-group-item-action"><i class="far fa-play-circle"></i>Course {{ $loop->iteration }} - {{$course->name}}</a>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="modal fade" id="enrolModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $project->name }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form id="edit_form" name="alo" method="post" action=" {{ route('project_enroll') }} " enctype="multipart/form-data">
				@csrf
				<input type="hidden" id="edit_hidden_id" name="project_id" value={{ $project->id }} >
                <input type="hidden" id="edit_hidden_id" name="student_id" value={{ session()->get('loggedID') }} >
					<div class="form-group">
						<label>Payment File</label>
						<input id="payment" name="payment" type="file" class="form-control" required>
					</div>
                    
                <button type="submit" class="btn btn-primary mt-2">Submit</button>
			</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>

    var edit_id = 0;

    function edit_function(id){
        // edit_id = id;
        // //alert(edit_id);
        // $("#edit_hidden_id").attr("value", edit_id);
        
        // var formData = {
        //     id:edit_id,
        // };

        // $.ajax({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     },
        //     type: "GET",
        //     url: "{{ route('teachers.data_to_edit') }}" ,
        //     data: formData,
        //     dataType: "json",
        //     encode: true,
        //     }).done(function (data) {
        //     console.log(data);
        //     $("#edit_name").attr("value", data.name);
        //     $("#edit_image").attr("src", 'http://localhost:8000/'+ data.image);
        //     $("#edit_bio").val( data.bio );
        // });

    }

</script>

@include('student.templates.footer')