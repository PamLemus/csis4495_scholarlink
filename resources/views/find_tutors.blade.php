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


<!-- Filter -->
<form method="GET" action="{{ route('tutor.results') }}">
    <div class="position-relative mx-auto" style="max-width: 400px;">
        <input class="form-control border-2 w-200 py-3 ps-4 pe-5" type="text" placeholder="Name, Major, University" name="tutor_filter">
        <button type="submit" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Search</button>
    </div>
</form>


<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Tutors</h6>
            <h1 class="mb-5">Connect with Expert Instructors</h1>
        </div>


        <div class="row g-4">

            @foreach($tutors["tutors"] as $ins)
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="{{$tutors['delay']}}s">
                <div class="team-item bg-light">
                    <div class="overflow-hidden text-center">
                        <img class="img-fix" src="{{ asset('storage/'.$ins->tutor_img)}}" alt="">
                    </div>
                    <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        <div class="bg-light d-flex justify-content-center pt-2 px-1">
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4">
                        <h4 class="mb-0 text-center"> {{ $ins->name }} {{ $ins->last_name }} </h4>
                        <h5 class="text-primary section-title px-4"> {{ $ins->occupation }} </h5>
                        <h6 class="fst-italic"> {{ $ins->degree }} in {{ $ins->major }} from {{ $ins->school }} </h6> <br>
                        <small> {{ $ins->description }} </small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Team End -->

@endguest
@include('partials.footer')