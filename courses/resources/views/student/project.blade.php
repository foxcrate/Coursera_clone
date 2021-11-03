@include('student.templates.header')
@include('student.templates.navbar')
      
@extends('student.templates.header')

@section('title')
  <title>Project Details</title>
@endsection

<div class="col-12 project-header">
    <div class="row">
    </div>
</div>
<div class="container-fluid">
        <div class="row">
            <div class="col-12 icon-head-master">
                <p class="icon-head"><i class="fa fa-calendar"></i><span class="les-spa"> {{ count( $project->semesters ) }}</span> Semesters</p>
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
    <a class="btn btn-outline-dark btn-lg btn-block" href="{{ route('project_view',[ 'id' => $project->id ]) }}" >Enrol Now</a>
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

@include('student.templates.footer')