@extends('layouts.app')

@section('content')
<div>
    <div class="row mt-4 mr-4 ml-4">
        @foreach ($exams as $exam)
            <div class="col-sm-3">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{$exam->name}} Exam</h5><hr>
                    <a href="/admin/manage_questions/{{$exam->id}}" class="btn btn-outline-success btn-block">Manage Questions</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection