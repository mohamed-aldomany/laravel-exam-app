@extends('layouts.app')

@section('content')

<button data-toggle="modal" data-target="#AddExam" class="btn btn-outline-success mb-3" style="margin-right:10px;float:right">Add New Exam</button>
<table class="table table-striped mt-5">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Exam Name</th>
            <th scope="col">Result</th>
            <th scope="col">Passing</th>
            <th scope="col">Manage</th>
         </tr>
    </thead>
    <tbody>
      <?php $x=0; ?>
      @foreach ($exams as $exam)
        <tr>
            <th scope="row">
              <?php $x=$x+1;
                echo $x;
              ?>
            </th>
            <td>{{$exam->name}}</td>
            <td>{{$exam->result}}</td>
            <td>{{$exam->passing}}</td>
            <td>
                <form method="POST" action="/admin/delete_exam/{{$exam->id}}">
                    {{ csrf_field() }}
                    <a class="btn btn-outline-primary" href="/admin/edit_exam/{{$exam->id}}">Edit</a>
                    <button class="btn btn-outline-danger">Delete</button>
                </form>    
            </td>
        </tr>
    @endforeach  
    </tbody>
</table>
    
<!-- Modal -->
<div class="modal fade" id="AddExam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add New Exam</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="POST" action="/admin/add_exam">
            <div class="modal-body">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Exam Name</label>
                    <input name="name" type="text" class="form-control" placeholder="Enter name" required>
                </div>
                <div class="form-group">
                    <label>Exam Reult</label>
                    <input name="result" type="number" class="form-control" placeholder="Enter result" required>
                </div>
                <div class="form-group">
                    <label>Exam Passing</label>
                    <input name="passing" type="number" class="form-control" placeholder="Enter passing" required>
                </div>
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



