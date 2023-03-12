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
            <a href="{{route('admin.courses.create')}}" class="nav-item nav-link">Add Course</a>
        </div>
    </nav>



    <div class="container"><br>
        <table class="table">
            <thead style="text-align:center">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Course Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($viewData["courses"] as $key=>$course)
                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$course->course_name}}</td>
                    <td>
                        <form action="{{ route('admin.courses.destroy', $course) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-primary" href="{{ route('admin.courses.edit', $course) }}">Edit</a>
                            <button class="btn btn-danger" type="submit">Delete</button>
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