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

@include('student.templates.profile_second_nav')
<div class="conntainer last-courses">
<h2 class="my-c-title"> My Late Submissions</h2>

<div class="container">

    @foreach( $late_submissions->chunk(2) as $chunk)

    <div class="row">

        @foreach($chunk as $late_submission)

        <div class="col">

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
                  {{-- <p class="card-text text-white">With supporting text below as a natural lead-in to additional content.</p> --}}
                  <a href="#" class="btn btn-primary late_submissions_button">Go somewhere</a>
                </div>
                <div class="card-footer text-white">
                    @if ( $now->diffInDays( $late_submission->end_date ) > 1 )
                    {{ $now->diffInDays( $late_submission->end_date ) }} days left
                    @elseif( $now->diffInDays( $late_submission->end_date ) == 1 )
                    {{ $now->diffInDays( $late_submission->end_date ) }} day left
                    @elseif( $now->diffInDays( $late_submission->end_date ) == 0 )
                    Time Ended
                    @endif

                </div>
            </div>
        </div>

        @endforeach

    </div>

    @endforeach


</div>


