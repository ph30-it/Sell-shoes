@extends('admin.master')
@section('title', 'Category Management')
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
							Thêm danh mục
						</div>
						<div class="panel-body">
							<form action="{{route('add-category')}}" method="POST">
								@if(session('status'))
									<div class="alert alert-info">
										{{ session('status') }}
									</div>
							 	@endif
								@csrf()
								@include('errors.error')
								<div class="form-group">
									<label>Tên danh mục:</label>
	    							<input required type="text" name="name" class="form-control" placeholder="Tên danh mục...">
	    							@if($errors->has('name'))
	    							<p class="alert alert-danger">{{$errors->first('name')}}</p>
	    							@endif
								</div>
								<div class="form-group">
									<label>Mô tả:</label><br>
	    							<textarea name="description" id="" cols="54" rows="10" class="" style="padding: 10px"></textarea>
								</div>

								<div class="form-group">
	    							<input type="submit" name="insert" class="btn btn-success" value="Thêm danh mục" width="30%">
								</div>
							</form>
						</div>
					</div>
			</div>
			<div class="col-xs-12 col-md-7 col-lg-7">
				<div class="panel panel-primary">
					<div class="panel-heading">Danh sách danh mục</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<table class="table table-bordered">
				              	<thead>
					                <tr class="bg-primary">
					                  <th>Tên danh mục</th>
					                  <th>Slug</th>
					                  <th style="width:40%">Mô tả</th>
					                  <th style="width:24%">Tùy chọn</th>
					                </tr>
				              	</thead>
				              	<tbody>
				              		@foreach($category_list as $item)
									<tr>
										<td>{{$item->name}}</td>
										<td>{{$item->slug}}</td>
										<td>{{$item->description}}</td>
										<td>
				                    		<a href="{{route('show-edit-category',$item->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
				                    		<form action="{{route('delete-category',$item->id)}}" method="POST">
				                    			@csrf()
				                    			@method('DELETE')
				                    			<button onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger">
				                    				<span class="glyphicon glyphicon-trash"></span> Xóa
				                    			</button>
				                    		</form>
				                  		</td>
				                  	</tr>	
				                  	@endforeach
				                </tbody>
				            </table>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
@stop