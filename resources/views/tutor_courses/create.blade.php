@section('title', "Scholar Link")
@section('page_title', $viewData['title'])
@include('partials.header')
@include('partials.menu')
@guest
@include('cover')
@else

<link rel="stylesheet" href="{{ URL::asset('css/scholarlink.css') }}" />


<div class="container d-flex flex-row position-relative">
    <nav class="navbar navbar-light bg-light shadow p-0 flex-column position-relative " style="height:100%; left:-120px;">

        <a href="{{ route('tutor') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h3 class="h3">@yield('page_title')</h3>
        </a>

        <div class="p-4 p-lg-0 mt-auto">
            <a href="{{route('tutor.course.index' , ['tutor'=>$viewData['tutor']])}}" class="nav-item nav-link ">My Courses</a>
            <a href="{{isset($viewData['tutor']) ? route('tutor.course.create' , ['tutor'=>$viewData['tutor']]) : '#'}}" class="nav-item nav-link active">Add Courses</a>
        </div>
    </nav>



    <div class="container"><br>
        <form method="POST" action="{{ route('tutor.course.store' ,['tutor'=>$viewData['tutor']])}}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="course" class="form-label">Select Course*</label>
                <select name="course" class="form-select border-2 w-200 py-3 ps-4 pe-5">
                    <option selected>Select a course</option>
                    @foreach($viewData["courses"] as $course)
                    <option value="{{$course->course_id}}">{{$course->course_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="course_school" class="form-label">In which school did you previously take this course?</label>
                <input class="form-control border-2 w-200 py-3 ps-4 pe-5" type="text" placeholder="School, College, University" name="course_school">

            </div>

            <div class="mb-3">
                <label for="course_teacher" class="form-label">Which professor from your previous school taught you this course?</label>
                <input class="form-control border-2 w-200 py-3 ps-4 pe-5" type="text" placeholder="Teacher Name" name="course_teacher">

            </div>

            <input type="submit" class="btn btn-primary" value="Enroll a Course"><br>
            <small>*Required fields</small>
        </form>
    </div>
</div>
@endguest
@include('partials.footer')