@extends('admin.master')
@section('title', 'Sản Phẩm | MV Shoes')
@section('content')
<script>
	$(document).ready(function(){
	
	$('#quantity').keyup(function(){
		var query = $('#quantity').val();
		$.post(route('search-product-admin'), {data: query},function(data){
			$('tbody').html(data);
		})
	});
</script>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sản phẩm</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">Danh sách sản phẩm</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<form action="">
									<div style="margin-bottom: 15px">
										<input type="search" class="form-control" placeholder="Tìm kiếm sản phẩm..." name="search" id="search">
									</div>
								</form>
								<a href="{{route('show-add-product')}}" class="btn btn-primary">Thêm sản phẩm</a>
								@if(session('status'))
									<div class="alert alert-success">
										{{ session('status') }}
									</div>
							 	@endif
								<table class="table table-bordered" style="margin-top:20px;text-align: center;font-size: 13px">				
									<thead>
										<tr class="bg-primary">
											<th style="text-align: center; ">ID</th>
											<th width="10%" style="text-align: center;">Tên Sản phẩm</th>
											<th style="text-align: center;">Giá sản phẩm</th>
											<th style="text-align: center;">Khuyến mãi</th>
											<th style="text-align: center;" width="5%">Size giày</th>
											<th style="text-align: center;">Số lượng</th>
											<th width="10%" style="text-align: center;">Ảnh sản phẩm</th>
											<th style="text-align: center;" width="15%">Mô tả</th>
											<th style="text-align: center;">Danh mục</th>
											<th style="text-align: center;">Hãng</th>
											<th style="text-align: center;">SP Đặc biệt</th>
											<th style="text-align: center;">Trạng thái</th>
											<th style="text-align: center;">Ngày tạo</th>
											<th style="text-align: center;">Cập nhật</th>
											<th style="text-align: center;">Tùy chọn</th>
										</tr>
									</thead>	
									<tbody>
										@foreach($productlist as $product)
											<tr>
												<td>{{$product->id}}</td>
												<td>{{$product->name}}</td>
												<td>{{number_format($product->price,0)}}</td>
												<td><span style="border-radius: 15px;padding: 5px;background: #FFAF02;color: #fff">{{$product->sale}}%</span></td>
												<td>
													<?php 
														 $sizes = App\Product::find($product->id)->sizes;
														 $categorys = App\Product::find($product->id)->category;
														 $images = App\Image::select('slug')->where('product_id',$product->id)->where('status',1)->orderBy('updated_at','desc')->first();
														 $brand = App\Brand::select('name')->where('id',$product->brand_id)->first();
														 if(empty($images)){
														 	 $images['slug'] = 'images/image.png';
														 }
														 $quantity = 0;
														 $total_quantity = App\ProductSize::select('quantity')->where('product_id',$product->id)->get();
														 //dd($total_quantity);
													 ?>
													@foreach($sizes as $item)
														<span style="background: url(//theme.hstatic.net/1000243581/1000361905/14/bg-variant-checked.png?v=131) no-repeat right bottom #fff; padding:2px; border: 1px solid #ccc;">{{$item->name}}</span>
													@endforeach
														
													
												</td>
												<td>
													@foreach($total_quantity as $qty)
														<?php $quantity += $qty->quantity ?>
													@endforeach
													{{$quantity}}
												</td>
												<td>
													@if($images['slug'])
														<img src="{{asset($images['slug'])}}" alt="" width="150px">
													@else
														<img src="{{asset($images->slug)}}" alt="" width="150px">
													@endif
												</td>
												<td>{{$product->description}}</td>
												<td>{{$categorys->name}}</td>
												<td>{{$brand->name}}</td>
												<td>@if($product->featured == 1)
														<span class="btn-info">Đặc biệt</span>
													@else
														<span class="btn-default">Bình thường</span>
													@endif
												</td>
												<td>@if($product->status == 1)
														<span class="btn-default">Đã hiển thị</span>
													@else
														<span class="btn-success">Đang ẩn</span>
													@endif
												</td>
												<td>{{$product->created_at}}</td>
												<td>{{$product->updated_at}}</td>
												<td style="line-height: 50px">
													<a href="{{route('show-edit-product',$product->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a><br>
													<form action="{{route('delete-product',$product->id)}}" method="POST">
														@csrf
														@method('DELETE')
														<button onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger">Xóa</button>
													</form>
													
													<a href="{{route('view-product-size',$product->id)}}" class="btn btn-success">Size</a><br>
													<a href="{{route('view-product-image',$product->id)}}" class="btn btn-info">Ảnh</a>
												</td>
											</tr>
										@endforeach
									</tbody>
								</table>	

								<div style="margin-left: 45%;">
									{{ $productlist->links()}}
								</div>
									
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
@stop