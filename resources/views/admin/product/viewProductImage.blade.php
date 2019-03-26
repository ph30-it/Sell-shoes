@extends('admin.master')
@section('title', 'Quản lí ảnh sản phẩm | MV Shoes')
@section('content')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Ảnh Sản Phẩm</h1>
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
								@if(session('status'))
									<div class="alert alert-success">
										{{ session('status') }}
									</div>
							 	@endif
							 	<h4 style="margin-left: 30%">Tên sản phẩm: {{$product_name->name}}</h4>
								<table class="table table-bordered" style="margin-top:20px;text-align: center;">				
									<thead>
										<tr class="bg-primary">
											<th style="text-align: center;">ID</th>
											<th width="" style="text-align: center;">Ảnh sản phẩm</th>
											<th style="text-align: center;">Kiểu</th>
											<th style="text-align: center;">Ngày tạo</th>
											<th style="text-align: center;">Cập nhật</th>
											<th style="text-align: center;">Tùy chọn</th>
										</tr>
									</thead>	
									<tbody>
										@foreach($images as $item)
											<tr>
												<td>{{$item->id}}</td>
												<td><img src="{{asset($item->slug)}}" alt="" width="150px"></td>
												<td>@if($item->status == 1)
														<span class="btn-info">Ảnh Đại Diện</span>
													@else
														<span class="btn-default">Ảnh Mô Tả</span>
													@endif
												</td>
												<td>{{$item->created_at}}</td>
												<td>{{$item->updated_at}}</td>
												<td>
													<a href="{{route('view-edit-type-product-image',$item->id)}}" class="btn btn-info">Sửa</a>
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
	<script type="text/javascript">
</script>
@stop