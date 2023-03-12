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
            <a href="{{route('admin.users.create')}}" class="nav-item nav-link">Add User</a>
        </div>
    </nav>



    <div class="container"><br>
        <table class="table">
            <thead style="text-align:center">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">Occupation</th>
                    <th scope="col">Email</th>
                    <th scope="col">User Type</th>
                    <th scope="col-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($viewData["users"] as $key=>$user)
                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->last_name}}</td>
                    <td>{{$user->date_of_birth}}</td>
                    <td>{{$user->occupation}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->user_type}}</td>
                    <td>
                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-primary" href="{{ route('admin.users.edit', $user) }}">Edit</a>
                            @if($user->user_type == 'user')
                            <button class="btn btn-danger" type="submit">Delete</button>
                            <a class="btn btn-success" href="{{ route('admin.tutors.create') }}?id={{$user->id}}">Become a Tutor</a>
                            @endif
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