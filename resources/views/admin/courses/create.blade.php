@include('partials.header')
@include('partials.menu')
@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">{{ __('Enter the information to add a new course:') }}</div>
            <div class="card-body">



               
                    <form method="POST" action="{{ route('admin.courses.store') }}">
                        @csrf
 
                        <div class="row mb-3">
                            <label for="course_name" class="col-md-4 col-form-label text-md-end">{{ __('Course Name') }}</label>

                            <div class="col-md-6">
                                <input id="course_name" type="text" class="form-control @error('course_name') is-invalid @enderror" name="course_name" value="{{ old('course_name') }}" required autocomplete="course_name" autofocus>

                                @error('course_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add a New Course') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('partials.footer')
@endsection
