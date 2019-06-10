<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table ='question';
    
    public function exams(){
        return $this->belongsTo('App\Exam','exam_id','id');
    }
}
