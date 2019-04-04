
@extends('admin.master')
@section('title', 'Quản lý đơn hàng | MV Shoes')
@section('content')

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Đơn hàng</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">Danh sách đơn hàng</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								@if(session('status'))
									<div class="alert alert-success" style="margin-top: 15px">
										{{ session('status') }}
									</div>
							 	@endif
							 	
							 		<div style="float: left;width: 50%; margin-right: 20px">
							 			<input type="search" id="searchOrder" name="searchOrder" class="form-control" placeholder="Tìm kiếm đơn hàng theo tên, email, sđt...">
							 		</div>
							 		<div class="form-group" style="width: 20%;float: left;">
							 		<select name="status" id="orderStatus" class="form-control" style="background:#FFEBCD;">
										<option value="all">--Lọc đơn hàng theo trạng thái</option>
										<option value="0">Đơn mới(Chưa xử lí)</option>
										<option value="1">Đã duyệt (Đã xử lí)</option>
										<option value="2">Đang giao</option>
										<option value="3">Đã giao</option>
										<option value="4">Đã hủy</option>
							 		</select>
							 		
							 	</div>
								<table class="table table-bordered" style="margin-top:20px;text-align: center;">				
									<thead>
										<tr class="bg-primary">
											<th style="text-align: center;">ID</th>
											<th width="10%" style="text-align: center;">Người Nhận</th>
											<th style="text-align: center;">Email</th>
											<th style="text-align: center;">Ngày Đặt</th>									<th width="15%" style="text-align: center;" width="20%">Địa Chỉ</th>
											<th style="text-align: center;">Số ĐT</th>
											<th style="text-align: center;" width="20%">Ghi Chú</th>
											<th width="8%" style="text-align: center;">Trạng thái</th>
											<th style="text-align: center;">Tùy chọn</th>
										</tr>
									</thead>
									<tbody id="getOrder">
										
											@foreach($order as $item)
												<tr>
													<td>{{$item->id}}</td>
													<td>{{$item->customer->name}}</td>
													<td>{{$item->customer->email}}</td>
													<td>{{$item->date}}</td>
													<td>{{$item->customer->address}}</td>
													<td>{{$item->customer->phone}}</td>
													@if(empty($item->customer->note))
														<td>Không có!</td>
													@else
														<td>{{$item->customer->note}}</td>
													@endif
													<td>@if($item->status == 0)
															<span class="btn btn-default" style="padding: 1px 7px">Đơn mới</span>
														@elseif($item->status == 1)
															<span class="btn btn-success" style="padding: 1px 7px">Đã duyệt</span>
														@elseif($item->status == 2)
															<span class="btn btn-info" style="padding: 1px 7px">Đang giao</span>
														@elseif($item->status == 3)
															<span class="btn btn-primary" style="padding: 1px 7px">Đã giao</span>
														@elseif($item->status == 4)
															<span class="btn btn-danger" style="padding: 1px 7px">Đã hủy</span>
														@endif
													</td>
													<td>
														<a href="{{route('detail-order',$item->id)}}" class=""><span class="btn glyphicon glyphicon-search"></span></a><br>
														<form action="{{route('delete-order',$item->id)}}" method="POST">
															@csrf
															@method('DELETE')
															<button onclick="return confirm('Bạn có chắc chắn muốn xóa?')"  type="submit" style="border: none; background: #fff"><span class="glyphicon glyphicon-trash" style="color: #d9534f;"></span></button>
														</form>
													</td>
												</tr>
											@endforeach
											
									</tbody>
								</table>				
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
<script>
	$(document).ready(function($) {
		//Order filter by status
		$('#orderStatus').change(function(event) {
			var status = $(this).val();
			//alert(status);
			$.ajax({
				url: 'order/'+status+'/order-filter-by-status',
				type: 'GET',
				data: {						
					status:status,
								},
				success: function(data) {
					//alert(data); 
					$("#getOrder").html(data);
					
					//location.reload();
				},
				error: function($error) {
					alert('Thao tác thất bại!');
				}
			})
		});
		//search order
		$('#searchOrder').keyup(function(event) {
				var search = $(this).val();
				//alert(search);
				$.ajax({
					url: 'order/search-order',
					type: 'GET',
					data: {						
						search:search,
									},
					success: function(data) {
						//alert(data); 
						$("#getOrder").html(data);
					},
					error: function($error) {
						alert('Thao tác thất bại!');
					}
				})
			});
});
	
</script>
@stop