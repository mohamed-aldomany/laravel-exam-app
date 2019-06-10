@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-6 mt-5 userForm">
        <form method="POST" action="/admin/update_exam">
            {{ csrf_field() }}
            <h1 class="text-center">Edit {{$exam->name}} Exam</h1>
            <input type="hidden" name="exam_id" value="{{$exam->id}}">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter name" value="{{$exam->name}}" name="name" required>
            </div>
            <div class="form-group">
                <label>Result</label>
                <input type="number" class="form-control" placeholder="Enter Result" value="{{$exam->result}}" name="result" required>
            </div>
            <div class="form-group">
                <label>Passing</label>
                <input type="number" class="form-control" placeholder="Enter Passing" value="{{$exam->passing}}" name="passing" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
