<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $table ='exam';

    public function questions(){
        return $this->hasMany('App\Question');
    }
    public function users(){
        return $this->belongsToMany('App\User','user_exam');
    }
}
