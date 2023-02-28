<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Tutor;
use Illuminate\Http\Request;


class TutorCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Tutor $tutor)
    {
        
        $viewData = array();
        $viewData['title'] = 'My Profile';
        $viewData['tutor'] = $tutor;    
        //dd($tutor->course_name);

        return view('tutor_courses.index')->with('viewData', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Tutor $tutor)
    {
        $courses = Course::all();   
        $viewData = array();
        $viewData['title'] = 'My Profile';
        $viewData['tutor'] = $tutor;
        $viewData['courses'] = $courses;

        return view('tutor_courses.create')->with('viewData', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Tutor $tutor)
    {
        
        $course = Course::find($request->input('course'));
        $p_school = $request->input('course_school');
        $p_teacher = $request->input('course_teacher');
        $tutor->courses()->attach($course, [
            'p_course_school'=> $p_school,
            'p_course_teacher' => $p_teacher,
        ]);
        
        //$ntc->tutor_courses = $request->input('tutor_courses');
        

        return redirect()->route('tutor.course.index', $tutor)->with('success', 'Course enrolled sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($tutor_id, $course_id)
    {
        $tutor = Tutor::findOrFail($tutor_id);
        $course = Course::findOrFail($course_id);

        $tutor->courses()->detach($course_id);

        return back();
        
    }
}
