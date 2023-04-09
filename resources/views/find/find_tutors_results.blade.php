@section('title', $tutors["title"])
@section('header', $tutors["header"])
@include('partials.header')
@include('partials.menu')

@guest
@include('cover')
@else

<br>
<div class="text-center wow fadeInUp" data-wow-delay="0.1s">
    <h6 class="section-title bg-white text-center text-primary px-3">Filters</h6>
</div><br>

<!-- Filters -->

<form class="form-control-center" method="GET" action="{{ route('tutor.filters') }}" style="width:70%; margin: 0 auto;">
    <div class="row">
        <div class="col-md-6">

            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input name="name" class="form-control" type="text">
            </div>

            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name:</label>
                <input name="last_name" class="form-control" type="text">
            </div>

            <div class="mb-3">
                <label for="occupation" class="form-label">Occupation:</label>
                <input name="occupation" class="form-control" type="text">
            </div>

            <div class="mb-3">
                <label for="school" class="form-label">School:</label>
                <input name="school" class="form-control" type="text">
            </div>

            <div class="mb-3">
                <label for="degree" class="form-label">Degree:</label>
                <input name="degree" class="form-control" type="text">
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="major" class="form-label">Major:</label>
                <input name="major" class="form-control" type="text">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <input name="description" class="form-control" type="text">
            </div>

            <div class="mb-3">
                <label for="course_name" class="form-label">Course Name:</label>
                <input name="course_name" class="form-control" type="text">
            </div>

            <div class="mb-3">
                <label for="p_course_school" class="form-label">School where the tutor took the course:</label>
                <input name="p_course_school" class="form-control" type="text">
            </div>

            <div class="mb-3">
                <label for="p_course_teacher" class="form-label">Instructor who taught the course to the tutor:</label>
                <input name="p_course_teacher" class="form-control" type="text">
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Apply Filters">
    </div>
</form>



<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">

            @foreach($tutors["results"] as $ins)
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="{{$tutors['delay']}}s">
                <div class="team-item bg-light">
                    <div class="overflow-hidden text-center">
                        <a href="{{ route('tutor.show', $ins->tutor_id) }}"><img class="img-fix" src="{{ asset('storage/'.$ins->tutor_img)}}" alt=""></a>
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
                        <h6 class="fst-italic"> {{ $ins->degree }} in {{ $ins->major }} from {{ $ins->school }} </h6>
                        <small> {{ $ins->description }} </small><br><br>
                        <h5 class="text-primary section-title px-4"> Courses: </h5>
                        <table class="table" style="font-size:12px;">
                            <thead style="text-align:center">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">School where I took the course</th>
                                    <th scope="col">Instructor who taught the course</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ins->courses as $key => $course)
                                <tr>
                                    <td>{{$course}}</td>
                                    <td>{{$ins->p_course_school[$key]}}</td>
                                    <td>{{$ins->p_course_teacher[$key]}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endforeach

        

            @foreach($tutors['tutors_without_courses'] as $miss)
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="{{$tutors['delay']}}s">
                <div class="team-item bg-light">
                    <div class="overflow-hidden text-center">
                        <a href="{{ route('tutor.show', $miss->tutor_id) }}"><img class="img-fix" src="{{ asset('storage/'.$miss->tutor_img)}}" alt=""></a>
                    </div>
                    <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        <div class="bg-light d-flex justify-content-center pt-2 px-1">
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4">
                        <h4 class="mb-0 text-center"> {{ $miss->name }} {{ $miss->last_name }} </h4>
                        <h5 class="text-primary section-title px-4"> {{ $miss->occupation }} </h5>
                        <h6 class="fst-italic"> {{ $miss->degree }} in {{ $miss->major }} from {{ $miss->school }} </h6>
                        <small> {{ $miss->description }} </small><br><br>
                        <h5 class="text-primary section-title px-4"> Courses: </h5>
                        <p>No registered courses</p>
                    </div>
                </div>
            </div>
            @endforeach
            @if (count($tutors["results"]) == 0 && count($tutors["tutors_without_courses"]) == 0)
            <p class="text-center mb-4">No results found </p>
        </div>
        @endif
    </div>
</div>


<!-- Team End -->
@endguest
@include('partials.footer')