@include('student.templates.header')
@include('student.templates.navbar')
      
@extends('student.templates.header')

@section('title')
  <title>My Courses</title>
@endsection


    <div class="col-12 project-header">
        <div class="row">
        </div>
    </div>

@include('student.templates.profile_second_nav')
<div class="conntainer last-courses">
    <h2 class="my-c-title"> My Cycles</h2>
    @foreach ( Auth::user()->all_cycles->chunk(3) as $chunk)
        <div class="row">
            @foreach( $chunk as $cycle )
                <div class="col-lg-4">
                    <div class="card h-100">
                        <img src={{ asset( $cycle->project['image'] ) }} class="card-img-top card-image-style" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-wine-bottle icon-s"></i>{{$cycle->name}}</h5>
                        <p class="card-text">{{ $cycle->project['summery']  }}</p>
                        <!-- <p class="icon-les"><i class="fa fa-calendar"></i><span class="les-spa"> {{ $cycle->project['semesters']  }} </span> semesters</p>
                        <p class="icon-les"><i class="fa fa-book"></i><span class="les-spa"> {{ $cycle->project['courses_count()']  }} </span> courses</p> -->
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

</div>

@include('student.templates.footer')