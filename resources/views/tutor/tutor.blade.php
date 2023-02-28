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
            <a href="{{route('tutor.course.index' , ['tutor'=>$viewData['user']->tutor->tutor_id])}}" class="nav-item nav-link">My Courses</a>
            <a href="{{route('tutor.course.store' , ['tutor'=>$viewData['user']->tutor->tutor_id])}}" class="nav-item nav-link">Add Courses</a>
        </div>
    </nav>




    <div class="container px-md-4" style="padding-left: 270px;"><br>
        <div class="team-single">
            <div class="row">
                <div class="col-lg-4 col-md-5 xs-margin-30px-bottom">
                    <div class="team-single-img" style="display: flex; justify-content: center;">
                        <img src="storage/{{$viewData['user']->tutor->tutor_img}}" alt="">
                    </div>
                    <div class="bg-light-gray padding-30px-all md-padding-25px-all sm-padding-20px-all text-center">
                        <h4 class="margin-10px-bottom font-size28 md-font-size22 sm-font-size20 font-weight-600">{{$viewData['user']->name .' ' . $viewData['user']->last_name}}</h4>
                        <p class="sm-width-95 sm-margin-auto">{{$viewData['user']->tutor->description}}</p>
                        <div class="margin-20px-top team-single-icons">
                            <ul class="no-margin">
                                <li><a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-md-7">
                    <div class="team-single-text padding-50px-left sm-no-padding-left">
                        <h4 class="font-size38 sm-font-size32 xs-font-size30">About {{$viewData['user']->name}}:</h4>
                        <p class="no-margin-bottom"></p>
                        <div class="contact-info-section margin-40px-tb">
                            <ul class="list-style9 no-margin">
                                <li>

                                    <div class="row">
                                        <div class="col-md-5 col-5">
                                            <i class="fas fa-graduation-cap text-orange"></i>
                                            <strong class="margin-10px-left text-orange">University:</strong>
                                        </div>
                                        <div class="col-md-7 col-7">
                                            <p>{{$viewData['user']->tutor->school}}</p>
                                        </div>
                                    </div>

                                </li>
                                <li>

                                    <div class="row">
                                        <div class="col-md-5 col-5">
                                            <i class="fas fa-star text-orange"></i>
                                            <strong class="margin-10px-left text-orange">Degree:</strong>
                                        </div>
                                        <div class="col-md-7 col-7">
                                            <p>{{$viewData['user']->tutor->degree}}</p>
                                        </div>
                                    </div>

                                </li>
                                <li>

                                    <div class="row">
                                        <div class="col-md-5 col-5">
                                            <i class="far fa-gem text-yellow"></i>
                                            <strong class="margin-10px-left text-yellow">Major:</strong>
                                        </div>
                                        <div class="col-md-7 col-7">
                                            <p>{{$viewData['user']->tutor->major}}</p>
                                        </div>
                                    </div>

                                </li>
                                <li>

                                    <div class="row">
                                        <div class="col-md-5 col-5">
                                            <i class="far fa-file text-lightred"></i>
                                            <strong class="margin-10px-left text-lightred">Courses:</strong>
                                        </div>
                                        <div class="col-md-7 col-7">
                                            @if (count($viewData["user"]->tutor->courses) == 0)
                                            <p>No registered courses</p>
                                            @else
                                            @foreach($viewData["user"]->tutor->courses as $key=>$course)
                                            <p>{{$course->course_name}}</p>
                                            @endforeach
                                            @endif
                                        </div>

                                    </div>


                                </li>
                                <li>

                                    <div class="row">
                                        <div class="col-md-5 col-5">
                                            <i class="fas fa-lightbulb text-green"></i>
                                            <strong class="margin-10px-left text-green">Occupation:</strong>
                                        </div>
                                        <div class="col-md-7 col-7">
                                            <p>{{$viewData['user']->occupation}}</p>
                                        </div>
                                    </div>

                                </li>

                                <li>
                                    <div class="row">
                                        <div class="col-md-5 col-5">
                                            <i class="fas fa-envelope text-pink"></i>
                                            <strong class="margin-10px-left xs-margin-four-left text-pink">Email:</strong>
                                        </div>
                                        <div class="col-md-7 col-7">
                                            <p><a href="javascript:void(0)">{{$viewData['user']->email}}</a></p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endguest
@include('partials.footer')