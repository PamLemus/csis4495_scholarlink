@section('title', $tutors["title"])
@section('header', $tutors["header"])
@include('partials.header')
@include('partials.menu')

@guest
@include('cover')
@else
<!-- Header Start -->
<div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">@yield('header')</h1>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->

<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Tutors</h6>
            <h1 class="mb-5">Connect with Expert Instructors</h1>
        </div>
    </div>
</div>
<!-- Team End -->

<!-- Filter -->
<form method="GET" action="{{ route('tutor.results') }}">
    <div class="position-relative mx-auto" style="max-width: 400px;">
        <input class="form-control border-2 w-200 py-3 ps-4 pe-5" type="text" placeholder="Name, Major, University, Course" name="tutor_filter">
        <button type="submit" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Search</button>
    </div>
</form>

@endguest
@include('partials.footer')