@extends('layouts.app')

@section('content')

<table class="table table-striped mt-5">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Group Name</th>
            <th scope="col">Manage</th>
         </tr>
    </thead>
    <tbody>
      <?php $x=0; ?>
      @foreach ($users as $user)
        <tr>
            <th scope="row">
              <?php $x=$x+1;
                echo $x;
              ?>
            </th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                @if ($user->group_id==0)
                    User
                @else
                     Admin
                @endif
            </td>
            <td>
                <form method="POST" action="/admin/delete_user/{{$user->id}}">
                    {{ csrf_field() }}
                    <a class="btn btn-outline-primary" href="/admin/edit_user/{{$user->id}}">Edit</a>
                    <button class="btn btn-outline-danger">Delete</button>
                </form>    
            </td>
        </tr>
    @endforeach  
    </tbody>
</table>
    
@endsection