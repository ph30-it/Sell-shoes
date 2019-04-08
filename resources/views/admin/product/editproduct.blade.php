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
					@if(session('status'))
						<div class="alert alert-danger" style="margin-top: 15px">
							{{ session('status') }}
						</div>
					@endif
					<div class="panel-body">
						<form method="POST" enctype="multipart/form-data" action="{{route('edit-product',$product->id)}}">
							@csrf()
							@method('PUT')
							<div class="row" style="margin-bottom:40px">
								<div class="col-xs-8">
									<div class="form-group" >
										<label>Tên sản phẩm<span style="color: red;">*</span></label>
										<input type="text" name="name" class="form-control" value="{{$product->name}}">
										@if($errors->has('name'))
			    							<span class="" style="color:red;font-size: 13px">{{$errors->first('name')}}</span>
			    						@endif
									</div>
									<div class="form-group" >
										<label>Giá sản phẩm(VNĐ)<span style="color: red;">*</span></label>
										<input type="text" name="price" class="form-control" value="{{$product->price}}">
										@if($errors->has('price'))
			    							<span class="" style="color:red;font-size: 13px">{{$errors->first('price')}}</span>
			    						@endif
									</div>									
									<div class="form-group">
										<label>Size Giày<span style="color: red;">*</span></label>
										@php
											$listSize= $product->sizes->pluck('id')->toArray();
										@endphp
										    @foreach($sizes  as $item)
								                @php
													$checked= in_array($item->id, $listSize) ? 'checked' : '';
												@endphp    	
						                    		
												<section  class="sky-form">
						                   		 	<label class="checkbox"><input type="checkbox" name="size[]" value="{{$item->id}}" {{$checked}} ><i style="padding: 6px" ></i>{{$item->name}}</label>
						                   		 </section>	
					                   		 @endforeach
											@if($errors->has('size'))
			    							<span class="" style="color:red;font-size: 13px">{{$errors->first('size')}}</span>
			    							@endif

									</div>
									<div class="form-group">
										<label>Khuyến mãi(%)</label>
										<input type="text" name="sale" class="form-control" value="{{$product->sale}}">
										@if($errors->has('sale'))
			    							<span class="" style="color:red;font-size: 13px">{{$errors->first('sale')}}</span>
			    						@endif
									</div>
									
									<div class="form-group" >
										<label>Danh mục<span style="color: red;">*</span></label>
										<select name="category_id" class="form-control">
											@foreach($categories as $category)
												<option value="{{$category->id}}" @if($product->category_id == $category->id) selected @endif>{{$category->name}}</option>
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
												<option value="{{$brand->id}}" @if($product->brand_id == $brand->id) selected @endif>{{$brand->name}}</option>
											@endforeach
					                    </select>
					                    @if($errors->has('brand_id'))
			    							<span class="" style="color:red;font-size: 13px">{{$errors->first('brand_id')}}</span>
			    						@endif
									</div>
									<div class="form-group" >
										<label>Trạng thái</label>
										<select name="status" class="form-control">
											<option value="1" @if($product->status == 1) selected @endif > Hiển thị</option>
											<option value="0" @if($product->status == 0) selected @endif > Ẩn</option>
					                    </select>
									</div>
									<div class="form-group" >
										<label>Miêu tả</label><br>
										<textarea  name="description" class="" cols="100" rows="5" style="padding: 10px;">
											{{$product->description}}
										</textarea>
									</div>
								</div>
								<div class="form-group col-xs-4">
										<label>Ảnh sản phẩm<span style="color: red;">*</span></label>
										<input id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)">
											@foreach($product->images as $image)
												<?php $image['slug'] = $image->slug; ?>
											@endforeach
											<img id="avatar" class="thumbnail" width="300px" src="{{asset($image['slug'])}}">
					                    	@if($errors->has('img'))
			    							<span class="" style="color:red;font-size: 13px">{{$errors->first('img')}}</span>
			    							@endif
								</div>
								<div class="form-group" >
										<label>Ảnh mô tả sản phẩm</label>
										<input id="img_description" type="file" name="img_description[]" multiple>
					                    @if($errors->has('img_description.*'))
			    							<span class="" style="color:red;font-size: 13px">{{$errors->first('img_description.*')}}</span>
			    						@endif
								</div>
							</div>
							<input type="submit" value="Sửa" class="btn btn-primary"/>
							<a href="{{route('product-admin')}}" class="btn btn-danger">Hủy bỏ</a>
						</form>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
@stop
