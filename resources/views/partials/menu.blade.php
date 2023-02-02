<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">@yield('title')</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            @guest
            <a class="nav-link px-3" href="{{ route('register') }}">Create an account</a>
            <a class="nav-link px-3" href="{{ route('login') }}">Sign In</a>
            <a class="nav-link px-3" href="{{ route('about') }}">About</a>
            @else
            <div>
                <a class="nav-link px-3" href="{{ route('logout') }}">Logout</a>
            </div>
            <div>
                
                @endguest
            </div>
        </div>
    </div>


</header>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3 sidebar-sticky">
                <ul class="nav flex-column">
                    
                @if(Auth()->user()->user_type == "user")
                <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="">
                            <span data-feather="home" class="align-text-bottom"></span>
                            My Courses
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">
                            <span data-feather="file" class="align-text-bottom"></span>
                            Find a tutor
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">
                            <span data-feather="shopping-cart" class="align-text-bottom"></span>
                            My lectures content
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">
                            <span data-feather="users" class="align-text-bottom"></span>
                            Chat
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tutor') }}">
                            <span data-feather="tutor" class="align-text-bottom"></span>
                            Tutor
                        </a>
                    </li>

                    @elseif(Auth()->user()->user_type == "admin")
                    <li class="nav-item">
                        <a class="nav-link" href="">
                            <span data-feather="file" class="align-text-bottom"></span>
                            Users
                        </a>
                    </li>

                    @endif
                </ul>



            </div>

        </nav>