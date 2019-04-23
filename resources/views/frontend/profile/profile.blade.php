@extends('frontend.master')
@section('title', 'Hồ sơ của tôi')
@section('content')
<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>

.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
.imgtron{
	width: 100%;
    height: 100%;
    border-radius: 50%;
    background-position: 50%;
    background-size: cover;
    background-repeat: no-repeat;
    cursor: pointer;
}
</style>
<div style="background: #eee;">
	<div class="container" >
		<h3>Hồ Sơ Của Tôi</h3>
		<p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
		<div class="container emp-profile">
	            <form method="post" action="{{route('update-profile-user', Auth::user()->id)}}" enctype="multipart/form-data">
	            	@csrf
	            	@method('PUT')
	                <div class="row">
	                    <div class="col-md-4">
	                        <div class="profile-img">
	                            <img id="avatar" src="{{asset(Auth::user()->avatar)}}" class="avatar img-circle img-thumbnail" alt=""/>
	                           <!--   <img src="{{asset('images/avatar/avatar2.jpg')}}" class="avatar img-circle img-thumbnail" alt="avatar"> -->
	                            <div class="file btn btn-lg btn-primary">
	                                Đổi ảnh đại diện
	                                <input type="file" name="image" id="img" onchange="changeImg(this)" />
	                            </div>
	                            @if($errors->has('image'))
	    							<br><span class="" style="color:red;font-size: 13px">{{$errors->first('image')}}</span>
	    						@endif	
	                        </div>
	                    </div>
	                    <div class="col-md-6">
	                        <div class="profile-head">
	                                    <h3>
	                                        {{Auth::user()->name}}
	                                    </h3>
	                                    <h5 style="color: blue;">
	                                        Tài khoản khách hàng
	                                    </h5>
	                                    
	                            <ul class="nav nav-tabs" id="myTab" role="tablist">
	                                <li class="nav-item">
	                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Thông tin cá nhân</a>
	                                </li>
	                            
	                            </ul>
	                        </div>
	                    </div>
	                    <div class="col-md-2">
	                        <p style="border: 1px solid #ccc; display: inline-block; padding: 15px"><span style="color: #000;font-weight: bold;">Đã cập nhật ngày: </span>{{date('d/m/Y H:i:s', strtotime(Auth::user()->updated_at))}}</p>
	                    </div>
	                </div>
	                <div class="row">
	                    <div class="col-md-4">
	                        <div class="profile-work">
	                            <p style="font-size: 15px">Tài khoản của tôi</p>
	                            <a href="{{route('profile-user')}}">Hồ sơ</a><br/>
	                            <a href="">Đổi mật khẩu</a><br/>
	                            <a href="">Đơn mua</a><br/>
	                          	<a href="">Bình luận (3)</a><br/>
	                        </div>
	                    </div>
	                    <div class="col-md-8" style="margin-top: -60px">
	                        <div class="tab-content profile-tab" id="myTabContent">
	                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
	                            	@if(session('success'))
										<div class="alert alert-success" style="margin-top: -50px">
											{{ session('success') }}
										</div>
								 	@endif
								 	@if(session('fail'))
										<div class="alert alert-danger" style="margin-top: -50px">
											{{ session('fail') }}
										</div>
								 	@endif
	                                        <div class="row" style="margin-bottom: 15px;">
	                                            <div class="col-md-4">
	                                                <label>Họ tên</label>
	                                            </div>
	                                            <div class="col-md-8">
	                                                <input name="name" type="text" value="{{Auth::user()->name}}" style="padding: 5px;">
	                                            </div>
	                                        </div>
	                                        <div class="row">
	                                            <div class="col-md-4">
	                                                <label>Email</label>
	                                            </div>
	                                            <div class="col-md-8">
	                                                <span>
	                                                	{{ substr(Auth::user()->email, 0,2).'*************@gmail.com'}}
	                                                </span> <a href="{{route('email-confirm-password-user', Auth::user()->id)}}">Thay đổi</a>
	                                            </div>
	                                        </div>
	                                        <div class="row">
	                                            <div class="col-md-4">
	                                               <label style="margin-top: 15px;">Giới tính</label>
	                                            </div>                               
	                                            <div class="col-md-8">										   			
	                                                <label for="nam" style="margin-right: 4px;margin-top: -10px;">
										   				<input type="radio" value="nam" name=sex id="nam" class="productSize"  @if(Auth::user()->sex === 'nam') checked @endif />
										   				<span>
															Nam
										   				</span>
										   				</label>
													<label for="nữ" style="margin-right: 4px;margin-top: -10px;">
										   				<input type="radio" value="nữ" name=sex id="nữ" class="productSize" @if(Auth::user()->sex === 'nữ') checked @endif>
										   				<span>
															Nữ
										   				</span>
										   			</label>
	                                            </div>
	                                        </div>
	                                        <div class="row" style="margin-top: 15px;margin-bottom: 15px;">
	                                            <div class="col-md-4">
	                                                <label>Ngày sinh</label>
	                                            </div>
	                                            <div class="col-md-8">
                                            		@if(Auth::user()->birthday != "")
	                                            		@php
		                                            		$birthday = explode('/', Auth::user()->birthday);
		                                            		$day = $birthday[0];
		                                            		$moth = $birthday[1];
		                                            		$year = $birthday[2];
														@endphp
	                                            	
	                                                <select id="" style="width: 70px;height: 30px;" name="day">
	                                                	@for($i = 1; $i <= 31; $i++)
	                                                		@if($i == $day)
	                                                			<option value="{{$i}}" selected>{{$i}}</option>
	                                                		@else
	                                                			<option value="{{$i}}">{{$i}}</option>
	                                                		@endif
	                                                	@endfor
	                                                </select>
	                                                <select  id="" style="width: 70px;height: 30px;" name="month">
	                                                	@for($i = 1; $i <= 12; $i++)
	                                                		@if($i == $moth)
	                                                			<option value="{{$i}}" selected>{{$i}}</option>
	                                                		@else
	                                                			<option value="{{$i}}">{{$i}}</option>
	                                                		@endif
	                                                	@endfor
	                                                </select>
	                                                <select id="" style="width: 70px;height: 30px;" name="year">
	                                                	@for($i = 1900; $i <= 2019; $i++)
	                                                		@if($i == $year)
	                                                			<option value="{{$i}}" selected>{{$i}}</option>
	                                                		@else
	                                                			<option value="{{$i}}">{{$i}}</option>
	                                                		@endif
	                                                	@endfor
	                                                </select>
	                                                @else
	                                                	<select id="" style="width: 70px;height: 30px;" name="day">
	                                                	@for($i = 1; $i <= 31; $i++)
	                                                		<option value="{{$i}}">{{$i}}</option>
	                                                	@endfor
		                                                </select>
		                                                <select  id="" style="width: 70px;height: 30px;" name="month">
		                                                	@for($i = 1; $i <= 12; $i++)
		                                                		<option value="{{$i}}">{{$i}}</option>
		                                                	@endfor
		                                                </select>
		                                                <select id="" style="width: 70px;height: 30px;" name="year">
		                                                	@for($i = 1900; $i <= 2019; $i++)
		                                                		<option value="{{$i}}">{{$i}}</option>
		                                                	@endfor
		                                                </select>
	                                                @endif
	                                            </div>
	                                        </div>
	                                        <div class="row" style="margin-bottom: 10px;">
	                                            <div class="col-md-4">
	                                                <label>Số điện thoại</label>
	                                            </div>
	                                            <div class="col-md-8">
	                                                <span>
	                                                	@if(Auth::user()->phone == "")
	                                                		Chưa thêm
	                                                	@else
	                                                		{{'*********'.substr(Auth::user()->phone, 8,10)}} 
	                                                	@endif
	                                                </span> <a href="{{route('phone-confirm-password-user', Auth::user()->id)}}">Thay đổi</a>
	                                            </div>
	                                        </div>
	                                        <div class="row">
	                                            <div class="col-md-4">
	                                                <label>Địa chỉ</label>
	                                            </div>
	                                            <div class="col-md-8" w>
	                                                <input type="text" name="address" value="{{Auth::user()->address}}" style="width: 100%; padding: 5px;" placeholder="Thêm địa chỉ...">
	                                                <div style="margin-top: 30px;" >
	                                                	<button type="submit" style=" background-color: #ee4d2d; color: #fff; border: none; padding: 10px 20px; border-radius: 3px">Lưu</button>
	                                                </div>
	                                            </div>

	                                        </div>

	                            		</div>
	                               		
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </form>           
	        </div>
	</div>
</div>
<script>
	function changeImg(input){
		    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
		    if(input.files && input.files[0]){
		        var reader = new FileReader();
		        //Sự kiện file đã được load vào website
		        reader.onload = function(e){
		            //Thay đổi đường dẫn ảnh
		            $('#avatar').attr('src',e.target.result);
		        }
		        reader.readAsDataURL(input.files[0]);
		    }
		}
		$(document).ready(function() {
		    $('#avatar').click(function(){
		        $('#img').click();
		    });
		});
</script>
@endsection