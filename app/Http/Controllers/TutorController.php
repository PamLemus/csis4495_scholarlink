<?php

namespace App\Http\Controllers;

use App\Models\Tutor;
use App\Models\User;
use App\Models\UserGrade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class TutorController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $tutor = Tutor::where('tutor_user_id', $user->id)->first();

        $viewData = array();
        $viewData['title'] = 'My Profile';
        $viewData['tutors'] = Tutor::all();
        $viewData['user'] = $user;
        $viewData['route_name'] = Route::currentRouteName();

        if ($tutor) {
            $viewData['tutor_img'] = $tutor->tutor_img;
        } else {
            $viewData['tutor_img'] = ''; // Set an empty string or a default image path if no tutor record is found
        }

        return view('tutor.tutor')->with('viewData', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $tutor = new Tutor();
        $viewData[] = array();
        $viewData['title'] = 'Become a Tutor';
        $viewData["titleMenu"] = 'Welcome ' . $user->name;
        $viewData["user"] = $user;
        $viewData["degrees"] = $tutor->getDegrees();

        return view('tutor.create', compact('viewData'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $nt = new Tutor;
        $nt->tutor_user_id = Auth::id();
        $nt->school = $request->input('school');
        $nt->degree = $request->input('degree');
        $nt->major = $request->input('major');
        $nt->description = $request->input('description');
        $nt->tutor_img = $request->tutor_img->store('tutor_img', 'public');

        $nt->save();

        return redirect()->route('tutor');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function show($tutor_id)
    {
        $selectedTutor = Tutor::with('user')->findOrFail($tutor_id);

        $meanGrades = UserGrade::where('ug_tutor_id', $tutor_id)
            ->avg('grade');

        $meanDifficulty = UserGrade::where('ug_tutor_id', $tutor_id)
            ->avg('difficulty');


        $totalGrades = UserGrade::where('ug_tutor_id', $tutor_id)->count();
        $take_again = UserGrade::where('ug_tutor_id', $tutor_id)->where('take_again', 1)->count();



        if ($totalGrades > 0) {
            $take_again_percent = round(($take_again / $totalGrades) * 100, 2);
        } else {
            $take_again_percent = 0;
        }


        $viewData = [
            'title' => $selectedTutor->user->name . "'s Profile",
            'user' => $selectedTutor->user,
            'tutor_img' => $selectedTutor->tutor_img,
            'route_name' => Route::currentRouteName(),
            'mean_grades' => round($meanGrades, 2),
            'mean_difficulty' => round($meanDifficulty, 2),
            'take_again' => $take_again_percent,
        ];

        return view('tutor.tutor', compact('viewData'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function edit(Tutor $tutor)
    {
        $viewData[] = array();

        $viewData["title"]  = 'Edit Tutor Profile';

        return view('tutor.edit', compact('viewData', 'tutor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tutor $tutor)
    {
        $tutor->school = $request->input('school');
        $tutor->major = $request->input('major');
        $tutor->description = $request->input('description');

        $tutor->save();
        return redirect()->route('tutor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tutor::destroy($id);
        return redirect()->route('tutor.index');
    }



    public function listTutors()
    {
        $tutors = array();
        $tutors['title'] = "Scholar Link";
        $tutors['header'] = "Find the perfect tutor for you";
        $tutors_list = DB::table('tutors')
            ->join('users as us', 'us.id', '=', 'tutors.tutor_user_id')
            ->select(
                'us.name',
                'us.last_name',
                'us.occupation',
                'tutors.school',
                'tutors.degree',
                'tutors.major',
                'tutors.description',
                'tutors.tutor_img'
            )
            ->where('us.id', '!=', Auth::id())->get();

        $tutors['tutors'] = $tutors_list;

        $timeD = 0.5;
        $tutors['delay'] = $timeD;

        return view('find.find_tutors')
            ->with('tutors', $tutors);
    }

    public function resultTutors(Request $request)
    {

        $tutors = array();
        $tutors['title'] = "Scholar Link";
        $tutors['header'] = "Find the perfect tutor for you";

        $tutors_results = DB::table('tutors as t')
            ->join('users as u', 'u.id', '=', 't.tutor_user_id')
            ->join('tutor_courses as tc', 'tc.tc_tutor_id', '=', 't.tutor_id')
            ->join('courses as c', 'c.course_id', '=', 'tc.tc_course_id')
            ->select('t.tutor_id', 't.school', 't.degree', 't.major', 't.description', 't.tutor_img', 'u.name', 'u.last_name', 'u.occupation', 'c.course_name', 'tc.tc_course_id', 'tc.tc_tutor_id', 'tc.p_course_school', 'tc.p_course_teacher')
            ->where(function ($query) use ($request) {
                $query->Where('u.last_name', 'like', '%' . $request->input('tutor_filter') . '%')
                    ->orwhere('u.name', 'like', '%' . $request->input('tutor_filter') . '%')
                    ->orWhere('u.occupation', 'like', '%' . $request->input('tutor_filter') . '%')
                    ->orWhere('t.school', 'like', '%' . $request->input('tutor_filter') . '%')
                    ->orWhere('t.degree', 'like', '%' . $request->input('tutor_filter') . '%')
                    ->orWhere('t.major', 'like', '%' . $request->input('tutor_filter') . '%')
                    ->orWhere('t.description', 'like', '%' . $request->input('tutor_filter') . '%')
                    ->orWhere('c.course_name', 'like', '%' . $request->input('tutor_filter') . '%')
                    ->orWhere('tc.p_course_school', 'like', '%' . $request->input('tutor_filter') . '%')
                    ->orWhere('tc.p_course_teacher', 'like', '%' . $request->input('tutor_filter') . '%');
            })
            ->where('tc.tc_course_id', function ($subquery) {
                $subquery->selectRaw('max(tc2.tc_course_id)')
                    ->from('tutor_courses as tc2')
                    ->whereRaw('tc2.tc_tutor_id = t.tutor_id');
            })
            ->groupBy('t.tutor_id', 't.school', 't.degree', 't.major', 't.description', 't.tutor_img', 'u.name', 'u.last_name', 'u.occupation', 'c.course_name', 'tc.tc_course_id', 'tc.tc_tutor_id', 'tc.p_course_school', 'tc.p_course_teacher')
            ->orderBy('u.name')
            ->get();

        $tutors['results'] = $tutors_results;

        foreach ($tutors_results as $tutor) {
            $tutor_courses = DB::table('tutor_courses')
                ->join('courses', 'tutor_courses.tc_course_id', '=', 'courses.course_id')
                ->where('tutor_courses.tc_tutor_id', '=', $tutor->tutor_id)
                ->select('courses.course_name', 'tutor_courses.p_course_school', 'tutor_courses.p_course_teacher')
                ->get();

            $tutor->courses = $tutor_courses->pluck('course_name')->toArray();
            $tutor->p_course_school = $tutor_courses->pluck('p_course_school')->toArray();
            $tutor->p_course_teacher = $tutor_courses->pluck('p_course_teacher')->toArray();
        }


        $tutors['results'] = $tutors_results;


        $timeD = 0.5;
        $tutors['delay'] = $timeD;


        $tutorIds = DB::table('tutors')
            ->leftJoin('tutor_courses', 'tutors.tutor_id', '=', 'tutor_courses.tc_tutor_id')
            ->join('users as us', 'us.id', '=', 'tutors.tutor_user_id')
            ->whereNull('tutor_courses.tc_tutor_id')
            ->pluck('us.id');

        $tutors['wo_courses'] = $tutorIds;
        $tutors['tutors_without_courses'] = [];


        foreach ($tutorIds as $tutorid) {
            $miss_tutorids = DB::table('tutors')
                ->join('users as u', 'u.id', '=', 'tutors.tutor_user_id')
                ->select(
                    'tutors.tutor_id',
                    'u.name',
                    'u.last_name',
                    'u.occupation',
                    'tutors.major',
                    'tutors.degree',
                    'tutors.school',
                    'tutors.description',
                    'tutors.tutor_img'
                )
                ->where('tutors.tutor_user_id', '=', $tutorid)
                ->where(function ($query) use ($request) {
                    $query->Where('u.last_name', 'like', '%' . $request->input('tutor_filter') . '%')
                        ->orwhere('u.name', 'like', '%' . $request->input('tutor_filter') . '%')
                        ->orWhere('u.occupation', 'like', '%' . $request->input('tutor_filter') . '%')
                        ->orWhere('tutors.school', 'like', '%' . $request->input('tutor_filter') . '%')
                        ->orWhere('tutors.degree', 'like', '%' . $request->input('tutor_filter') . '%')
                        ->orWhere('tutors.major', 'like', '%' . $request->input('tutor_filter') . '%')
                        ->orWhere('tutors.description', 'like', '%' . $request->input('tutor_filter') . '%');
                })
                ->get();

            if ($miss_tutorids->count() > 0) {
                $tutors['tutors_without_courses'][] = $miss_tutorids->first();
            }
        }

        //dd($tutors['tutors_without_courses']);



        return view('find.find_tutors_results')
            ->with('tutors', $tutors);
    }



    public function filtersTutors(Request $request)
    {

        $tutors = array();
        $tutors['title'] = "Scholar Link";
        $tutors['header'] = "Find the perfect tutor for you";

        $tutors_results = DB::table('tutors as t')
            ->join('users as u', 'u.id', '=', 't.tutor_user_id')
            ->join('tutor_courses as tc', 'tc.tc_tutor_id', '=', 't.tutor_id')
            ->join('courses as c', 'c.course_id', '=', 'tc.tc_course_id')
            ->select('t.tutor_id', 't.school', 't.degree', 't.major', 't.description', 't.tutor_img', 'u.name', 'u.last_name', 'u.occupation', 'c.course_name', 'tc.tc_course_id', 'tc.tc_tutor_id', 'tc.p_course_school', 'tc.p_course_teacher')
            ->where(function ($query) use ($request) {
                $query->Where('u.last_name', '=', $request->input('last_name'))
                    ->orwhere('u.name', '=', $request->input('name'))
                    ->orWhere('u.occupation', '=', $request->input('occupation'))
                    ->orWhere('t.school', '=', $request->input('school'))
                    ->orWhere('t.degree', '=', $request->input('degree'))
                    ->orWhere('t.major', '=', $request->input('major'))
                    ->orWhere('t.description', '=', $request->input('description'))
                    ->orWhere('c.course_name', '=', $request->input('course_name'))
                    ->orWhere('tc.p_course_school', '=', $request->input('p_course_school'))
                    ->orWhere('tc.p_course_teacher', '=', $request->input('p_course_teacher'));
            })
            ->where('tc.tc_course_id', function ($subquery) {
                $subquery->selectRaw('max(tc2.tc_course_id)')
                    ->from('tutor_courses as tc2')
                    ->whereRaw('tc2.tc_tutor_id = t.tutor_id');
            })
            ->groupBy('t.tutor_id', 't.school', 't.degree', 't.major', 't.description', 't.tutor_img', 'u.name', 'u.last_name', 'u.occupation', 'c.course_name', 'tc.tc_course_id', 'tc.tc_tutor_id', 'tc.p_course_school', 'tc.p_course_teacher')
            ->orderBy('u.name')
            ->get();

        $tutors['results'] = $tutors_results;

        foreach ($tutors_results as $tutor) {
            $tutor_courses = DB::table('tutor_courses')
                ->join('courses', 'tutor_courses.tc_course_id', '=', 'courses.course_id')
                ->where('tutor_courses.tc_tutor_id', '=', $tutor->tutor_id)
                ->select('courses.course_name', 'tutor_courses.p_course_school', 'tutor_courses.p_course_teacher')
                ->get();

            $tutor->courses = $tutor_courses->pluck('course_name')->toArray();
            $tutor->p_course_school = $tutor_courses->pluck('p_course_school')->toArray();
            $tutor->p_course_teacher = $tutor_courses->pluck('p_course_teacher')->toArray();
        }


        $tutors['results'] = $tutors_results;


        $timeD = 0.5;
        $tutors['delay'] = $timeD;


        $tutorIds = DB::table('tutors')
            ->leftJoin('tutor_courses', 'tutors.tutor_id', '=', 'tutor_courses.tc_tutor_id')
            ->join('users as us', 'us.id', '=', 'tutors.tutor_user_id')
            ->whereNull('tutor_courses.tc_tutor_id')
            ->pluck('us.id');

        $tutors['wo_courses'] = $tutorIds;
        $tutors['tutors_without_courses'] = [];


        foreach ($tutorIds as $tutorid) {
            $miss_tutorids = DB::table('tutors')
                ->join('users as u', 'u.id', '=', 'tutors.tutor_user_id')
                ->select(
                    'u.name',
                    'u.last_name',
                    'u.occupation',
                    'tutors.major',
                    'tutors.degree',
                    'tutors.school',
                    'tutors.description',
                    'tutors.tutor_img',
                    'tutors.tutor_id'
                )
                ->where('tutors.tutor_user_id', '=', $tutorid)
                ->where(function ($query) use ($request) {
                    $query->Where('u.last_name', '=', $request->input('last_name'))
                        ->orwhere('u.name', '=', $request->input('name'))
                        ->orWhere('u.occupation', '=', $request->input('occupation'))
                        ->orWhere('tutors.school', '=', $request->input('school'))
                        ->orWhere('tutors.degree', '=', $request->input('degree'))
                        ->orWhere('tutors.major', '=', $request->input('major'))
                        ->orWhere('tutors.description', '=', $request->input('description'));
                })
                ->get();

            if ($miss_tutorids->count() > 0) {
                $tutors['tutors_without_courses'][] = $miss_tutorids->first();
            }
        }

        //dd($tutors['tutors_without_courses']);



        return view('find.find_tutors_results')
            ->with('tutors', $tutors);
    }
}
