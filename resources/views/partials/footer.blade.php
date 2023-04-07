<!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-2">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
            </div>
            <div class="col-lg-3 col-md-6">
            @auth
                <h4 class="text-white mb-3">Quick Link</h4>

                
                @if(Auth()->user()->user_type == "user")
                <a class="btn btn-link" href="{{ route('tutor.filter') }}">Home</a>
                @if(Auth()->user()->tutor)
                <a class="btn btn-link" href="{{ route('tutor') }}">Tutor Profile </a>
                @else
                <a class="btn btn-link" href="{{ route('tutor.create') }}">Become a Tutor </a>
                @endif
                <a class="btn btn-link" href="{{ route('chat') }}">Chat Platform</a>
                <a class="btn btn-link" href="{{ route('content.lecture') }}">My Lecture Content</a>
                @elseif(Auth()->user()->user_type == "admin")
                <a class="btn btn-link" href="{{ route('admin.users.index') }}">Users</a>
                <a class="btn btn-link" href="">Tutors</a>
                <a class="btn btn-link" href="">Courses</a>
                @endif
                @endauth
            </div>







            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Contact</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>700 Royal Avenue, New Westminster, British Columbia</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+604 527 5400</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>scholarlink.team@gmail.com</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>


        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-8 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#">Scholar Link Technologies Inc. 2023</a>. All Rights Reserved.
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="/lib/wow/wow.min.js"></script>
<script src="/lib/easing/easing.min.js"></script>
<script src="/lib/waypoints/waypoints.min.js"></script>
<script src="/lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="/js/main.js"></script>
</body>

</html>