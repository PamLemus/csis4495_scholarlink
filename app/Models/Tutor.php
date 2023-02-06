<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function getDegrees(){
        return ['Associate degree', 'Bachelor degree', 'Master degree', 'Doctoral degree'];
    }
}
