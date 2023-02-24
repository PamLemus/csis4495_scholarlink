# notes

`php artisan storage:link`


# Template
npm i bootstrap@5.3.0-alpha1


# line 20 Tutor.php
    public function courses(){
            return $this->belongsToMany('App\Course');
        } return all tutor's courses

# in Course Model I made this function to the relationship

    public function tutors(){
            return $this->belongsToMany('App\Tutor' , 'tutor_courses' , 'tc_course_id' , 'tc_tutor_id' );
        }



protected $primaryKey='tutor_id'; because we put tutor_id as a name

{{$key+1}}

- Change:
syncWithoutDetaching 
line 54 TutorCourseController