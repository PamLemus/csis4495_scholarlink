@section('title', $content["title"])
@section('header', $content["header"])
@include('partials.header')
@include('partials.menu')
@guest
@include('cover')
@else
<!-- Header Start -->
<div class="container-fluid bg-primary py-5 mb-5 page-header-content">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <h1 class="display-7 text-white animated slideInDown">@yield('header')</h1>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->

@php
$evaluationModal = false;
@endphp

<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">
                    <h6>{{ __('My lecture notes') }}</h6>
                </div>
                <div class="card-body">
                    <form id="mainForm" method="POST" action="{{ route('content.lecture.store', ['content' =>$content['notes']] )}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="course" class="text-primary col-form-label text-md-start">Course: </label>
                            <select name="course" id="course" class="form-select border-2 w-200 py-3 ps-4 pe-5">
                                <option selected>Select a course</option>
                                @foreach($content['courses'] as $course)
                                <option value="{{$course->course_id}}" {{ (old('course') == $course->course_id) ? 'selected' : '' }}>{{$course->course_name}}</option>

                                @endforeach
                                <input type="hidden" name="course" id="course_id" value="{{ old('course') }}">
                            </select>
                        </div>
                        <div class="row mb-3">
                            <label for="tutor" class="text-primary col-form-label text-md-start">Tutor: </label>
                            <select name="tutor" id="tutor" class="form-select border-2 w-200 py-3 ps-4 pe-5">
                                <option selected>Select your tutor</option>
                                @foreach($content['tutors'] as $tutor)
                                <option value="{{$tutor['id']}}" {{ (old('tutor') == $tutor['id']) ? 'selected' : '' }}>{{$tutor['name']}} {{$tutor['last_name']}}</option>

                                @endforeach
                                <input type="hidden" name="tutor" id="tutor_id" value="{{ old('tutor') }}">
                            </select>
                        </div>
                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                        <div class="row mb-3">
                            <label for="content" class="text-primary col-form-label text-md-start">Lecture content:</label>
                            <textarea id="content" name="content">{{ $content["textarea"] ? $content["textarea"] : '' }}</textarea>

                            <input type="hidden" name="content_plain" id="content_plain">
                        </div>

                        <!-- Email Modal -->
                        <div class="modal fade" id="emailModal" tabindex="-1" aria-labelledby="emailModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="emailModalLabel">Send Notes by Email</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="email-input" class="form-label">Email address:</label>
                                            <input type="email" class="form-control" id="email-input" name="email">
                                            <div id="email-error" class="text-danger d-none mt-1">Please enter an email address.</div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" name="action" value="email" class="btn btn-primary">Send Email</button>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="position-relative mx-auto text-center">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-center">

                                    <button type="button" id="evaluateTutor" class="btn @if(session('evaluation_success')) btn-secondary @else btn-primary @endif mt-4 me-5 w-90" data-bs-toggle="modal" data-bs-target="#evaluationModal">Evaluate Tutor</button>
                                    <button type="button" id="downloadPDF" onclick="submitForm('download')" class="btn @if(session('evaluation_success')) btn-primary @else btn-secondary @endif mt-4 me-5 w-90" @if(!session('evaluation_success')) disabled @endif>Download as PDF</button>
                                    <button type="button" id="sendEmail" onclick="submitForm('email')" class="btn @if(session('evaluation_success')) btn-primary @else btn-secondary @endif mt-4 w-90" data-bs-toggle="modal" data-bs-target="#emailModal" @if(!session('evaluation_success')) disabled @endif>Send by Email</button>



                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Evaluation Modal -->
<div class="modal fade" id="evaluationModal" tabindex="-1" aria-labelledby="evaluationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="evaluationModalLabel">Please give us some feedback about your Tutor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form id="evaluationForm" action="{{ route('content.lecture.evaluation') }}" method="POST">


                    @csrf

                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                    <input type="hidden" name="tutor" id="evaluation-tutor" value="">
                    <input type="hidden" name="course" id="evaluation-course" value="">
                    





                    <div class="form-group row">
                        <label for="grade" class="col-md-2 col-form-label">Grade:</label>
                        <div class="col-md-4">
                            <input type="number" name="grade" id="grade" min="1" max="5" class="form-control" placeholder="From 1 to 5" required>
                        </div>


                        <div class="col-md-4">

                            <label for="take_again" class="form-check-label" colspan="2">Would you take a session again with this tutor?</label>
                            <div class="form-check">
                                <input type="radio" id="yes" name="take_again" class="form-check-input" value="1" required>
                                <label for="yes" class="form-check-label">Yes</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="no" name="take_again" class="form-check-input" value="0">
                                <label for="no" class="form-check-label">No</label>
                            </div>
                        </div>
                        <div>

                            <label for="difficulty" class="col-md-2 col-form-label">Level of Difficulty:</label>
                            <div class="col-md-4">
                                <input type="number" name="difficulty" id="difficulty" min="1" max="5" class="form-control" placeholder="From 1 to 5" required>
                            </div>
                        </div>
                    </div>






                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" onclick="submitEvaluation()" id="submitEvaluation" class="btn btn-primary">Submit Evaluation</button>

            </div>
        </div>
    </div>
</div>

<script>
    tinymce.init({
        selector: 'textarea#content',
        height: 500,
        menubar: true,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | ' +
            'bold italic forecolor backcolor| alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat',

    });


    $('form').on('submit', function() {
        var content = tinymce.get('content').getContent({
            format: 'text'
        });
        $('#content_plain').val(content);
    });




    document.getElementById('downloadPDF').addEventListener('click', function() {
        $evaluationModal = true;
        document.getElementById('downloadPDF').disabled = true;
        document.getElementById('sendEmail').disabled = true;

    });
    document.getElementById('sendEmail').addEventListener('click', function() {
        $evaluationModal = true;
        document.getElementById('downloadPDF').disabled = true;
        document.getElementById('sendEmail').disabled = true;

    });

    function showEvaluationModal() {
        // Display the evaluation modal
        var evaluationModal = new bootstrap.Modal(document.getElementById('evaluationModal'));
        evaluationModal.show();
    }

    function submitForm(action) {
        if (action === 'email') {
            var emailInput = document.getElementById('email-input');
            var emailError = document.getElementById('email-error');

            if (emailInput.value.trim() === '') {
                emailError.classList.remove('d-none');
                return;
            } else {
                emailError.classList.add('d-none');
            }
        }
        
        var form = document.getElementById('mainForm');
        var hiddenInput = document.createElement('input');

        hiddenInput.type = 'hidden';
        hiddenInput.name = 'action';
        hiddenInput.value = action;

        form.appendChild(hiddenInput);
        form.submit();

    }


    function submitEvaluation() {
        var evaluationForm = document.getElementById('evaluationForm');
        var content = tinymce.get('content').getContent();
        var contentInput = document.createElement('input');
        contentInput.type = 'hidden';
        contentInput.name = 'content';
        contentInput.value = content;
        evaluationForm.appendChild(contentInput);
        evaluationForm.submit();
    }

    window.addEventListener('DOMContentLoaded', (event) => {
        @if(session('evaluation_success'))
        document.getElementById('downloadPDF').disabled = false;
        document.getElementById('sendEmail').disabled = false;
        @endif



    });

    document.getElementById('tutor').addEventListener('change', function() {
        const selectedTutorId = this.value;
        document.getElementById('evaluation-tutor').value = selectedTutorId;
    });

    document.getElementById('course').addEventListener('change', function() {
        const selectedCourseId = this.value;
        document.getElementById('evaluation-course').value = selectedCourseId;
    });
</script>

@endguest
@include('partials.footer')