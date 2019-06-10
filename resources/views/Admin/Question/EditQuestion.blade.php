@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-6 mt-5 userForm">
        <form method="POST" action="/admin/update_question">
            {{ csrf_field() }}
            <h1 class="text-center">Edit {{$question->name}} question</h1>
            <input type="hidden" name="question_id" value="{{$question->id}}">
            <div class="form-group">
                <label>question no</label>
                <input name="question_no" value="{{$question->question_no}}" type="number" class="form-control" placeholder="Enter question number" required>
            </div>
            <div class="form-group">
                <label>question</label>
                <input name="question" value="{{$question->question}}" type="text" class="form-control" placeholder="Enter question name" required>
            </div>
            <div class="form-group">
                <label>choise1</label>
                <input name="choise1" value="{{$question->choise1}}" type="text" class="form-control" placeholder="Enter choise1" required>
            </div>
            <div class="form-group">
                <label>choise2</label>
                <input name="choise2" value="{{$question->choise2}}" type="text" class="form-control" placeholder="Enter choise2" required>
            </div>
            <div class="form-group">
                <label>choise3</label>
                <input name="choise3" value="{{$question->choise3}}" type="text" class="form-control" placeholder="Enter choise3" required>
            </div>
            <div class="form-group">
                <label>answer</label>
                <input name="answer" value="{{$question->answer}}" type="text" class="form-control" placeholder="Enter correct answer" required>
                <small class="form-text text-muted">correct answer must be on of the three choises</small>
            </div>
            <input type="hidden" name="exam_id" value="{{$eid}}">
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
