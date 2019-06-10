@extends('layouts.app')
@section('content')
    <div class="card">

        <div class="card-header">
            <h1 class="text-center">Simple Quiz <span class="fa fa-smile-wink"></span></h1>
        </div>
        <div class="card-body">
            <h5 class="card-title">Special quiz treatment</h5>
            <p class="card-text">
                <form action="/stud/exam/showresult" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{$examid}}" name="examid">
                    @foreach ($questions as $q)
                        <?php
                            $shuffle = array($q->choise1,$q->choise2,$q->choise3);
                            shuffle($shuffle);
                        ?>
                        <p>{{$q->question_no}}-) {{$q->question}}</p>
                        <input type="radio" id="mc" name="question{{$q->question_no}}" value="{{$shuffle[0]}}">{{$shuffle[0]}}<br>
                        <input type="radio" id="mc" name="question{{$q->question_no}}" value="{{$shuffle[1]}}">{{$shuffle[1]}}<br>
                        <input type="radio" id="mc" name="question{{$q->question_no}}" value="{{$shuffle[2]}}">{{$shuffle[2]}}<br>
                        <hr>
                    @endforeach
                    <button type="submit" class="btn btn-primary btn-lg">finish quiz <span class="fa fa-trophy"></span></button>
                    <br><br><br><br>
                </form>
            </p>
        </div>
    </div>
@endsection