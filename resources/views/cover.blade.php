@section('title', "Scholar Link")
@include('partials.header')
@include('partials.menu')

@guest



<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5">
    <div class="owl-carousel header-carousel position-relative">
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="/img/back.jpg" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-sm-10 col-lg-8">
                            <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Best EdTech Platform</h5>
                            <h2 class="display-5 text-white animated slideInDown">Connect with peer tutors or with experienced professors</h2>
                            <p class="fs-5 text-white mb-4 pb-2"></p>
                            <a href="{{ route('about') }}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Read More</a>
                            <a href="{{ route('register') }}" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Join Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="/img/back2.jpg" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-sm-10 col-lg-8">
                            <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Best Online Tutors</h5>
                            <h1 class="display-3 text-white animated slideInDown">Enhance your educational process</h1>
                            <p class="fs-5 text-white mb-4 pb-2"></p>
                            <a href="{{ route('about') }}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Read More</a>
                            <a href="{{ route('register') }}" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Join Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->


<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                        <h5 class="mb-3">Skilled Instructors</h5>
                        <p>Our platform features skilled instructors from diverse backgrounds, dedicated to providing personalized guidance and support for students in various subjects.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-globe text-primary mb-4"></i>
                        <h5 class="mb-3">Global Connection Link</h5>
                        <p>Connect and communicate with expert tutors and professors from around the world, broadening your educational horizons and enhancing your learning experience.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-home text-primary mb-4"></i>
                        <h5 class="mb-3">Interactive Chat Platform</h5>
                        <p>Our platform includes a user-friendly chat feature that fosters open communication between students, tutors, and instructors. This interactive tool enables users to ask questions, discuss topics, and collaborate in real-time, creating a dynamic and engaging learning environment for all participants.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-book-open text-primary mb-4"></i>
                        <h5 class="mb-3">Tutor Notes</h5>
                        <p>Scholar Link offers a valuable resource in the form of tutor notes, which are carefully curated and shared by our experienced instructors. These notes cover essential concepts, provide helpful tips, and offer insights that can enhance students' understanding of their chosen subjects, leading to better academic outcomes and overall success.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->
@else
@endguest
@include('partials.footer')