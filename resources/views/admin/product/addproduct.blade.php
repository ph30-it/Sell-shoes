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
					<div class="panel-body">
						<form method="post" action="{{route('add-product')}}" enctype="multipart/form-data">
							@csrf()
							@include('errors.error')
							<div class="row" style="margin-bottom:40px">
								<div class="col-xs-8">
									<div class="form-group" >
										<label>Tên sản phẩm</label>
										<input required type="text" name="name" class="form-control">
									</div>
									<div class="form-group" >
										<label>Giá sản phẩm</label>
										<input required type="text" name="price" class="form-control">
									</div>
									<div class="form-group" >
										<label>Size Giày</label>
										<?php $i=1; ?>	
											@foreach($sizes as $item)								
												<section  class="sky-form">
						                   		 	<label class="checkbox">
						                   		 		<input type="checkbox" name="size[]" value="{{$i}}"><i style="padding: 6px"></i>{{$item->name}}

						                   		 	</label>
						                   		 	<!-- <input type="text" name=""> -->
						                   		</section>
						                   <?php $i++; ?>	
											@endforeach
					                    </select>
									</div>
									<div class="form-group" >
										<label>Khuyến mãi(%)</label>
										<input required type="text" name="sale" class="form-control">
									</div>
									
									<div class="form-group" >
										<label>Danh mục</label>
										<select required name="category_id" class="form-control">
											@foreach($categorylist as $category)
												<option value="{{$category->id}}">{{$category->name}}</option>
											@endforeach
					                    </select>
									</div>
									<div class="form-group" >
										<label>Hãng sản phẩm</label>
										<select required name="brand_id" class="form-control">
											@foreach($brands as $brand)
												<option value="{{$brand->id}}">{{$brand->name}}</option>
											@endforeach
					                    </select>
									</div>
									<div class="form-group" >
										<label>SP Đặc biệt</label><br>
										Có: <input type="radio" name="featured" value="1">
										Không: <input type="radio" checked name="featured" value="0">
									</div>
									<div class="form-group" >
										<label>Trạng thái</label>
										<select required name="status" class="form-control">
											<option value="1">Còn hàng</option>
											<option value="0">Hết hàng</option>
					                    </select>
									</div>
									<div class="form-group" >
										<label>Miêu tả</label><br>
										<textarea required name="description" class="" cols="100" rows="5" style="padding: 10px;"></textarea>
									</div>		
								</div>
								<div class="form-group col-xs-4">
										<label>Ảnh sản phẩm</label>
										<input required id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)">
					                    <img id="avatar" class="thumbnail" width="300px" src="{{asset('images/new_seo-10-512.png')}}">
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
