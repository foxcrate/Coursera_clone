
<nav class="navbar navbar-expand-lg  fixed-top">
    <div class="container-fluid">
    <a href="{{ route('index') }}"><img class="logo" src="assets/images/online-programs-logo.png" alt="Logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="navbar-toggler-icon toggler-color fas fa-sliders-h"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav click ">
        <li class="nav-item ">
            <a class="nav-link  active" aria-current="page" href="{{ route('index') }}">Home</a>
        </li>
        <li >
            <a class="nav-link " href="{{ route('all_projects') }}">Projects</a>
        </li>
        <!-- <li class="nav-item ">
            <a class="nav-link  " href="#">How it Works</a>
        </li> -->
        <li class="nav-item  ">
            <a class="nav-link" href="{{ route('about') }}">About Us</a>
        </li>
        <li class="nav-item  ">
            <a class="nav-link" href="{{ route('contact') }}">Contact</a>
        </li>
    
        <!-- <form class="d-flex log-bot">
        <a class="btn btn-dark " href="{{ route('student_login') }}"  type="submit">Login</a>
        </form> -->


         <!-- Right Side Of Navbar -->
        <!-- <form class="d-flex log-bot">
            @guest('student')
                <a class="btn btn-dark m-1"  href="{{ route('student_login') }}">{{ __('Login') }}</a>
            @else 
                <a class="btn btn-dark "  href="{{ route('logout') }}">
                    {{ __('Logout') }}
                </a>
            </div>
            @endguest
        </form> -->

        <!-- @auth
            <a class="btn btn-dark "  href="{{ route('logout') }}">
                {{ __('Logout') }}
            </a>
        @else 
            <a class="btn btn-dark m-1"  href="{{ route('student_login') }}">{{ __('Login') }}</a>
        @endauth  -->


        <form class="d-flex log-bot">
        @if(Session::has('loggedUser'))
            <a class="btn btn-dark "  href="{{ route('logout') }}">
                {{ __('Logout') }}
            </a>
        @else 
        <a class="btn btn-dark m-1"  href="{{ route('student_login') }}">{{ __('Login') }}</a>
        @endif
        </form> 

    </div>
    </div>
</nav>

