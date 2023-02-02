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
    
    <a class="btn btn-primary" href="{{ route('tutor.create' , $viewData['id_user'])}}">Become a Tutor</a>
    <h1>Tutor profile</h1>

    
</main>
</div>
</div>
@endguest
@include('partials.footer')