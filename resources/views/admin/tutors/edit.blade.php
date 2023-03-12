@include('partials.header')
@section('page_title', $viewData['title'])
@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">@yield('page_title')</div>
            <div class="card-body">



               
                    <form method="POST" action="{{ route('admin.tutors.update' , ['tutor'=>$viewData['tutor']]) }}">
                        @csrf
                        @method("PUT")

                        <div class="row mb-3">
                            <label for="school" class="col-md-4 col-form-label text-md-end">{{ __('School') }}</label>

                            <div class="col-md-6">
                                <input id="school" type="text" class="form-control @error('school') is-invalid @enderror" name="school" value="{{ old('school' , $viewData['tutor']->school)  }}" required autocomplete="school" autofocus>

                                @error('school')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="degree" class="col-md-4 col-form-label text-md-end">{{ __('Degree') }}</label>

                            <div class="col-md-6">
                                <input id="degree" type="text" class="form-control @error('degree') is-invalid @enderror" name="degree" value="{{ old('degree' , $viewData['tutor']->degree)  }}" required autocomplete="degree" autofocus>

                                @error('degree')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="major" class="col-md-4 col-form-label text-md-end">{{ __('Major') }}</label>

                            <div class="col-md-6">
                                <input id="major" type="text" class="form-control @error('major') is-invalid @enderror" name="major" value="{{ old('major', $viewData['tutor']->major)  }}" required autocomplete="major" autofocus>

                                @error('major')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        
                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description', $viewData['tutor']->description) }}" required autocomplete="description" autofocus>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit') }}
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
