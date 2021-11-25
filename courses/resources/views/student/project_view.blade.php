@include('student.templates.header')
@include('student.templates.navbar')

@extends('student.templates.header')

@section('title')
  <title>Project View</title>
@endsection

<!-- <script>
    var s = '';
    //alert(s);
    var element = document.getElementById( '' );
    element.innerHTML = s;
    // var element = document.getElementById("db_html");
    // element.appendChild(temp);
</script> -->

<div class="col-12 project-header">
</div>
    <!-- <div class="container-fluid c-v-v"> -->
    <h2 id="titly" class="my-c-title"> </h2>
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

                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Current Course</h5>

                    <div class="list-group mb-3">
                        <a  class="list-group-item list-group-item-action active lesson-head" aria-current="true">
                        <i class="fab fa-discourse"></i> {{$current}}
                        </a>
                        @foreach( $course->lessons as $lesson)
                            <div >
                                <button onclick = "display_video( '{{$lesson->video}}' )" class="list-group-item list-group-item-action"><i class="far fa-play-circle"></i> {{$lesson->name}} <div  > {{$lesson->description}}  </div> </button>
                                <a href="{{ $lesson->youtube_link }}" target="_blank" class="btn btn-danger">Youtube</a>
                                <button data-bs-toggle="modal" data-bs-target="#quizModal"  class="btn btn-success" onclick = "take_quiz( '{{$lesson->id}}' )" >
                                    Take Quiz
                                </button>
                                {{-- data-bs-toggle="modal" data-bs-target="#quizModal" --}}
                            </div>
                        @endforeach
                    </div>

                    </div>
                </div>
        </div>
    </div>
<!-- </div> -->

{{-- Quiz Modal --}}
<div class="modal fade" id="quizModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Lesson Question</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">


            {{-- <div style='margin-top:30px ;transform: scale(0.65); position: relative; top: -100px;'> --}}
            <div >
                <h6 id="the_question">What fraction of a day is 6 hours?</h6>
                <hr />

                {{-- <div id='b1' > --}}

                  {{-- <p for='option-11' id="first_answer_p" style=' padding: 5px; font-size: 2.5rem;'>6/24</p>
                    <input onclick="marking(this)" type='checkbox' name='option' value='1' id='1' style='transform: scale(1.6); margin-right: 10px; vertical-align: middle; margin-top: -2px;' /> --}}
                    <a href="#" onclick="marking(this)" id="first_answer_p" style='margin-left: 20px; margin-right: 20px; font-size: 1.5rem;' name='1' ></a>

                  {{-- <span id='result-11'></span> --}}

                {{-- </div> --}}

                {{-- <div id='b2' > --}}

                  {{-- <p id="second_answer_p" for='option-12' style=' padding: 5px; font-size: 2.5rem;'>6</p> --}}
                    {{-- <input  onclick="marking(this)" type='checkbox' name='option' value='2' id='2' style='transform: scale(1.6); margin-right: 10px; vertical-align: middle; margin-top: -2px;' /> --}}
                    <a href="#" id="second_answer_p" style='margin-left: 20px; margin-right: 20px; font-size: 1.5rem;' onclick="marking(this)" name='2'></a>

                  {{-- <span id='result-12'></span> --}}

                {{-- </div> --}}

                {{-- <button type='button' onclick='displayAnswer1()' style='width: 100px; height: 40px; border-radius: 3px; background-color: lightblue; font-weight: 700;'>Submit</button> --}}
            </div>
            {{-- <a id='showanswer1'></a> --}}
            <h3 id='result-12' style="margin-top: 10px;"></h3>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
      </div>
    </div>
  </div>

<script>

    var correct_answer = 0;

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

    function marking(e){
        //alert(e.id);
        if( e.name == correct_answer ){
            //document.getElementById('b1').style.border = '3px solid limegreen'
            document.getElementById(e.id).style.color = 'limegreen'
            document.getElementById('result-12').innerHTML = 'Correct!'
            document.getElementById('result-12').style.color = 'limegreen'
            // document.getElementById("myCheckBoxID").checked = false;
        }else{
            //document.getElementById('b2').style.border = '3px solid red'
            document.getElementById(e.id).style.color = 'red'
            document.getElementById('result-12').innerHTML = 'Incorrect!'
            document.getElementById('result-12').style.color = 'red'
            // document.getElementById("myCheckBoxID").checked = false;
        }

    }

    function take_quiz(lesson_id){
        //alert(lesson_id);

        var formData = {
			lesson_id:lesson_id,
		};

		$.ajax({
			headers: {
     			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   			},
			type: "GET",
			url: "{{ route('get_lesson_question') }}" ,
			data: formData,
			dataType: "json",
			encode: true,
			}).done(function (data) {
			console.log(data);
            document.getElementById("the_question").innerHTML = data.question ;
            document.getElementById("first_answer_p").innerHTML = data.first_answer ;
            document.getElementById("second_answer_p").innerHTML = data.second_answer ;
            correct_answer = data.correct_answer;
			// $("#edit_name").attr("value", data.name);
			// $("#edit_price").attr("value", data.price);
			// $("#edit_type> option[value=" + data.type + "]").prop("selected",true);
			// $("#edit_summery").val( data.summery );
		});

    }


        // The function evaluates the answer and displays result
    function displayAnswer1() {
        if (document.getElementById('true_answer').checked) {
            document.getElementById('block-11').style.border = '3px solid limegreen'
            document.getElementById('result-11').style.color = 'limegreen'
            document.getElementById('result-11').innerHTML = 'Correct!'
        }
        if (document.getElementById('false_answer').checked) {
            document.getElementById('block-12').style.border = '3px solid red'
            document.getElementById('result-12').style.color = 'red'
            document.getElementById('result-11').innerHTML = 'Incorrect!'
            showCorrectAnswer1()
        }
    }
    // the functon displays the link to the correct answer
    function showCorrectAnswer1() {
            let showAnswer1 = document.createElement('p')
            showAnswer1.innerHTML = 'Show Corrent Answer'
            showAnswer1.style.position = 'relative'
            showAnswer1.style.top = '-180px'
            showAnswer1.style.fontSize = '1.75rem'
            document.getElementById('showanswer1').appendChild(showAnswer1)
            showAnswer1.addEventListener('click', () => {
            document.getElementById('block-11').style.border = '3px solid limegreen'
            document.getElementById('result-11').style.color = 'limegreen'
            document.getElementById('result-11').innerHTML = 'Correct!'
            document.getElementById('showanswer1').removeChild(showAnswer1)
        })
    }


    // var s = '<div style="color:red;"> Aloo </div>';
    // var temp = document.createElement('div');
    // temp.innerHTML = s;
    // var element = document.getElementById("db_html");
    // element.appendChild(temp);

</script>

@include('student.templates.footer')
