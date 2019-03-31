@extends('admin.master')
@section('title', 'Sửa bình luận')
@section('content')
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Bình Luận</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-5 col-lg-5">
					<div class="panel panel-primary">
						<div class="panel-heading">
							Sửa bình luận
						</div>
						@if(session('status'))
							<div class="alert alert-danger" style="margin-top: 10px">
								{{ session('status') }}
							</div>
						@endif
						<div class="panel-body">
							<form action="{{route('edit-comment',$comment->id)}}" method="POST">
								@csrf()
								@method('PUT')
								<div class="form-group">
									<label>Họ và tên:<span style="color: red;">*</span></label>
	    							<input type="text" name="name" class="form-control" placeholder="Họ và tên" value="{{$comment->name}}">
	    							@if($errors->has('name'))
    									<span class="" style="color:red;font-size: 13px">{{$errors->first('name')}}</span>
    								@endif
								</div>
								<div class="form-group">
									<label>Email:<span style="color: red;">*</span></label>
	    							<input type="email" name="email" class="form-control" placeholder="email@gmail.com" value="{{$comment->email}}">
	    							@if($errors->has('email'))
    									<span class="" style="color:red;font-size: 13px">{{$errors->first('email')}}</span>
    								@endif
								</div>
								<div class="form-group">
									<label>Nội dung:<span style="color: red;">*</span></label>
									<textarea name="content" id="" cols="30" rows="10" class="form-control">
										{{$comment->content}}
									</textarea>
									@if($errors->has('content'))
    									<span class="" style="color:red;font-size: 13px">{{$errors->first('content')}}</span>
    								@endif
								</div>
								<div class="form-group" width="30%">
		    						<input type="submit" class="btn btn-success" value="Sửa">
								</div>
								<div class="form-group">
		    						<a href="{{route('comment-admin')}}" class="btn btn-danger" >Hủy bỏ</a>
								</div>
							</form>
						</div>
					</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
@stop