<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thông tin xác nhận đơn hàng</title>
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/detail1.css')}}">
	<link rel="stylesheet" href="{{asset('css/bootstrap-theme.min.css')}}">
	<script src="{{asset('js/jquery.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
</head>
<body>
<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6">
					<div class="divkout2" style="margin-top: -30px">
						<a href="{{route('home-user')}}"><img src="{{asset('images/logo2.png')}}" alt="" style="width: 50%" ></a>
						<ol class="breadcrumb nen1">
							 <li><a href="{{route('shoppingCart-user')}}" style="color: #000">Giỏ Hàng</a></li>
							 <li class="active">Thông tin xác nhận đơn hàng</li>
							  
						</ol>
						<h4>Thông tin xác nhận đơn hàng</h4>
						@if(Auth::check())
							@include('frontend.checkout.checkout1')
						@else
							@include('frontend.checkout.checkout2')	
						@endif
					</div>
				</div>
				<div class="col-sm-6">
					<div class="divkout1" style="padding-bottom: 92%">
						<div class="row divrow1">
							@foreach($items as $item)
										<div class="col-sm-12 imgkout">
											<img src="{{asset($item->attributes->image)}}" alt='' class='imgcheckout'>
											<span class="koutsl">{{$item->quantity}}</span>
											<span class="spankout1">{{$item->name}}</span>
											<span class="spankout1">
												{{ number_format(($item->price*$item->quantity),0)}}
											₫</span>
										</div>
							@endforeach
							<div class="col-sm-12 divtong">					
								<span class="spantong">Tổng cộng:</span><span style="margin-left: 45%">VND</span> <span class="spantongtien"> {{number_format($total,0)}} ₫</span>
							</div>
						</div>
					</div>
				</div>
			</div>
	
	</div>
</body>
</html>