@include('student.templates.header')
@include('student.templates.navbar')
      
@extends('student.templates.header')

@section('title')
  <title>Projects</title>
@endsection

<div class="col-12 project-header">
    <div class="row">
    </div>
</div>
<div class="container-fluid">
    <section class="p-5">
        <h2 class="text-center mb-5">All Project </h2>
            @foreach( $projects->chunk(3) as $chunk)
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach($chunk as $project)
                        <div class="col">
                            <div class="card h-100">
                            <a href="{{ route('project_details', ['id'=>$project->id] ) }}"><img src="assets/images/course1.jpg" class="card-img-top card-image-style" alt="..."></a>
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-wine-bottle icon-s"></i>{{ $project->name }}</h5>
                                <p class="card-text">{{ $project->summery }}</p>
                                <p class="icon-les"><i class="fa fa-calendar"></i><span class="les-spa"> {{ count($project->semesters) }}</span>Semesters</p>
                                <p class="icon-les"><i class="fa fa-book"></i><span class="les-spa"> {{ count( $project->all_courses() ) }}</span> Courses</p>
                            </div>
                            <div class="card-footer">
                                <i class="fas fa-book-open icon-s"></i>
                                <small class="text-muted">Last updated 3 mins ago</small>
                            </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
    </section>
</div>

@include('student.templates.footer')