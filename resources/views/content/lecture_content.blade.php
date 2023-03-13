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






<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">
                    <h6>{{ __('My lecture notes') }}</h6>
                </div>
                <div class="card-body">


               
                
                    <form method="POST" action="{{ route('content.lecture.store', ['content' =>$content['notes']] )}}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="course" class="text-primary col-form-label text-md-start">Course: </label>
                            <select name="course" id="course" class="form-select border-2 w-200 py-3 ps-4 pe-5">
                                <option selected>Select a course</option>
                                @foreach($content['courses'] as $course)
                                <option value="{{$course->course_id}}">{{$course->course_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row mb-3">
                            <label for="tutor" class="text-primary col-form-label text-md-start">Tutor: </label>
                            <select name="tutor" class="form-select border-2 w-200 py-3 ps-4 pe-5">
                                <option selected>Select your tutor</option>
                                @foreach($content['tutors'] as $tutor)
                                  <option value="{{$tutor['id']}}">{{$tutor['name']}}</option>
                   
                                @endforeach
                            </select>
                        </div>

                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                        <div class="row mb-3">
                            <label for="content" class="text-primary col-form-label text-md-start">Lecture content: </label>
                            <textarea id="content" name="content"></textarea>
                            <input type="hidden" name="content_plain" id="content_plain">
                        </div>



                        <div class="position-relative mx-auto" style="max-width: 100px;">
                            <button type="button" class="btn btn-primary position-absolute" data-bs-toggle="modal" data-bs-target="#downloadModal">Download/Send</button><br><br>
                        </div>

                         <!-- Download/Send Modal -->
                         <div class="modal fade" id="downloadModal" tabindex="-1" aria-labelledby="downloadModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="downloadModalLabel">Download/Send Notes</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Select how you want to receive your notes:</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" name="action" value="download" class="btn btn-primary">Download PDF</button>
                                        <button type="submit" name="action" value="email" class="btn btn-primary">Send Email</button>
                                    </div>
                                </div>
                            </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>



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
        var content = tinymce.get('content').getContent({format: 'text'});
        $('#content_plain').val(content);
    });
</script>

@endguest
@include('partials.footer')