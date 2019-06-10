@extends('layouts.app')

@section('content')
    {{-- <div class="jumbotron jumbotron-fluid header-desciption" style="background-image:url('/Image/computer-6.jpg');color:blanchedalmond">
        <div class="container details">
            <h1 class="text-center">Exam Details</h1><br>
            <p class="lead">
                There are many exams for each exam with its own name, number of questions , success rate , final score and the exam is not limited by a certain time
            </p>
        </div>
    </div> --}}

    <div class="row mt-4 mr-4 ml-4">
        @foreach ($exams as $exam)
            <div class="col-sm-3">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{$exam->name}}</h5><hr>
                    <p class="card-text">
                        <span style="font-size:18px;">result :</span><span style="color: yellowgreen"> {{$exam->result}} </span><br>
                        <span style="font-size:18px;">passing :</span> <span style="color:darkred"> {{$exam->passing}} </span>
                    </p>
                    <a href="/stud/exam/{{$exam->id}}" class="btn btn-outline-success btn-block">Start Exam</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection