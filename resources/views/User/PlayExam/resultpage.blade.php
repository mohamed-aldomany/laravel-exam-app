@extends('layouts.app')
@section('content')

<?php

$uans = array(); // check
$questionID = array();
$quest = array();
$choise1 = array();
$choise2 = array();
$choise3 = array();
$answer = array();

foreach ($check as $checkans){
    array_push($uans,$checkans);
}

foreach ($question as $q){
    array_push($questionID,$q->id);
    array_push($quest,$q->question);
    array_push($choise1,$q->choise1);
    array_push($choise2,$q->choise2);
    array_push($choise3,$q->choise3);
    array_push($answer,$q->answer);

    $exam_name = $q->exams->name;
    $exam_passing = $q->exams->passing;
    $exam_result = $q->exams->result;
}

$quest_count = count($uans);

$question_mark = $exam_result/$quest_count;

$score = 0;
for( $x=0 ; $x<$quest_count ; $x++ ){
    if($uans[$x] == $answer[$x]){
        $score = $score+$question_mark;
    }
}

$percentage = ($score*100)/$exam_result;

?>

<div class="card text-center mt-4 mb-4 mr-4 ml-4">
    <div class="card-header">
        {{$exam_name}} Exam Result
    </div>
    <div class="card-body">
        <h5 class="card-title">{{$exam_name}} Exam Score : {{$score}}</h5>
        <p class="card-text">
            Percentage : {{$percentage}}% <br>
            Total Result : {{$exam_result}}<br>
            Exam Passing : {{$exam_passing}}%<br>
            <?php
                if($percentage < 50){
                   echo '<h3><span class="badge badge-danger"> you need to re-exam this model </span><h3>'; 
                }
            ?>
        </p>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
            review your answers
        </button>
        
    </div>
    <div class="card-footer text-muted">
      2 days ago
    </div>
</div>

    
<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 1162px;position: relative;right: 333px;">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <?php
                for($x=0 ; $x<$quest_count ; $x++){?>
                    <p>{{$questionID[$x]}}. {{$quest[$x]}} ?</p>
                    <?php if($uans[$x]==$answer[$x]){ ?>
                        <h5><span class="badge badge-success">{{$uans[$x]}} correct answer</span></h5><hr>
                <?php
                    }else {?>
                        <h5><span class="badge badge-danger">{{$uans[$x]}} wrong answer</span></h5>
                        <h5><span class="badge badge-success">{{$answer[$x]}} correct answer</span></h5><hr>
                <?php
                    }
                }    
            ?>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>

@endsection



