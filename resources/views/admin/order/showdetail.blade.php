
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
					<div class="panel-heading">Chi tiết đơn hàng</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								@if(session('status'))
									<div class="alert alert-danger">
										{{ session('status') }}
									</div>
							 	@endif
							 	<div class="col-lg-8" style="line-height: 30px">
							 		<p><b style="color: #000">Họ tên người nhận:</b> {{$customer->name}}</p>
							 	<p><span style="font-weight: bold;color: #000">Số điện thoại:</span> {{$customer->phone}}</p>
							 	<p><b style="color: #000">Địa chỉ nhận hàng:</b> {{$customer->address}}</p>
							 	<p><b style="color: #000">Email:</b> <a>{{$customer->email}}</a></p>
							 	<p><b style="color: #000">Tình trạng đơn hàng:
							 	</b> 
										@if($customer->order->status == 0)
											<span class="btn btn-default" style="padding: 1px 7px">Đơn mới</span>
										@elseif($customer->order->status == 1)
											<span class="btn btn-success" style="padding: 1px 7px">Đã duyệt</span>
										@elseif($customer->order->status == 2)
											<span class="btn btn-info" style="padding: 1px 7px">Đang giao</span>
										@elseif($customer->order->status == 3)
											<span class="btn btn-primary" style="padding: 1px 7px">Đã giao</span>
										@elseif($customer->order->status == 4)
											<span class="btn btn-danger" style="padding: 1px 7px">Đã hủy</span>
										@endif
							 	</p>
							 	</div>
							 	<div class="col-lg-4">
							 		<p style="border: 1px solid #ccc; display: inline-block; padding: 15px"><span style="color: #000;font-weight: bold;">Ngày đặt: </span>{{date('d/m/Y H:i:s', strtotime($customer->order->date))}}</p>
							 	</div>
								<table class="table table-bordered" style="margin-top:20px;text-align: center;font-size: 12px;width: 60%;">				
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
												<td><img src="{{asset($image->slug)}}" alt="" width="100px"></td>
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
										@if($item->order->status == 0)
											<option value="1">Duyệt đơn</option>
											<option value="4">Hủy đơn</option>	
										@else
											<option value="2">Đang giao</option>
											<option value="3">Đã giao</option>
											<option value="4">Hủy đơn</option>
										@endif
										<!-- <option value="0" @if($item->order->status == 0) selected @endif >Đơn mới</option>
										<option value="1"@if($item->order->status == 1) selected @endif>Đã duyệt</option>
										<option value="2"@if($item->order->status == 2) selected @endif>Đang giao</option>
										<option value="3"@if($item->order->status == 3) selected @endif>Đã giao</option>
										<option value="4" @if($item->order->status == 4) selected @endif>Đã hủy</option> -->
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