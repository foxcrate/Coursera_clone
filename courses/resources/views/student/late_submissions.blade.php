@include('student.templates.header')
@include('student.templates.navbar')

@extends('student.templates.header')

@section('title')
  <title>Late Submissions</title>
@endsection

<div class="col-12 project-header">
    <div class="row">
    </div>
</div>

<div class="container mt-2">
@if(session()->has('msg'))
<div class="alert alert-success text-center">
    {{ session()->get('msg') }}
</div>
@endif
@if(session()->has('error'))
<div class="alert alert-danger text-center">
    {{ session()->get('error') }}
</div>
@endif
</div>

@include('student.templates.profile_second_nav')
<div class="conntainer last-courses">
<h2 class="my-c-title"> My Late Submissions</h2>

<div class="container">

    @foreach( $late_submissions->chunk(2) as $chunk)

    <div class="row">

        @foreach($chunk as $late_submission)

        <div class="col-sm-12 col-md">

            <div class="card text-center mb-3 late_submissions_card">
                <div class="card-header text-white">
                  @if ( $late_submission->semester_or_course == "semester" )
                      Semester
                  @else
                    Course
                  @endif
                </div>
                <div class="card-body">
                  <h5 class="card-title text-white">
                    @if ( $late_submission->semester_or_course == "semester" )
                    {{$late_submission->semester->name}}
                    @else
                    {{$late_submission->course->name}}
                    @endif
                  </h5>

                  @if ( $late_submission->semester_or_course == "semester" )
                  <p class="card-text text-white">{{$late_submission->semester->research->description}}</p>
                    @endif

                    @if ( $late_submission->semester_or_course == "semester" )
                    <a href="#submitResearchModal" onClick="assignment({{$late_submission->id}})" data-bs-toggle="modal"  class="btn btn-primary late_submissions_button">Submit Research</a>
                    @else
                    <a href="{{ route( 'take_course_exam' , $late_submission->course->id ) }}" class="btn btn-primary late_submissions_button">Take Exam</a>
                    @endif
                </div>
                <div class="card-footer text-white">
                    @if ( $now->diffInHours( $late_submission->end_date ) > 1 )
                    {{ $now->diffInHours( $late_submission->end_date ) }} hours left
                    @elseif( $now->diffInHours( $late_submission->end_date ) == 1 )
                    {{ $now->diffInHours( $late_submission->end_date ) }} hour left
                    @elseif( $now->diffInHours( $late_submission->end_date ) == 0 )
                    Time Ended
                    @endif

                </div>
            </div>
        </div>

        @endforeach

    </div>

    @endforeach

</div>

<div id="submitResearchModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="edit_form" name="alo" method="post" action="{{route('late_submissions_submit')}}" enctype="multipart/form-data">
				<input type="hidden" id="assignment_id" name="id" >
				@csrf
				<div class="modal-header">
					<h4 class="modal-title">Submit Research</h4>
					<button type="button" class="close btn-danger" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">

					<div class="form-group">
						<label>Research File</label>
						<input  name="file" type="file" class="form-control" required>
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

<script>

    function assignment(assignment_id){
        $("#assignment_id").attr("value", assignment_id);
    }

</script>
