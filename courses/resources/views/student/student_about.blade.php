@include('student.templates.header')
@include('student.templates.student_navbar')
      
@extends('student.templates.header')

@section('title')
  <title>About Us</title>
@endsection


<div class="col-12 project-header">
    <div class="row">
    </div>
</div>
<div class="container about">
    <h2 class="about-title">About<span class="inst-span"> Us</span></h2>
    <div class="row">
        <div class="col-8">
            <h5 class="about-story-title">Who We Are</h5>
            <p class="about-story">"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.</p>
            <div class="row">
            <a class="btn btn-outline-dark btn-lg btn-block" href="#">contact Us</a>
            </div>
        </div>
        <div class="col-4">
            <img class="about-img" src="assets/images/course1.jpg" alt="">

        </div>
    </div>

</div>

@include('student.templates.footer')