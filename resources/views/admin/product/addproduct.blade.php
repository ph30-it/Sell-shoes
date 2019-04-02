@extends('admin.master')
@section('title', 'Thêm sản phẩm | DucManh-IT Shoes')
@section('content')
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sản phẩm</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">Thêm sản phẩm</div>
					@if(session('status'))
						<div class="alert alert-danger" style="margin-top: 15px">
							{{ session('status') }}
						</div>
				 	@endif
					<div class="panel-body">
						<form method="post" action="{{route('add-product')}}" enctype="multipart/form-data">
							@csrf()
							<div class="row" style="margin-bottom:40px">
								<div class="col-xs-8">
									<div class="form-group" >
										<label>Tên sản phẩm<span style="color: red;">*</span></label>
										<input type="text" name="name" class="form-control" value="{{old('name')}}">
										@if($errors->has('name'))
			    							<span class="" style="color:red;font-size: 13px">{{$errors->first('name')}}</span>
			    						@endif
									</div>
									<div class="form-group" >
										<label>Giá sản phẩm<span style="color: red;">*</span></label>
										<input type="text" name="price" class="form-control" value="{{old('price')}}">
										@if($errors->has('price'))
			    							<span class="" style="color:red;font-size: 13px">{{$errors->first('price')}}</span>
			    						@endif
									</div>
									<div class="form-group" >
										<label>Size Giày<span style="color: red;">*</span></label>
										<?php $i=1; ?>	
											@foreach($sizes as $item)								
												<section  class="sky-form">
						                   		 	<label class="checkbox">
						                   		 		<input type="checkbox" name="size[]" value="{{$i}}" 
						                   		 		@if(old('size') == $i) checked @endif

						                   		 		><i style="padding: 6px"></i>{{$item->name}}

						                   		 	</label>
						                   		 	<!-- <input type="text" name=""> -->
						                   		</section>
						                   <?php $i++; ?>	
											@endforeach
					                    </select>
					                    @if($errors->has('size'))
			    							<span class="" style="color:red;font-size: 13px">{{$errors->first('size')}}</span>
			    						@endif
									</div>
									<div class="form-group" >
										<label>Khuyến mãi(%)</label>
										<input type="text" name="sale" class="form-control" value="{{old('sale')}}">
									</div>
									
									<div class="form-group" >
										<label>Danh mục<span style="color: red;">*</span></label>
										<select name="category_id" class="form-control">
											@foreach($categorylist as $category)
												<option value="{{$category->id}}">{{$category->name}}</option>
											@endforeach
					                    </select>
					                    @if($errors->has('category_id'))
			    							<span class="" style="color:red;font-size: 13px">{{$errors->first('category_id')}}</span>
			    						@endif
									</div>
									<div class="form-group" >
										<label>Hãng sản phẩm<span style="color: red;">*</span></label>
										<select name="brand_id" class="form-control">
											@foreach($brands as $brand)
												<option value="{{$brand->id}}">{{$brand->name}}</option>
											@endforeach
					                    </select>
					                    @if($errors->has('brand_id'))
			    							<span class="" style="color:red;font-size: 13px">{{$errors->first('brand_id')}}</span>
			    						@endif
									</div>
									<div class="form-group" >
										<label>SP Đặc biệt</label><br>
										Có: <input type="radio" name="featured" value="1">
										Không: <input type="radio" checked name="featured" value="0">
									</div>
									<div class="form-group" >
										<label>Trạng thái</label>
										<select name="status" class="form-control">
											<option value="1">Hiển thị</option>
											<option value="0">Ẩn</option>
					                    </select>
									</div>
									<div class="form-group" >
										<label>Miêu tả</label><br>
										<textarea name="description" class="" cols="100" rows="5" style="padding: 10px;"></textarea>
									</div>		
								</div>
								<div class="form-group" >
										<label>Ảnh sản phẩm<span style="color: red;">*</span></label>
										<input id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)">
					                    <img id="avatar" class="thumbnail" width="300px" src="{{asset('images/new_seo-10-512.png')}}">
					                    @if($errors->has('img'))
			    							<span class="" style="color:red;font-size: 13px">{{$errors->first('img')}}</span>
			    						@endif
								</div>
							</div>
							<input type="submit" name="submit" value="Thêm" class="btn btn-primary">
							<a href="{{route('product-admin')}}" class="btn btn-danger">Hủy bỏ</a>
						</form>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
@stop
