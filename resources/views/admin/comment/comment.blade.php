
@extends('admin.master')
@section('title', 'Bình luận sản phẩm | MV Shoes')
@section('content')

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Bình luận</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">Bình luận sản phẩm</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								@if(session('status'))
									<div class="alert alert-success">
										{{ session('status') }}
									</div>
							 	@endif
								<table class="table table-bordered" style="margin-top:20px;text-align: center;">				
									<thead>
										<tr class="bg-primary">
											<th style="text-align: center;">ID</th>
											<th width="10%" style="text-align: center;">Họ tên</th>
											<th width="14%" style="text-align: center;">Email</th>
											<th width="5%" style="text-align: center;">Cấp</th>
											<th width="15%" style="text-align: center;">Tên sản phẩm</th>
											<th style="text-align: center;">Ảnh sản phẩm</th>
											<th width=20%" style="text-align: center;">Nội dung</th>
											<th width="10%" style="text-align: center;" width="20%">Ngày bình luận</th>
											<th style="text-align: center;">Tùy chọn</th>
										</tr>
									</thead>
									<tbody>
										@foreach($comments as $comment)
											<?php $image = App\Image::select('slug')->where('product_id',$comment->product->id)->where('status',1)->first();
												if (empty($image)) {
													$image['slug'] = 'images/image.png';
												}
											 ?>
											<tr>
												<td>{{$comment->id}}</td>
												<td>{{$comment->name}}</td>
												<td>{{$comment->email}}</td>
												@if($comment->user_id > 0)
													<td><span class="btn-warning">User {{$comment->user_id}}</span></td>
												@else
													<td><span class="btn-default">None</span></td>
												@endif
												<td>{{$comment->product->name}}</td>
												@if($image['slug'])
													<td><img src="{{asset($image['slug'])}}" alt="" width="150px"></td>
												@else
													<td><img src="{{asset($image->slug)}}" alt="" width="150px"></td>
												@endif
												<td>{{$comment->content}}</td>
												<td>{{$comment->date}}</td>
												<td>
													
													<a href="{{route('show-edit-comment',$comment->id)}}"><span class="glyphicon glyphicon-pencil" style="color: #f0ad4e;"></span></a>
													<form action="{{route('delete-comment',$comment->id)}}" method="POST">
														@method('DELETE')
														@csrf
														<button
														onclick="return confirm('Bạn có chắc chắn muốn xóa?')" style="border: none; background: #fff;" ><span class="btn glyphicon glyphicon-trash" style="color: #d9534f;"></span></button>
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
@stop