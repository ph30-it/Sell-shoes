@extends('admin.master')
@section('title', 'Sửa sản phẩm | MV Shoes')
@section('content')
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sửa thông tin sản phẩm</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">Sửa sản phẩm</div>
					<div class="panel-body">
						<form method="POST" enctype="multipart/form-data">
							@csrf()
							@include('errors.error')
							<div class="row" style="margin-bottom:40px">
								<div class="col-xs-8">
									<div class="form-group" >
										<label>Tên sản phẩm</label>
										<input required type="text" name="name" class="form-control" value="{{$product->name}}">
									</div>
									<div class="form-group" >
										<label>Giá sản phẩm(VNĐ)</label>
										<input required type="text" name="price" class="form-control" value="{{number_format($product->price)}}">
									</div>
									<div class="form-group">
										<label>Số lượng</label>
										<input type="text" name="quantity" class="form-control" value="{{$product->quantity}}">
									</div>
									<div class="form-group">
										<label>Size Giày</label>
										    
					                    	@foreach($product_size as $item)
					                    		<!-- <label class="container">{{$item->name}}
												  <input type="checkbox" name="size" value="{{$item->name}}" checked>
												  <span class="checkmark"></span>
												</label> -->
												<section  class="sky-form">
						                   		 	<label class="checkbox"><input type="checkbox" name="size[]" value="{{$item->name}}" checked><i style="padding: 6px"></i>{{$item->name}}</label>
						                   		 </section>
					                   		 @endforeach
					                   		 


									</div>
									<div class="form-group">
										<label>Khuyến mãi(%)</label>
										<input required type="text" name="sale" class="form-control" value="{{$product->sale}}">
									</div>
									
									<div class="form-group" >
										<label>Danh mục</label>
										<select required name="category_id" class="form-control">
											@foreach($categories as $category)
												<option value="{{$category->id}}" @if($product->category_id == $category->id) selected @endif>{{$category->name}}</option>
											@endforeach
					                    </select>
									</div>
									<div class="form-group" >
										<label>Sản phẩm đặc biệt</label><br>
										Có: <input type="radio" name="featured" value="1" @if($product->featured == 1) checked @endif >
										Không: <input type="radio" name="featured" value="0" @if($product->featured == 0) checked @endif >
									</div>
									<div class="form-group" >
										<label>Trạng thái</label>
										<select required name="status" class="form-control">
											<option value="1" @if($product->featured == 1) selected @endif > Còn hàng</option>
											<option value="0" @if($product->featured == 0) selected @endif > Hết hàng</option>
					                    </select>
									</div>
									<div class="form-group" >
										<label>Miêu tả</label><br>
										<textarea required name="description" class="" cols="100" rows="5" style="padding: 10px;">
											{{$product->description}}
										</textarea>
									</div>
								</div>
								<div class="form-group col-xs-4">
										<label>Ảnh sản phẩm</label>
										<input id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)">
					                    <img id="avatar" class="thumbnail" width="300px" src="{{asset('images/'.$images->name)}}">
								</div>
							</div>
							<input type="submit" name="submit" value="Sửa" class="btn btn-primary"/>
							<a href="{{route('product-admin')}}" class="btn btn-danger">Hủy bỏ</a>
						</form>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
@stop
