<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotesEmail;

use App\Models\Session;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Tutor;
use App\Models\User;
use App\Models\UserGrade;
use PDF;


class SessionController extends Controller
{
    private $textarea;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function evaluation(Request $request)
    {
        $userGrade = new UserGrade();
        $userGrade->ug_user_id = $request->input('user_id');
        $userGrade->ug_tutor_id = $request->input('tutor');
        $userGrade->ug_course_id = $request->input('course');
        $userGrade->grade = $request->input('grade');
        $userGrade->difficulty = $request->input('difficulty');
        $userGrade->take_again = $request->input('take_again');
        $userGrade->save();

        $this->textarea = $request->input('content');
        //dd($this->textarea);
        session()->flash('evaluation_success', 'Feedback submitted successfully.');

   
        return redirect()->back()->withInput()->with('textarea', $this->textarea);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $registeredCourses = Course::whereIn('course_id', function ($query) {
            $query->select('tc_course_id')
                ->from('tutor_courses');
        })->get();

        $allTutors = Tutor::all();
        $allUsers = User::all();
        $content = [
            'title' => "Scholar Link",
            'header' => "Enhace your learning process, take the notes of your sessions",
            'courses' => $registeredCourses,
            'notes' => "notes",
            'tutors' => [],
            'textarea' => session('textarea')

        ];

        //dd($content['textarea']);
        //dd($this->textarea);

        foreach ($allTutors as $tutor) {
            foreach ($allUsers as $user) {
                if ($tutor->tutor_user_id == $user->id) {
                    $tutorName = $user->name;
                    $tutorLastName = $user->last_name;
                    $tutor_id = $tutor->tutor_id;
                    $tutor_user_id = $tutor->tutor_user_id;
                    $content['tutors'][] = [
                        'id' => $tutor_id,
                        'name' => $tutorName,
                        'last_name' => $tutorLastName
                    ];
                }
            }
        }

        return view('content.lecture_content', compact('content'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $formData)
    {
        $session = new Session();
        $session->session_course_id = $formData->input('course');
        $session->session_tutor_id = $formData->input('tutor');
        $session->session_user_id = $formData->input('user_id');
        $content = strip_tags($formData->input('content'));
        $content = str_replace(['&nbsp;', '  '], ' ', $content);
        $content = str_replace([',', '  '], ' ', $content);
        $content = preg_replace('/[\r\n]+/', ' ', $content);
        $content = trim($content);
        $session->content = $content;
        $session->save();

        $course = Course::find($formData->input('course'));
        $results['course_name'] = $course->course_name;

        $tutor = Tutor::join('users', 'users.id', '=', 'tutors.tutor_user_id')
            ->whereIn('users.name', function ($query) use ($formData) {
                $query->select('name')
                    ->from('users')
                    ->where('id', $formData->input('tutor'));
            })
            ->select('users.name', 'users.last_name')
            ->first();

        $results['tutor_name'] = $tutor->name;
        $results['tutor_last_name'] = $tutor->last_name;
        $results['content'] = $content;

        if ($formData->input('action') == 'download') {


            $pdf = PDF::loadView('content.lecture_notes_pdf', ['results' => $results]);

            // Download the PDF file
            return $pdf->download('lecture_notes.pdf');
            //return redirect()->back()->with('success', 'Lecture notes save successfully.');

            
        }


        if ($formData->input('action') == 'email') {
            $pdf = PDF::loadView('content.lecture_notes_pdf', ['results' => $results]);
            $pdfData = $pdf->output();

            Mail::to($formData->input('email'))->send(new NotesEmail($pdfData));

            return redirect()->back()->with('success', 'Lecture notes sent successfully.');
        }

               // Redirect back to the form with a success message
        return redirect()->back()->withInput()->with(['success' => 'Lecture notes and evaluation saved successfully.']);
    }

   




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function show(Session $session)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function edit(Session $session)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Session $session)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function destroy(Session $session)
    {
        //
    }
}