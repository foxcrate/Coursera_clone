@include('student.templates.header')
@include('student.templates.student_navbar')
      
@extends('student.templates.header')

@section('title')
  <title>Contact Us</title>
@endsection

<div class="container-fluid">
    <div class="row">
        <div class="google-map">
        <iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=1%20Grafton%20Street,%20Dublin,%20Ireland+(Britsi%20Institute)&amp;t=&amp;z=18&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="http://www.gps.ie/">vehicle gps</a></iframe></div>
    </div>
</div>
<div class="container-fluid contact-content">
    <div class="row">
            <div class="col-6 ">
                <h4>Get in Touch</h4>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Your name</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Your Full Name">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
                    <input type="number" class="form-control" id="exampleFormControlInput2" placeholder="0020123456789">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                </div>
                <div class="row" >
                    <a class="btn btn-outline-dark btn-lg btn-block" href="#">Send</a>
                </div>
            </div>
            <div class="col-6 ">
                <h1>Contact Us</h1>
                <ul class="contat-info">
                    <li><i class="fas fa-map-marked-alt icon-s"></i> mesdak ST., Elmohandsen, Giza, Egypt</li>
                    <li><i class="fas fa-mobile icon-s"></i> 0020123456789 - 0020123456789</li>
                    <li><i class="fas fa-fax icon-s"></i> 002023456870</li>
                    <li><i class="fas fa-envelope icon-s"></i> info@domain.com</li>
                </ul>
                <div class="social-master">
                <a href="#"><i class="fab fa-facebook social-icon"></i></a>
                <a href="#"><i class="fab fa-twitter social-icon"></i></a>
                <a href="#"><i class="fab fa-linkedin-in social-icon"></i></a>
                </div>

            </div>
    </div>
</div>

@include('student.templates.footer')