<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGrade extends Model
{
    use HasFactory;

    protected $table = 'user_grade';
    protected $primaryKey = null;
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'ug_user_id',
        'ug_tutor_id',
        'ug_course_id',
        'grade',
        'difficulty',
        'take_again',
    ];
    
}
