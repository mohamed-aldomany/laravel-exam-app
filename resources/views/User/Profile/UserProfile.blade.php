@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-6 mt-5 userForm">
        <form method="POST" action="/stud/update_profile">
            {{ csrf_field() }}

            <h1 class="text-center">Edit Profile</h1>
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter name" value="{{$user->name}}" name="name">
                <small class="form-text text-muted"></small>
            </div>
                
            <div class="form-group">
                <label>Email address</label>
                <input type="email" class="form-control" placeholder="Enter email" value="{{$user->email}}" name="email">
                <small class="form-text text-muted"></small>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
