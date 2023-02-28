<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Tutor;

class Course extends Model
{
    //use HasFactory;
    protected $primaryKey='course_id';
    protected $table='courses';

    public function tutors(){
        return $this->belongsToMany(Tutor::class , 'tutor_courses' , 'tc_course_id' , 'tc_tutor_id');
    }
}
