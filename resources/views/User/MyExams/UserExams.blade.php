@extends('layouts.app')

@section('content')
<table class="table table-striped mt-5">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Exam Name</th>
        <th scope="col">Result</th>
        <th scope="col">Passing</th>
        <th scope="col">MyScore</th>
        <th scope="col">Status</th>
        <th scope="col">Destroy</th>
      </tr>
    </thead>
    <tbody>
      <?php $x=0; ?>
      @foreach ($user_exams as $details)
        <tr>
            <th scope="row">
              <?php $x=$x+1;
                echo $x;
              ?>
            </th>
            <td>{{$details->name}}</td>
            <td>{{$details->result}}</td>
            <td>{{$details->passing}}</td>
            <td>{{$details->score}}</td>
            <td>
                @if ($details->score<$details->passing)
                    <p style="font-size:13px;" class="badge badge-pill badge-danger">FAILED</p>
                @else 
                    <p style="font-size:13px;" class="badge badge-pill badge-success">SUCCESS</p>
                @endif
            </td>
            <td>
              <form method="POST" action="/stud/delete_userexam">
                {{ csrf_field() }}
                <input type="hidden" name="exam_id" value="{{$details->exam_id}}">
                <a href="/stud/exam/{{$details->id}}" class="btn btn-outline-primary">re-exam</a>
                <button type="submit" class="btn btn-outline-danger">Delete</button>
              </form>  
            </td>
        </tr>
    @endforeach  
    </tbody>
  </table>
@endsection
