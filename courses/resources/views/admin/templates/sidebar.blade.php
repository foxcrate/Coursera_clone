

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header" >
                <!-- <h4>Easy Courses</h4> -->
                <a href="{{ route('dashboard') }}" style="font-size:25px;" > Easy Courses </a>
            </div>

            
            <ul class="list-unstyled components">
                <!-- <p>Dummy Heading</p> -->
                <li >
                    <a href="{{ route('cycles.index') }}">Cycles</a>
                </li>
                <li>
                    <a href="{{ route('teachers.index') }}">Teachers</a>
                </li>
                <li>
                    <a href="{{ route('students.index') }}">Students</a>
                </li>
                <li>
                    <a href="{{ route('cycle_payments.index') }}" >Cycles Payements</a>
                </li>
                <li>
                    <a href="{{ route('services.index') }}">Services</a>
                </li>
                <li>
                    <a href="{{ route('service_payments.index') }}">Services Payments</a>
                </li>
                <li>
                    <a href="{{ route('books.index') }}">Books</a>
                </li>
                <li>
                    <a href="{{ route('projects.index') }}">Projects</a>
                </li>
                <li>
                    <a href="{{ route('semesters.index') }}">Semesters</a>
                </li>
                <li>
                    <a href="{{ route('courses.index') }}" >Courses</a>
                </li>
                <li>
                    <a href="{{ route('requests_to_projects.index') }}" >Requests To Projects</a>
                </li>
                <li>
                    <a href="#">Discussion</a>
                </li>
                <li>
                    <a href="{{ route('course_question.index') }}" >Courses Questions</a>
                </li>
                <li>
                    <a href="#">Researches</a>
                </li>
                <li>
                    <a href="#">Users</a>
                </li>
                <li>
                    <a href="#">Settings</a>
                </li>
                
            </ul>
            
        </nav>