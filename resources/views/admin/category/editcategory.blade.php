@extends('admin.master')
@section('title', 'Sửa thông tin danh mục')
@section('content')
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh mục sản phẩm</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-5 col-lg-5">
					<div class="panel panel-primary">
						<div class="panel-heading">
							Sửa danh mục
						</div>
						<div class="panel-body">
							<form action="{{route('edit-category',$category->id)}}" method="POST">
								@method('PUT')
								@csrf()
								<div class="form-group">
									<label>Tên danh mục:<span style="color: red;">*</span></label>
	    							<input type="text" name="name" class="form-control" placeholder="Tên danh mục..." value="{{$category->name}}">
	    							@if($errors->has('name'))
		    							<span class="" style="color:red;font-size: 13px">{{$errors->first('name')}}</span>
		    						@endif
								</div>
								<div class="form-group">
									<div><label>Mô tả:</label></div>
									<textarea name="description" id="" cols="54" rows="10" class="" style="padding: 10px">
										{{$category->description}}
									</textarea>
	
								</div>
								<div class="form-group" width="30%">
		    						<input type="submit" name="update" class="btn btn-success" value="Sửa">
								</div>
								<div class="form-group">
		    						<a href="{{route('category-admin')}}" class="btn btn-danger" >Hủy bỏ</a>
								</div>
							</form>
						</div>
					</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
@stop