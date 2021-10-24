<div class=" container parent_to_video_and_tabs">
    <div class="row video_container "> 
        <video class="project_video" controls>
            <source src="http://localhost:8000/{{ $project->video }}" type="video/mp4">
            Your browser does not support HTML video.
        </video>
    </div>


    <div  class="row tabs_container mt-2">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item " role="presentation">
            <button class="nav-link my_tab active" id="home-tab" data-bs-toggle="tab" data-bs-target="#course_content" type="button" role="tab" aria-controls="home" aria-selected="true">Course Content</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link my_tab" id="profile-tab" data-bs-toggle="tab" data-bs-target="#instructors" type="button" role="tab" aria-controls="profile" aria-selected="false">Instructors</button>
        </li>
        <li class="nav-item " role="presentation">
            <button class="nav-link my_tab" id="contact-tab" data-bs-toggle="tab" data-bs-target="#payment" type="button" role="tab" aria-controls="contact" aria-selected="false">Payment</button>
        </li>
        </ul>
        <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="course_content" role="tabpanel">Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati possimus repudiandae provident recusandae in enim, id cum ullam mollitia molestias distinctio natus quaerat veritatis cumque inventore sit aut quis. Explicabo?Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati possimus repudiandae provident recusandae in enim, id cum ullam mollitia molestias distinctio natus quaerat veritatis cumque inventore sit aut quis. Explicabo?
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati possimus repudiandae provident recusandae in enim, id cum ullam mollitia molestias distinctio natus quaerat veritatis cumque inventore sit aut quis. Explicabo?
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati possimus repudiandae provident recusandae in enim, id cum ullam mollitia molestias distinctio natus quaerat veritatis cumque inventore sit aut quis. Explicabo?
        </div>
        <div class="tab-pane fade" id="instructors" role="tabpanel">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nesciunt at consequuntur culpa qui aliquid blanditiis deleniti quod quae unde tempora reiciendis dolorum consectetur autem porro, nisi corporis id nam laboriosam.</div>
        <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="contact-tab">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nesciunt at consequuntur culpa qui aliquid blanditiis deleniti quod quae unde tempora reiciendis dolorum consectetur autem porro, nisi corporis id nam laboriosam.</div>
        </div>
    </div>
</div>