@include('student.templates.header')
@include('student.templates.navbar')
      
@extends('student.templates.header')

@section('title')
  <title>Project</title>
@endsection

<div class="col-12 project-header">
    <div class="row">
    </div>
</div>
<div class="container-fluid">
        <div class="row">
            <div class="col-12 icon-head-master">
                <p class="icon-head"><i class="fa fa-calendar"></i><span class="les-spa"> 3</span> semesters</p>
                <p class="icon-head"><i class="fa fa-book"></i><span class="les-spa"> 5</span> courses</p>
                <p class="icon-head"><i class="far fa-money-bill-alt"></i><span class="les-spa"> $</span> 1888</p>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 video-intro">
            <video width="70%" height="90%" controls>
                <source src="movie.mp4" type="video/mp4">
                <source src="movie.ogg" type="video/ogg">
                Your browser does not support the video tag.
            </video>
            </div>
        </div>
    </div>
<div class="container-fluid Course-title">
    <h2 class="course-text-title">Project <span class="course-span">{{$project->name}}</span></h2>
    <a class="btn btn-outline-dark btn-lg btn-block" href="#">Enrol Now</a>
    <div class="row corse-content">
        <div class="col-6">
            <h5 class="pro-desc"><i class="fas fa-database icon-s"></i> Project Description</h5>
            <p class="pro-desc1">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"</p>
        </div>
        <div class="col-6">
            <h5 class="pro-inst"><i class="fas fa-user-graduate icon-s"></i> Project instructors</h5> 
            <ul class="pro-desc1">
                <li class="inst-li"><span class="inst-span">Doctor</span>  Youssef Wassal</li>
                <li class="inst-li"><span class="inst-span">Doctor</span>  Youssef Wassal</li>
                <li class="inst-li"><span class="inst-span">Doctor</span>  Youssef Wassal</li>
                <li class="inst-li"><span class="inst-span">Doctor</span>  Youssef Wassal</li>
                <li class="inst-li"><span class="inst-span">Doctor</span>  Youssef Wassal</li>
                <li class="inst-li"><span class="inst-span">Doctor</span>  Youssef Wassal</li>

            </ul>
        </div>
    </div>
</div>
<div class="container course-lesson">
    <div class="row">
        <div class="col-12">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active lesson-head" aria-current="true">
                    <i class="fab fa-discourse"></i> Course lesson
                    </a>
                    <a href="#" class="list-group-item list-group-item-action"><i class="far fa-play-circle"></i> A second link item</a>
                    <a href="#" class="list-group-item list-group-item-action"><i class="far fa-play-circle"></i> A third link item</a>
                    <a href="#" class="list-group-item list-group-item-action"><i class="far fa-play-circle"></i> A fourth link item</a>
                    <a href="#" class="list-group-item list-group-item-action"><i class="far fa-play-circle"></i> A second link item</a>
                    <a href="#" class="list-group-item list-group-item-action"><i class="far fa-play-circle"></i> A third link item</a>
                    <a href="#" class="list-group-item list-group-item-action"><i class="far fa-play-circle"></i> A fourth link item</a>
                </div>
        </div>
    </div>
</div>

@include('student.templates.footer')