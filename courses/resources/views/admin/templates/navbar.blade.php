<!-- Page Content  -->
<div id="content" class="">

<nav class="navbar navbar-expand-lg bg-dark navbar-dark rounded m-1">

    <div class="container-fluid">

        <button type="button" id="sidebarCollapse" class="btn nav_left_btn">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- <a href="#" class="navbar-brand mx-2">Easy Courses</a> -->
        

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navmenu">
            <ul class="navbar-nav ms-auto">

                <!-- <li class="nav-item">
                    <a href="#questions" class="nav-link">Explore</a>
                </li> -->

                <li class="nav-item">
                    <div class="dropdown ">
                        <a class="btn btn-dark nav-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" >
                            {{Auth::user()->name}}
                        </a>
                        <div class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuButton">
                            <!-- <a class="dropdown-item text-light" href="#">Profile</a> -->
                            <!-- <a class="dropdown-item text-light" href="#">Logout</a> -->
                            <a class="dropdown-item text-light" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                        </div>
                    </div>
                </li>

            </ul>
        </div>

    </div>
    
</nav>