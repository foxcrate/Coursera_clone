

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header" >
                <!-- <h4>Easy Courses</h4> -->
                <a href="{{ route('dashboard') }}" style="font-size:25px;" > Easy Courses </a>
            </div>


            <ul class="list-unstyled components">
                <!-- <p>Dummy Heading</p> -->

                 @if (Auth::user()->level == 0 || Auth::user()->level==1)
                <li >
                    <a href="{{ route('cycles.index') }}">Cycles</a>
                </li>
                @endif

                @if (Auth::user()->level == 0)
                <li>
                    <a href="{{ route('teachers.index') }}">Teachers</a>
                </li>
                @endif

                @if (Auth::user()->level == 0)
                <li>
                    <a href="{{ route('students.index') }}">Students</a>
                </li>
                @endif

                @if (Auth::user()->level == 0 || Auth::user()->level==2)
                <li>
                    <a href="{{ route('cycle_payments.index') }}" >Cycles Payements</a>
                </li>
                @endif

                @if (Auth::user()->level == 0)
                <li>
                    <a href="{{ route('services.index') }}">Services</a>
                </li>
                @endif

                @if (Auth::user()->level == 0 || Auth::user()->level==2)
                <li>
                    <a href="{{ route('service_payments.index') }}">Services Payments</a>
                </li>
                @endif

                @if (Auth::user()->level == 0)
                <li>
                    <a href="{{ route('books.index') }}">Books</a>
                </li>
                @endif

                @if (Auth::user()->level == 0 || Auth::user()->level==2)
                <li>
                    <a href="{{ route('book_payments.index') }}">Books Payments</a>
                </li>
                @endif

                @if (Auth::user()->level == 0)
                <li>
                    <a href="{{ route('projects.index') }}">Projects</a>
                </li>
                @endif

                @if (Auth::user()->level == 0)
                <li>
                    <a href="{{ route('semesters.index') }}">Semesters</a>
                </li>
                @endif

                @if (Auth::user()->level == 0)
                <li>
                    <a href="{{ route('courses.index') }}" >Courses</a>
                </li>
                @endif

                @if (Auth::user()->level == 0)
                <li>
                    <a href="{{ route('requests_to_projects.index') }}" >Requests To Projects</a>
                </li>
                @endif

                @if (Auth::user()->level == 0 || Auth::user()->level==1)
                {{-- <li>
                    <a href="#">Discussion</a>
                </li> --}}
                @endif

                @if (Auth::user()->level == 0 || Auth::user()->level==1)
                <li>
                    <a href="{{ route('course_question.index') }}" >Courses Questions</a>
                </li>
                @endif

                @if (Auth::user()->level == 0 || Auth::user()->level==1)
                <li>
                    <a href="{{ route('researches.index') }}" >Researches</a>
                </li>
                @endif

                @if (Auth::user()->level == 0 || Auth::user()->level==1)
                <li>
                    <a href="{{ route('researches.submitted') }}" >Submitted Researches</a>
                </li>
                @endif

                @if (Auth::user()->level == 0)
                <li>
                    <a href="{{ route('admins.index') }}" >Users</a>
                </li>
                @endif

                {{-- <li>
                    <a href="#">Settings</a>
                </li> --}}

            </ul>

        </nav>
