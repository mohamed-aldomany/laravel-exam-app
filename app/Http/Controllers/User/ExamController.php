<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;

use App\User;
use App\Exam;
use App\Question;

class ExamController extends Controller
{
    //exam manage part **********************************************************************
    public function exams()
    {
        $exams = Exam::all();
        return view('User.PlayExam.exams')->with('exams',$exams);
    }
    public function showexam($id)
    {
        $questions = Question::where('exam_id','=',$id)->get();
        return view('User.PlayExam.showquestion')->with('examid',$id)->withQuestions($questions);
    }

    public function showresult(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);

        $exam_id = $request->examid;
        $exam = Exam::findOrFail($exam_id);

        $question = Question::where('exam_id','=',$exam_id)->get();
        $count = count($question)+1;
        
        //user answers
        $check = array();
        for($i=1;$i<$count;$i++){
            $check['quest'.$i] =  $request->input('question'.$i);
        }
            
        // //uans
        $uans = array();
        foreach($check as $ans){
            array_push($uans,$ans);
        }
        
        //correct answers
        $answers = array();
        foreach($question as $q){
            array_push($answers,$q->answer);
            $exam_result = $q->exams->result;
        }

        $quest_count = count($answers);
        $question_mark = $exam_result/$quest_count;
        
        $score = 0;
        for( $x=0 ; $x<$quest_count ; $x++ ){
            if($answers[$x] == $uans[$x]){
                $score = $score+$question_mark;
            }
        }
    
        $user->exams()->attach($exam_id, ['score'=>$score]);    
        return view('User.PlayExam.resultpage')->withCheck($check)->withQuestion($question);
    }

    public function MyExams()
    {
        $userid = Auth::user()->id;
        $user_exams = DB::table('users')
            ->join('user_exam', 'users.id', '=', 'user_exam.user_id')
            ->join('exam', 'exam.id', '=', 'user_exam.exam_id')
            ->where('users.id',$userid)
            ->select('exam.*','user_exam.score','user_exam.id as exam_id')
            ->get();
        return view('User.MyExams.UserExams')->with('user_exams',$user_exams);
    }

    public function DelUserExams(Request $request)
    {
        $exam_id = $request->exam_id;
        $userid = Auth::user()->id;
        $user = User::findOrFail($userid);
        $del_userexams = DB::table('user_exam')
            ->join('users', 'users.id', '=', 'user_exam.user_id')
            ->join('exam', 'exam.id', '=', 'user_exam.exam_id')
            ->where('users.id',$userid)
            ->where('user_exam.id',$exam_id)
            ->delete();
        //$user->exams()->detach($exam_id);
        return redirect('/stud/my_exams');
    }

    public function Profile()
    {
        $userid = Auth::user()->id;
        $user =  User::findOrFail($userid);
        return view('User.Profile.UserProfile')->with('user',$user);
    }

    public function UpdateProfile(Request $request)
    {

        $userid = Auth::user()->id;
        $user = User::findOrFail($userid);
        $user->update($request->all());
        return redirect('/stud/profile');
    }


}