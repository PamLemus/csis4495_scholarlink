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

            <a href="{{route('tutor.course.index' , ['tutor'=>$viewData['tutor']])}}" class="nav-item nav-link active">My Courses</a>
            <a href="{{isset($viewData['tutor']) ? route('tutor.course.create' , ['tutor'=>$viewData['tutor']]) : '#'}}" class="nav-item nav-link">Add Courses</a>
        </div>
    </nav>



    <div class="container"><br>
        <table class="table">
            <thead style="text-align:center">
                <tr>
                    <th scope="col">Number</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">School where I took the course</th>
                    <th scope="col">Instructor who taught the course</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($viewData["tutor"]->courses as $key=>$course)
                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$course->course_name}}</td>
                    <td>{{$course->pivot->p_course_school}}</td>
                    <td>{{$course->pivot->p_course_teacher}}</td>
                    <td>
                        <form action="{{ route('tutors.courses.destroy', ['tutor_id'=>$viewData['tutor'], 'course_id'=>$course->course_id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-primary" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>





    </main>
</div>
</div>
@endguest
@include('partials.footer')