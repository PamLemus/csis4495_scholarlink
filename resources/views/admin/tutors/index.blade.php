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
    </nav>



    <div class="container"><br>
        <table class="table">
            <thead style="text-align:center">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">School</th>
                    <th scope="col">Degree</th>
                    <th scope="col">Major</th>
                    <th scope="col">Description</th>
                    <th scope="col">Tutor Image</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($viewData["tutors"] as $key=>$tutor)
                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$tutor->user->name}}</td>
                    <td>{{$tutor->user->last_name}}</td>
                    <td>{{$tutor->school}}</td>
                    <td>{{$tutor->degree}}</td>
                    <td>{{$tutor->major}}</td>
                    <td>{{$tutor->description}}</td>
                    <td><img src="../storage/{{$tutor->tutor_img}}" alt="" width="50" height="50"></td>
                    
                    <td>
                        <form action="{{ route('admin.tutors.destroy', $tutor) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-primary" href="{{ route('admin.tutors.edit', $tutor) }}">Edit</a>
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