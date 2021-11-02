@include('student.templates.header')
@include('student.templates.navbar')
      
@extends('student.templates.header')

@section('title')
  <title>Easy Courses</title>
@endsection


<!---------- Showcase ---------->

<section id="showcase" class="">

    <div class="showcase-content " >

        <h1 class="title-head fonty"> Enroll<span class=" fonty withus"> With Us</span> </h1>

        <div class="d-flex justify-content-center" >
                <input  type="text" class="search-top  form-control" placeholder="Search Your Courses" />
        </div>
    </div>

</section>

<!------------- Types Of Projects ----------->


<section class="p-5">
    <h2 class="text-center mb-5">OnlinePrograms Degrees</h2>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
        <div class="col">
          <div class="card h-100">
          <a href="{{ route('phd_projects') }}"><img src="assets/images/course1.jpg" class="card-img-top card-image-style" alt="..."></a>
            <div class="card-body">
              <h5 class="card-title"><i class="fas fa-wine-bottle icon-s"></i>PHD</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
            <div class="card-footer">
              <i class="fas fa-book-open icon-s"></i>
              <small class="text-muted">Last updated 3 mins ago</small>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100">
          <a href="{{ route('master_projects') }}"><img src="assets/images/course2.jpg" class="card-img-top card-image-style" alt="..."></a>
            <div class="card-body">
              <h5 class="card-title"><i class="fas fa-wine-bottle icon-s"></i>Master</h5>
              <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
            </div>
            <div class="card-footer">
              <i class="fas fa-book-open icon-s"></i>
              <small class="text-muted">Last updated 3 mins ago</small>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100">
            <a href="{{ route('diploma_projects') }}"><img src="assets/images/course3.jpg" class="card-img-top card-image-style" alt="..."></a>
            <div class="card-body">
              <h5 class="card-title"><i class="fas fa-wine-bottle icon-s"></i>Diploma</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
            </div>
            <div class="card-footer">
              <i class="fas fa-book-open icon-s"></i>
              <small class="text-muted">Last updated 3 mins ago</small>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100">
            <a href="{{ route('fellowship_projects') }}"><img src="assets/images/course4.jpg" class="card-img-top card-image-style" alt="..."></a>
            <div class="card-body">
              <h5 class="card-title"><i class="fas fa-wine-bottle icon-s"></i>Fellowship</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
            </div>
            <div class="card-footer">
              <i class="fas fa-book-open icon-s"></i>
              <small class="text-muted">Last updated 3 mins ago</small>
            </div>
          </div>
        </div>
      </div>

</section>
<!------------- An Ad -------------->

<section id="learn" class="p-5  our_ad">
    <div class="container">
      <div class="row align-items-center justify-content-between">
        <div class="col-md p-5">
          <h2>Learn React</h2>
          <p class="lead">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
            Similique deleniti possimus magnam corporis ratione facere!
          </p>
          <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque
            reiciendis eius autem eveniet mollitia, at asperiores suscipit
            quae similique laboriosam iste minus placeat odit velit quos,
            nulla architecto amet voluptates?
          </p>
          <a href="#" class="btn btn-light mt-3">
            <i class="bi bi-chevron-right"></i> Read More
          </a>
        </div>
        
        <div class="col-md">
          <!-- style="border-radius: 20px ;" -->
          <img src="assets/images/1.jpg"  class="img-fluid ad_image"  alt="alo" />
        </div>
      </div>
    </div>
</section>

<!-------- Frequency Asked Questions --------->  

<section id="questions" class="p-5">

    <div class="container">

        <h2 class="text-center mb-4">Frequectly Asked Questions</h2>

        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne">
                    Who We Are?
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
                        molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
                        numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium
                        optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis
                        obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam
                        nihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit,
                        tenetur error, harum nesciunt ipsum debitis quas aliquid.</div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo">
                    How We Work?
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
                        molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
                        numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium
                        optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis
                        obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam
                        nihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit,
                        tenetur error, harum nesciunt ipsum debitis quas aliquid.</div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree">
                    How To Join Us?
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
                        molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
                        numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium
                        optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis
                        obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam
                        nihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit,
                        tenetur error, harum nesciunt ipsum debitis quas aliquid.</div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour">
                    Are We have Many And Diverce set of Courses?
                    </button>
                </h2>
                <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
                        molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
                        numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium
                        optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis
                        obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam
                        nihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit,
                        tenetur error, harum nesciunt ipsum debitis quas aliquid.</div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive">
                    How will I Be Evaluated?
                    </button>
                </h2>
                <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
                        molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
                        numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium
                        optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis
                        obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam
                        nihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit,
                        tenetur error, harum nesciunt ipsum debitis quas aliquid.</div>
                </div>
            </div>
        </div>

    </div>

</section>



@include('student.templates.footer')

