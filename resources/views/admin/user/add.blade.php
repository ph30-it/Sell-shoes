@extends('admin.master')
@section('title','Add User')
@section('content')
<div class="container pull-right">
    <div id="navbar" class="row">
        <div class="col-sm-12">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <ul class="nav navbar-nav">

                        <li><a href="{{route('home-admin')}}" class="btn-info">Home</a></li>
                        <li><a href="{{route('user-admin')}}" class="btn-danger">Users</a></li>
                        <li><a href="{{route('add-user')}}" class="btn-success">Add user</a></li>
                    </ul>
                    <!-- <p id="logout" class="navbar-text navbar-right"><a class="navbar-link" href="{{route('logout')}}" onclick="return confirm('Bạn có chắc chắn muốn đăng xuất?')">Logout</a></p> -->
                </div>
                <h3>Add User</h3>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            @if(session('status'))
                <div class="alert alert-info">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{route('add-user')}}">
                @csrf()
                @include('errors.error')  
                <div class="form-group">
                    <label>Fullname</label>
                    <input type="text" name="name" class="form-control" placeholder="Fullname" value="" required />
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Email" value="" required />
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" value="" required />
                </div>
                <div class="form-group">
                    <label>User Level</label>
                    <select name="role_id" class="form-control">
                        <option value="2">SuperAdmin</option>
                        <option value="1">User</option>
                    </select>
                </div>
                <input type="submit" name="submit" value="Thêm mới" class="btn btn-primary" />
                <a href="{{route('user-admin')}}" class="btn btn-danger">Hủy</a>
            </form>
        </div>
    </div>
</div>
@endsection