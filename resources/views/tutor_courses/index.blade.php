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
                <a href="{{route('tutor.course.index' , ['tutor'=>$viewData['tutor']])}}" class="nav-item nav-link active">My Courses</a>
                <a href="{{isset($viewData['tutor']) ? route('tutor.course.create' , ['tutor'=>$viewData['tutor']]) : '#'}}" class="nav-item nav-link">Add Courses</a>
            </div>
        </nav>
    </div>


    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($viewData["tutor"]->courses as $key=>$course)
                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$course->course_name}}</td>
                    <td></td>
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