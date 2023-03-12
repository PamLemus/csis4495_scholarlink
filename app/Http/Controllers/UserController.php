<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $viewData = array();
        $viewData['title'] = 'Users';
        $viewData['users'] = $users;
        
        
        return view('admin.users.index')->with('viewData', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viewData = array();
        $viewData['title'] = 'Create a new user';

        return view('admin.users.create')->with('viewData', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nu = new User();
        $nu->name = $request->input('name');
        $nu->last_name = $request->input('last_name');
        $nu->date_of_birth = $request->input('date_of_birth');
        $nu->occupation = $request->input('occupation');
        $nu->email = $request->input('email');
        $nu->password = bcrypt($request->input('password'));
        $nu->user_type = $request->input('user_type');

        $nu->save();

        return redirect()->route('admin.users.index');
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
    public function edit(User $user)
    {
        $viewData = array();
        $viewData['title'] = 'Edit Users';
        $viewData['user'] = $user;

        return view('admin.users.edit')->with('viewData', $viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'=>'required',
            'last_name'=>'required',
            'date_of_birth'=>'required',
            'occupation'=>'required',
            'email'=>'required',
            'user_type'=>'required'
        ]);
        $user->name = $request->input('name');
        $user->last_name = $request->input('last_name');
        $user->date_of_birth = $request->input('date_of_birth');
        $user->occupation = $request->input('occupation');
        $user->email = $request->input('email');
        $user->user_type = $request->input('user_type');

        $user->save();

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return back();
    }
}
