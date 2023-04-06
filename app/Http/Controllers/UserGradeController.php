<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserGrade;

class UserGradeController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'ug_user_id' => 'required',
            'ug_tutor_id' => 'required',
            'ug_course_id' => 'required',
            'grade' => 'required|integer|min:1|max:5',
            'difficulty' => 'required|integer|min:1|max:5',
            'take_again' => 'required|boolean',
        ]);

        UserGrade::create($data);

        return response()->json(['status' => 'success']);
    }
}
