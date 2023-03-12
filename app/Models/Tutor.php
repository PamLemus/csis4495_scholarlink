<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class Tutor extends Model
{
    //use HasFactory;
    protected $primaryKey='tutor_id';
    protected $table='tutors';

    public function user(){
        return $this->belongsTo('App\Models\User' , 'tutor_user_id');
    }

    public function getDegrees(){
        return ['Associate degree', 'Bachelor degree', 'Master degree', 'Doctoral degree'];
    }

    public function courses(){
        return $this->belongsToMany(Course::class , 'tutor_courses' , 'tc_tutor_id' , 'tc_course_id')
        ->withPivot(['p_course_school','p_course_teacher']);
    }

   
}
