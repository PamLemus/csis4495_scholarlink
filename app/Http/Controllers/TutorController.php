<?php

namespace App\Http\Controllers;

use App\Models\Tutor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


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
        $viewData = array();
        $viewData['title'] = 'My Profile';
        $viewData['tutors'] = Tutor::all();
        $viewData['user'] = $user;

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
    public function show(Tutor $tutor)
    {
        //
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

        return view('find_tutors')
            ->with('tutors', $tutors);
    }

    public function resultTutors(Request $request)
    {

        $tutors = array();
        $tutors['title'] = "Scholar Link";
        $tutors['header'] = "Find the perfect tutor for you";
        $tutors_results = DB::table('tutors')
            ->join('users as us', 'us.id', '=', 'tutors.tutor_user_id')
            ->where(function($query) use ($request) {
            $query->where('us.name', 'like', '%' . $request->input('tutor_filter') . '%')
            ->orWhere('us.last_name', 'like', '%' . $request->input('tutor_filter') . '%')
            ->orWhere('us.occupation', 'like', '%' . $request->input('tutor_filter') . '%')
            ->orWhere('tutors.school', 'like', '%' . $request->input('tutor_filter') . '%')
            ->orWhere('tutors.degree', 'like', '%' . $request->input('tutor_filter') . '%')
            ->orWhere('tutors.major', 'like', '%' . $request->input('tutor_filter') . '%')
            ->orWhere('tutors.description', 'like', '%' . $request->input('tutor_filter') . '%');
            });


        $tutors['results'] = $tutors_results->get();
        $timeD = 0.5;
        $tutors['delay'] = $timeD;
        return view('find_tutors_results')
            ->with('tutors', $tutors);
    }
}
