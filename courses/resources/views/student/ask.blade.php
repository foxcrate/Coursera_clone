@include('student.templates.header')
@include('student.templates.navbar')
      
@extends('student.templates.header')

@section('title')
  <title>Ask</title>
@endsection

<div class="col-12 project-header">
    <div class="row">
    </div>
</div>
    <div class="wrapper bg-white rounded">
        <div class="content"> <a href="#"><span class="fa fa-angle-left pr-2"></span>Back to Question Bank</a>
            <p class="text-muted">Multiple Choice Question</p>
            <p class="text-justify h5 pb-2 font-weight-bold">What did Radha Krishnan (Cassius Clay at the time) wear while flying to Rome for the 1960 Games?</p>
            <div class="options py-3"> <label class="rounded p-2 option"> His boxing gloves <input type="radio" name="radio"> <span class="crossmark"></span> </label> <label class="rounded p-2 option"> A parachute <input type="radio" name="radio"> <span class="checkmark"></span> </label> <label class="rounded p-2 option"> Nothing <input type="radio" name="radio"> <span class="crossmark"></span> </label> <label class="rounded p-2 option"> A world little belt <input type="radio" name="radio"> <span class="crossmark"></span> </label> </div> <b>Correct Feedback</b>
            <p class="mt-2 mb-4 pl-2 text-justify"> Well done! He was scared of flying so picked up the parachute from an support store before the trip. He won gold </p> <b>Incorrect Feedback</b>
            <p class="my-2 pl-2"> That was incorrect. Try again </p>
        </div>
    </div>


<style>

    @import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box
    }

    body {
        font-family: 'Open Sans', sans-serif;
        background: #eee
    }

    .wrapper2 {
        max-width: 600px;
        margin: 20px auto
    }

    .content {
        padding: 20px;
        padding-bottom: 50px
    }

    a:hover {
        text-decoration: none
    }

    a,
    span {
        font-size: 15px;
        font-weight: 600;
        color: rgb(50, 141, 245);
        padding-bottom: 30px
    }

    p.text-muted {
        font-size: 14px;
        font-weight: 500;
        margin-bottom: 5px
    }

    b {
        font-size: 15px;
        font-weight: bolder
    }

    .option {
        display: block;
        height: 50px;
        background-color: #f4f4f4;
        position: relative;
        width: 100%
    }

    .option:hover {
        background-color: #e8e8e8;
        cursor: pointer
    }

    .option input {
        position: absolute;
        opacity: 0;
        cursor: pointer
    }

    .checkmark,
    .crossmark {
        position: absolute;
        top: 10px;
        right: 10px;
        height: 22px;
        width: 22px;
        background-color: #f4f4f4;
        border-radius: 2px;
        padding: 0
    }

    .option:hover input~.checkmark,
    .option:hover input~.crossmark {
        background-color: #e8e8e8
    }

    .option input:checked~.checkmark {
        background-color: #79d70f
    }

    .option input:checked~.crossmark {
        background-color: #ec3838
    }

    .checkmark:after,
    .crossmark:after {
        content: "\2714";
        position: absolute;
        background-color: #79d70f;
        display: none;
        color: #fff;
        padding-left: 4px;
        width: 22px;
        font-size: 16px
    }

    .crossmark:after {
        content: "\2715";
        background-color: #ec3838
    }

    .option input:checked~.checkmark:after,
    .option input:checked~.crossmark:after {
        display: block;
        transition: 100ms ease-out 1s
    }

    p.mb-4 {
        border-left: 3px solid green
    }

    p.my-2 {
        border-left: 3px solid red
    }

    input[type="submit"] {
        width: 100%;
        height: 50px;
        background-color: #229aeb;
        border: none;
        outline: none;
        color: #fff;
        font-weight: 600;
        cursor: pointer
    }

    input[type="submit"]:hover:focus {
        border: none;
        outline: none;
        background-color: #229bebad
    }

</style>

    @include('student.templates.footer')