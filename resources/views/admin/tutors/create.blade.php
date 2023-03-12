@section('title', "Scholar Link")
@section('page_title', $viewData['title'])
@include('partials.header')
@include('partials.menu')
@guest
@include('cover')
@else
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">@yield('page_title')</h1>
    </div>

    <form method="POST" action="{{ route('admin.tutors.store')}}" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="tutor_user_id" value="{{$viewData['user']->id}}">

        <div class="mb-3">
            <label for="bank" class="form-label">Name</label>
            <input type="text" class="form-control" id="first_name" name="" value="{{$viewData['user']->name}}" disabled>
        </div>

        <div class="mb-3">
            <label for="bank" class="form-label">Profile Image</label>
            <input type="file" class="form-control" id="tutor_img" name="tutor_img">
        </div>

        <div class="mb-3">
            <label for="degree" class="form-label">Select a Degree</label>
            <select name="degree" class="form-select">
                <option selected>Select a degree</option>
                @foreach($viewData["degrees"] as $degree)
                <option value="{{$degree}}">{{$degree}}</option>
                @endforeach
            </select>
        </div>


        <div class="mb-3">
            <label for="bank" class="form-label">School</label>
            <input type="text" class="form-control" id="school" name="school">
        </div>

        <div class="mb-3">
            <label for="have_amount" class="form-label">Major</label>
            <input type="text" class="form-control" id="major" name="major">
        </div>

        <div class="mb-3">
            <label for="owe_amount" class="form-label">Description</label>
            <textarea id="description" name="description" class="form-control" rows="8" cols="50"></textarea>
        </div>

        <input type="submit" class="btn btn-primary" value="Register as a Tutor">
    </form>




</main>
</div>
</div>
@endguest
@include('partials.footer')