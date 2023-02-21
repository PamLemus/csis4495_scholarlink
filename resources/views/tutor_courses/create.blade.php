@section('title', "Scholar Link")
@section('page_title', $viewData['title'])
@include('partials.header')
@include('partials.menu')
@guest
@include('cover')
@else
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ URL::asset('css/scholarlink.css') }}" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">

            <a href="{{route('tutor')}}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">

                <h3 class="h3">@yield('page_title')</h3>

            </a>

            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{route('tutor.course.index' , ['tutor'=>$viewData['tutor']])}}" class="nav-item nav-link ">My Courses</a>
                <a href="{{isset($viewData['tutor']) ? route('tutor.course.create' , ['tutor'=>$viewData['tutor']]) : '#'}}" class="nav-item nav-link active">Add Courses</a>
            </div>
        </nav>
    </div>


    <div class="container">
        <form method="POST" action="{{ route('tutor.course.store' ,['tutor'=>$viewData['tutor']])}}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="course" class="form-label">Select Course</label>
                <select name="course" class="form-select">
                    <option selected>Select a course</option>
                    @foreach($viewData["courses"] as $course)
                    <option value="{{$course->course_id}}">{{$course->course_name}}</option>
                    @endforeach
                </select>
            </div>

            <input type="submit" class="btn btn-primary" value="Enroll a Course">
        </form>
    </div>





</main>
</div>
</div>
@endguest
@include('partials.footer')