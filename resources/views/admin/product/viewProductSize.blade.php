@extends('admin.master')
@section('title', 'Quản lí size sản Phẩm | MV Shoes')
@section('content')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Kích Thước Sản Phẩm</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">Danh sách</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<a href="{{route('product-admin')}}" class="btn btn-primary">Quay lại</a>
								<form action="{{route('add-size-product',$id)}}" method="POST">
									@csrf
									<div class="form-group">
											<label for="">Thêm kích thước:</label>
											<select name="size_id" id="" style="padding: 3px">
													@foreach($sizes as $size)
														@if(in_array($size->id, $listSize))
														@else
															<option value="{{$size->id}}">{{$size->name}}</option>
														@endif
													@endforeach
											</select>
											<label for="">Số lượng:</label>
											<input type="text" name="quantity" style="width: 6%">
											<button type="submit" class="btn btn-success">Thêm</button>
											@if($errors->has('quantity'))
			    								<span style="color: red;font-size: 13px">{{$errors->first('quantity')}}</span>
			    							@endif
									</div>
								</form>
								@if(session('status'))
									<div class="alert alert-success">
										{{ session('status') }}
									</div>
							 	@endif
								<table class="table table-bordered" style="margin-top:20px;text-align: center;">				
									<thead>
										<tr class="bg-primary">
											<th style="text-align: center;">ID</th>
											<th width="" style="text-align: center;">Tên Sản phẩm</th>
											<th width="" style="text-align: center;">Ảnh sản phẩm</th>
											<th style="text-align: center;">Kích thước</th>
											<th style="text-align: center;" width="10%">Số lượng</th>
											<th style="text-align: center;">Ngày tạo</th>
											<th style="text-align: center;">Cập nhật</th>
											<th style="text-align: center;">Tùy chọn</th>
										</tr>
									</thead>	
									<tbody>
										
										@foreach($product_sizes as $item)
											<tr>
												<?php 
													$name_product = App\Product::select('name')->where('id',$item->product_id)->first();
													$size = App\Size::select('name')->where('id',$item->size_id)->first();
												 ?>
												<td>{{$item->id}}</td>
												<td>{{$name_product->name}}</td>
												<td><img src="{{asset($image->slug)}}" alt="" width="150px"></td>
												<td>{{$size->name}}</td>
												<td>
													<div class="form-group">		
														<input type="number" id="" class="form-control qty" value="{{$item->quantity}}" min="0" max="10000" data-id="{{$item->id}}">
															
													</div>
												</td>
												<td>{{$item->created_at}}</td>
												<td>{{$item->updated_at}}</td>
												<td>
													<form action="{{route('delete-product-size',$item->id)}}" method="POST">
														@csrf
														@method('DELETE')
														<button
														onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</button>
													</form>
													
												</td>
											</tr>
										@endforeach

									</tbody>
								</table>	

								<div style="margin-left: 45%;">
									
								</div>
									
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
	<script>
	$(document).ready(function(){
		$('.qty').change(function(event) {
				var qty = $(this).val();	
				var id =	$(this).attr('data-id');	
				//alert(id);
				$.ajax({
					url: "{{route('update-product-size')}}",
					type: 'GET',
					data: {
						qty: qty,
						id:id,
									},
					success: function(data) {
						alert('Số lượng của bạn đã được cập nhật thành công!'); 
						//location.reload();
					},
					error: function($error) {
						alert('Cật nhật số lượng fail!');
					}
				})
				
		});
			
	});
</script>
@stop