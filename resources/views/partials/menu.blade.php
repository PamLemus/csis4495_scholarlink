 <!-- Spinner Start -->
 <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
     <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
         <span class="sr-only">Loading...</span>
     </div>
 </div>
 <!-- Spinner End -->


 <!-- Navbar Start -->
 <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
     <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
         <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>@yield('title')</h2>
     </a>
     <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
         <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarCollapse">
         <div class="navbar-nav ms-auto p-4 p-lg-0">
         @auth    
         @if(Auth()->user()->user_type == "user")
             <a href="index.html" class="nav-item nav-link active">Home</a>
             <a href="about.html" class="nav-item nav-link">My Courses</a>
             <a href="courses.html" class="nav-item nav-link">Find a tutor</a>
             <a href="{{ route('tutor.create') }}" class="nav-item nav-link">  
                 @if(Auth()->user()->tutor)
                 Tutor
                 @else
                 Become a Tutor
                 @endif
             </a>
             @elseif(Auth()->user()->user_type == "admin")
             <a href="" class="nav-item nav-link">Users</a>
             @endif
            
             @endif
             @guest
             <a href="" class="nav-item nav-link">About</a>
             <a href="{{ route('login') }}" class="nav-item nav-link">Sign In</a>

         </div>

         <a href="{{ route('register') }}" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Create an account<i class="fa fa-arrow-right ms-3"></i></a>
         @else
         <a href="{{ route('logout') }}" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Logout<i class="fa fa-arrow-right ms-3"></i></a>
     </div>
     @endguest
 </nav>
 
 <!-- Navbar End -->