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
    <div class="container justify-content-center ask-al">
    <h2 class="ask-master">{{$all_course_questions[0]->course->name}}<span class="ask-span"> Exam</span></h2>
        <div class="row">

            <div class="col ask">
                <form id="myFormID" method="post" action="{{route('submit_course_exam')}}" >
                    @csrf
                    <input type="hidden" value="{{$all_course_questions[0]->course->id}}" name="course_id">
                    <input type="hidden" value="{{ $number_of_questions }}" name="number_of_questions">
                    <input type="hidden" value="{{ $ids_array }}" name="ids_array">

                    <ol>
                        @foreach ($all_course_questions as $question)

                        <li class="ol-num">
                            <label for="" class="radio-title"> {{$question->question}} </label>
                            <div class="form-check ">
                                <input class="form-check-input" checked type="radio" name="{{$question->id}}" id="inlineRadio1" value="1">
                                <label class="form-check-label" for="inlineRadio1">{{$question->first_answer}}</label>
                            </div>
                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="{{$question->id}}" id="inlineRadio2" value="2">
                                <label class="form-check-label" for="inlineRadio2">{{$question->second_answer}}</label>
                            </div>
                            @if ( $question->third_answer != '')
                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="{{$question->id}}" id="inlineRadio3" value="3">
                                <label class="form-check-label" for="inlineRadio3">{{$question->third_answer}}</label>
                            </div>
                            @endif
                            @if ( $question->forth_answer != '')
                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="{{$question->id}}" id="inlineRadio4" value="4">
                                <label class="form-check-label" for="inlineRadio4">{{$question->forth_answer}}</label>
                            </div>
                            @endif
                        </li>

                        @endforeach
                    </ol>
                </form>

            </div>

            <div class="col-lg-12 ask-but">
                <div class="row mt-3">
                    <a onclick="submit_answers()" class="btn btn-success btn-lg btn-block " href="#">submit</a>
                </div>
            </div>

        </div>

    </div>

    <script>

        function submit_answers(){
            document.getElementById("myFormID").submit();
        }

    </script>

<!--------Footer-------->
@include('student.templates.footer')
