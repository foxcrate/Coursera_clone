@include('student.templates.header')
@include('student.templates.navbar')
      
@extends('student.templates.header')

@section('title')
  <title>Course View</title>
@endsection

<div class="col-12 project-header">
</div>
    <!-- <div class="container-fluid c-v-v"> -->
    <h2 id="titly" class="my-c-title"> {{ $project->name }} </h2>
    <div class="row d-flex d-flex justify-content-center">
        <div class="col-lg-6 video-intro mb-2">
                <video id="video" width="100%" height="100%" controls>
                    <source id="lesson_video" src="" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
    </div>


    <div class="row">
            <!-- <div class="col-lg-6 video-intro">
                <video width="100%" height="100%" controls>
                    <source src="movie.mp4" type="video/mp4">
                    <source src="movie.ogg" type="video/ogg">
                    Your browser does not support the video tag.
                </video>
            </div> -->

        <div class="col-lg-12">
            @foreach( $project->all_courses() as $course)
                <div class="list-group mb-3">
                    <a  class="list-group-item list-group-item-action active lesson-head" aria-current="true">
                    <i class="fab fa-discourse"></i> {{$loop->iteration}}: {{$course->name}}
                    </a>
                    @foreach( $course->lessons as $lesson)
                        <button onclick = "display_video( '{{$lesson->video}}' )" class="list-group-item list-group-item-action"><i class="far fa-play-circle"></i>{{$lesson->name}}, {{ $lesson->description }} </button>
                        
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
<!-- </div> -->

<script>

    function display_video(video_url){
        //alert(video_url);
        $("#lesson_video").attr("src", 'http://localhost:8000/' + video_url );
        
        var video = document.getElementById('video');

        document.getElementById('titly').scrollIntoView();

        video.load();
        video.play();

        // setTimeout(function() {  

        //     video.load();
        //     video.play();
        // }, 3000);

    }

</script>

@include('student.templates.footer')