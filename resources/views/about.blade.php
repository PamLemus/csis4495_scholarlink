@section('title', "Scholar Link")
@include('partials.header')
@include('partials.menu')

@guest


<!-- Header Start -->
<div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">About Us</h1>
                    <nav aria-label="breadcrumb">
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

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


<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="img-fluid position-absolute w-100 h-100" src="img/about.jpg" alt="" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>
                <h1 class="mb-4">Welcome to Scholar Link</h1>
                <p class="mb-4">Scholar Link is an innovative and interactive platform designed to revolutionize the way students of any subject learn. Our main goal is to connect experts with learners, meeting the diverse needs and learning styles of students of all ages and backgrounds. Whether you are a student looking to supplement classroom education, a working professional seeking to expand skills, or a lifelong learner interested in exploring new subjects, Scholar Link brings solutions for everyone.</p>
                <p class="mb-4">This project was developed through the GitHub platform. Both team members contributed equally by working on their respective branches and then merging into the main branch. We can find the repository of this project at the following link:</p>
                <div class="row gy-2 gx-4 mb-4">
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i><a href="https://github.com/PamLemus/csis4495_scholarlink">CSIS-4495 Scholar Link Project</a></p>
                    </div>
                </div>
                <a class="btn btn-primary py-3 px-5 mt-2" href="{{ route('register') }}">Join Now</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h4 class="section-title bg-white text-center text-primary px-3">The Founders</h4>
            <h1 class="mb-5"></h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
               
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item bg-light">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="img/pam.png" alt="">
                    </div>
                    <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        <div class="bg-light d-flex justify-content-center pt-2 px-1">
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4">
                        <h5 class="mb-0">Pamela Lemus</h5>
                        <small>Pamela Lemus, originally from Mexico, is a dedicated student enrolled in the Computer and Information Systems (Post-Baccalaureate Diploma) program at Douglas College. She brings her passion for technology and education to the Scholar Link project, aiming to make a positive impact on the learning experience for students around the globe.</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="team-item bg-light">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="img/1.jpeg" alt="">
                    </div>
                    <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        <div class="bg-light d-flex justify-content-center pt-2 px-1">
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4">
                        <h5 class="mb-0">Sebastian Gonzalez</h5>
                        <small>Sebastian Gonzalez, hailing from Chile, is also a driven student pursuing the Computer and Information Systems (Post-Baccalaureate Diploma) program at Douglas College. As an active participant in the creation of Scholar Link, his enthusiasm for technology and education fuels his efforts to build a platform that will transform the way students learn and connect with experts.</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                
            </div>
        </div>
    </div>
</div>
<!-- Team End -->

@else
@endguest
@include('partials.footer')