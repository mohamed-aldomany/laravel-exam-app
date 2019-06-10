@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-6 mt-5 userForm">
        <form method="POST" action="/admin/update_user">
            {{ csrf_field() }}
            <h1 class="text-center">Edit {{$user->name}} user</h1>
            <input type="hidden" name="user_id" value="{{$user->id}}">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter name" value="{{$user->name}}" name="name" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Enter Result" value="{{$user->email}}" name="email" required>
            </div>
            <div class="form-group">
                <label>Group_ID</label>
                <select class="form-control" name="group_id" required>
                    <option value="1">ADMIN</option>
                    <option value="0" selected>USER</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
