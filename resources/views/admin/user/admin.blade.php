@extends('admin.master')
@section('title','User Management')
@section('content')
<div class="container" style="margin-left: 17%">
    <div id="navbar" class="row">
    	<div class="col-sm-12">
        	<nav class="navbar navbar-default">

  				<div class="container-fluid">
                	<ul class="nav navbar-nav">

                        <li><a href="{{route('home-admin')}}" class="btn-info">Home</a></li>
                        <li><a href="{{route('user-admin')}}" class="btn-danger">Users</a></li>
                        <li><a href="{{route('show-add-user')}}" class="btn-success">Add user</a></li>
                	</ul>
                    <!-- <p id="logout" class="navbar-text navbar-right"><a class="navbar-link" href="{{route('logout')}}" onclick="return confirm('Bạn có chắc chắn muốn đăng xuất?')">Logout</a></p> -->
                </div>
                <h3>User Management</h3>
            </nav>
        </div>
    </div>
    <div class="row">
    	<div class="col-sm-12">
            @if(session('status'))
        	<div class="alert alert-success">{{session('status')}}</div>
            @endif
        	<table class="table table-striped" style="text-align: center;">
            	<tr id="tbl-first-row">
                	<td width="5%">ID</td>
                    <td width="30%">Fullname</td>
                    <td width="15%">Email</td>
                    <td width="10%">Password</td>
                    <td width="5%">User Level</td>
                </tr>
                @foreach($users as $user)
                <tr>
                	<td>{{$user->id}}</td>
                    <td>
                        <ul class="user-menu" style="margin-top: 0px;margin-right: 60px">
                            <li class="dropdown pull-right">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: #000"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>{{$user->name}}<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{route('show-new-password',$user->id)}}"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Đổi mật khẩu</a></li>
                                    <li><a href="{{route('show-edit-user',$user->id)}}"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Sửa thông tin</a></li>
                                    <li>
                                        <form action="{{route('delete-user',$user->id)}}" method="POST">
                                            @method('DELETE')
                                            @csrf()
                                            <button onclick="return confirm('Bạn có chắc chắn muốn xóa?')" style="background: #fff;border: none;"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Xóa tài khoản</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        
                    </td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->password}}</td>
                    <td>@if($user->role_id == 2)
                            <span class="btn-danger">SuperAdmin</span>
                        @else
                            <span class="btn-info">User</span>
                        @endif
                    </td>
                </tr>
                @endforeach
			</table>
            <div aria-label="Page navigation">
            	<div>
                    {{$users->links()}}   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
