
@extends('admin.master')
@section('title', 'Xem chi tiết đơn hàng| MV Shoes')
@section('content')

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Chi tiết đơn hàng</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">Danh sách chi tiết đơn hàng</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								@if(session('status'))
									<div class="alert alert-danger">
										{{ session('status') }}
									</div>
							 	@endif
								<table class="table table-bordered" style="margin-top:20px;text-align: center;font-size: 13px">				
									<thead>
										<tr class="bg-primary">
											<th style="text-align: center;">ID</th>
											<th width="20%" style="text-align: center;">Tên sản phẩm</th>
											<th style="text-align: center;">Ảnh sản phẩm</th>
											<th style="text-align: center;">Kích thước</th>
											<th style="text-align: center;">Số lượng mua</th>
											<th style="text-align: center;">Giá gốc(VNĐ)</th>
											<th width="10%" style="text-align: center;">Khuyến mãi(%)</th>
											<th width="15%" style="text-align: center;" width="20%">Giá khuyến mãi(VNĐ)</th>
										</tr>
									</thead>
									<tbody>
										@foreach($order as $item)
											<?php 
												$image = App\Image::select('slug')->where('product_id',$item->product_id)->first();
											 ?>
											<tr>
												<td>{{$item->id}}</td>
												<td>{{$item->product->name}}</td>
												<td><img src="{{asset($image->slug)}}" alt="" width="150px"></td>
												<td>{{$item->size->name}}</td>
												<td>{{$item->quantity}}</td>
												<td>{{number_format($item->price,0)}} ₫</td>
												<td>{{$item->sale}}</td>
												<td>{{number_format($item->pricesale,0)}} ₫</td>
											</tr>
										@endforeach
									</tbody>
								</table>
								<p style="font-size: 18px"><span style="color: #000; font-weight: bold;margin-right: 10px">Tổng tiền:</span><span>{{number_format($item->order->total)}} ₫</span></p>
								<p style="font-size: 18px"><span style="color: #000; font-weight: bold;margin-right: 10px">Hình thức thanh toán: </span><span>{{$item->order->payment}}</span></p>

								<form action="{{route('status-detail-order',$item->order->id)}}" method="POST">
									@csrf
									<label>--Trạng thái đơn hàng</label>
									<select name="status" id="" class="form-control" style="width:30%;margin-bottom:20px;background:#FFEBCD">
										<option value="0" @if($item->order->status == 0) selected @endif >Đơn mới</option>
										<option value="1"@if($item->order->status == 1) selected @endif>Đã duyệt</option>
										<option value="2"@if($item->order->status == 2) selected @endif>Đang giao</option>
										<option value="3"@if($item->order->status == 3) selected @endif>Đã giao</option>
										<option value="4" @if($item->order->status == 4) selected @endif>Đã hủy</option>
									</select>
										@if($errors->has('status'))
			    							<span class="" style="color:red;font-size: 13px;">{{$errors->first('status')}}</span><br>
			    						@endif
										<button type="submit" class="btn btn-success">Xử lí</button>
										<a href="{{route('order-admin')}}" class="btn btn-danger">Quay lại</a>	
								</form>
								
																
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
@stop