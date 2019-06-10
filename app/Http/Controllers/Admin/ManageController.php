<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Exam;
use App\Question;
class ManageController extends Controller
{
    public function AllUsers()
    {
        $users = User::all();
        return view('Admin.User.AllUsers')->with('users',$users);
    }

    public function Edituser($uid)
    {
        $user = User::findOrFail($uid);
        return view('Admin.User.EditUser')->with('user',$user);
    }

    public function Updateuser(Request $request)
    {
        $user = user::findOrFail($request->user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->group_id = $request->group_id;
        $user->save();
        return view('Admin.User.EditUser')->with('user',$user);
    }

    public function Delusers($uid)
    {
        $user = User::findOrFail($uid);
        $user->delete();
        return redirect('/admin/manage_users');
    }

    // ///////////////////////////////////////////////////////////////////////////////


    public function AllExams()
    {
        $exams = Exam::all();
        return view('Admin.Exam.AllExams')->with('exams',$exams);
    }

    public function AddExams(Request $request)
    {
        $exam = new Exam();
        $exam->name = $request->name;
        $exam->result = $request->result;
        $exam->passing = $request->passing;
        $exam->save();
        return redirect('/admin/manage_exams');
    }

    public function EditExam($eid)
    {
        $exam = Exam::findOrFail($eid);
        return view('Admin.Exam.EditExam')->with('exam',$exam);
    }

    public function UpdateExam(Request $request)
    {
        $exam = Exam::findOrFail($request->exam_id);
        $exam->name = $request->name;
        $exam->result = $request->result;
        $exam->passing = $request->passing;
        $exam->save();
        return view('Admin.Exam.EditExam')->with('exam',$exam);
    }

    public function DelExams($eid)
    {
        $exam = Exam::findOrFail($eid);
        $exam->delete();
        return redirect('/admin/manage_exams');
    }

    // ///////////////////////////////////////////////////////////////////////////////


    public function SelQuestExam()
    {
        $exams = Exam::all();
        return view('Admin.Question.Exams')->with('exams',$exams);
    }

    public function AllQuestions($eid)
    {
        $questions = Question::where('exam_id','=',$eid)->get();
        return view('Admin.Question.AllQuestions')->with('questions',$questions)->with('eid',$eid);
    }

    public function AddQuestions(Request $request)
    {
        $question = new Question();
        $question->question_no = $request->question_no;
        $question->question = $request->question;
        $question->choise1 = $request->choise1;
        $question->choise2 = $request->choise2;
        $question->choise3 = $request->choise3;
        $question->answer = $request->answer;
        $question->exam_id = $request->exam_id;
        $question->save();
        return redirect('admin/manage_questions/'.$request->exam_id);
    }

    public function EditQuestion($qid,$eid)
    {
        $question = question::findOrFail($qid);
        return view('Admin.question.EditQuestion')->with('question',$question)->with('eid',$eid);
    }

    public function UpdateQuestion(Request $request)
    {
        $question = Question::findOrFail($request->question_id);
        $question->question_no = $request->question_no;
        $question->question = $request->question;
        $question->choise1 = $request->choise1;
        $question->choise2 = $request->choise2;
        $question->choise3 = $request->choise3;
        $question->answer = $request->answer;
        $question->exam_id = $request->exam_id;
        $question->save();
        return redirect('/admin/edit_question/'.$request->question_id.'/exam/'.$request->exam_id);
    }

    public function DelQuestion($qid,$eid)
    {
        $question = Question::findOrFail($qid);
        $question->delete();
        return redirect('admin/manage_questions/'.$eid);
    }

    
}
