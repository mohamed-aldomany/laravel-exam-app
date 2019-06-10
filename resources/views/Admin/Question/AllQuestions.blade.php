@extends('layouts.app')

@section('content')

<button data-toggle="modal" data-target="#AddQuestion" class="btn btn-outline-success mb-3" style="margin-right:10px;float:right">Add New Question</button>
<table class="table table-striped mt-5">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">qno</th>
            <th scope="col">name</th>
            <th scope="col">choise1</th>
            <th scope="col">choise2</th>
            <th scope="col">choise3</th>
            <th scope="col">correct answer</th>
            <th scope="col">Manage</th>
         </tr>
    </thead>
    <tbody>
      <?php $x=0; ?>
      @foreach ($questions as $question)
        <tr>
            <th scope="row">
              <?php $x=$x+1;
                echo $x;
              ?>
            </th>
            <td>{{$question->question_no}}</td>
            <td>{{$question->question}}</td>
            <td>{{$question->choise1}}</td>
            <td>{{$question->choise2}}</td>
            <td>{{$question->choise3}}</td>
            <td>{{$question->answer}}</td>
            <td>
                <form method="POST" action="/admin/delete_question/{{$question->id}}/exam/{{$eid}}">
                    {{ csrf_field() }}
                    <a class="btn btn-outline-primary" href="/admin/edit_question/{{$question->id}}/exam/{{$eid}}">Edit</a>
                    <button class="btn btn-outline-danger">Delete</button>
                </form>    
            </td>
        </tr>
    @endforeach  
    </tbody>
</table>
    
<!-- Modal -->
<div class="modal fade" id="AddQuestion" tabindex="-1" role="dialog" aria-labelledby="questionpleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="questionpleModalLabel">Add New Question</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="POST" action="/admin/add_question">
            <div class="modal-body">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>question no</label>
                    <input name="question_no" type="number" class="form-control" placeholder="Enter question number" required>
                </div>
                <div class="form-group">
                    <label>question</label>
                    <input name="question" type="text" class="form-control" placeholder="Enter question name" required>
                </div>
                <div class="form-group">
                    <label>choise1</label>
                    <input name="choise1" type="text" class="form-control" placeholder="Enter choise1" required>
                </div>
                <div class="form-group">
                    <label>choise2</label>
                    <input name="choise2" type="text" class="form-control" placeholder="Enter choise2" required>
                </div>
                <div class="form-group">
                    <label>choise3</label>
                    <input name="choise3" type="text" class="form-control" placeholder="Enter choise3" required>
                </div>
                <div class="form-group">
                    <label>answer</label>
                    <input name="answer" type="text" class="form-control" placeholder="Enter correct answer" required>
                    <small class="form-text text-muted">correct answer must be on of the three choises</small>
                </div>
                <input type="hidden" name="exam_id" value="{{$eid}}">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection