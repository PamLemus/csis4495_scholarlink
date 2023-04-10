<?php

namespace App\Http\Controllers;

use App\Models\Tutor;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class AdminTutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tutors = Tutor::with('user')->get();
        $viewData = array();
        $viewData['title'] = 'Tutors';
        $viewData['tutors'] = $tutors;


        return view('admin.tutors.index')->with('viewData', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = User::findOrFail($request->id);

        $tutor = new Tutor();
        $viewData[] = array();
        $viewData['title'] = 'Become a Tutor';
        $viewData["user"] = $user;
        $viewData["degrees"] = $tutor->getDegrees();

        return view('admin.tutors.create')->with('viewData', $viewData);
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
        $nt->tutor_user_id = $request->input('tutor_user_id');
        $nt->school = $request->input('school');
        $nt->degree = $request->input('degree');
        $nt->major = $request->input('major');
        $nt->description = $request->input('description');
        $nt->tutor_img = $request->tutor_img->store('tutor_img', 'public');

        $nt->save();

        return redirect()->route('admin.tutors.index');
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
    public function edit(Tutor $tutor)
    {
        $viewData = array();
        $viewData['title'] = 'Edit Tutors';
        $viewData['tutor'] = $tutor;

        return view('admin.tutors.edit')->with('viewData', $viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tutor $tutor)
    {
        $request->validate([
            'school' => 'required',
            'degree' => 'required',
            'major' => 'required',
            'description' => 'required'
        ]);
        $tutor->school = $request->input('school');
        $tutor->degree = $request->input('degree');
        $tutor->major = $request->input('major');
        $tutor->description = $request->input('description');

        $tutor->save();

        return redirect()->route('admin.tutors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tutor $tutor)
    {
        $tutor->delete();

        return back();
    }
}
