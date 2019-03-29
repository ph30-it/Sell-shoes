@extends('frontend.master')
@section('title', 'Giỏ hàng')
@section('content')
<script type="text/javascript">
	function updateCart(qty, id){
		/*console.log(qty);	
		console.log(id);*/
		$.get(
			'{{asset('cart/update')}}',  /*url*/
			{qty:qty, id:id},		/*đối tượng*/
			function(){/*phương thức*/
				/*alert('Giỏ hàng của bạn đã được cập nhật thành công^^');*/			
				location.reload();
			}		
			);			
	}
</script>
<script>
    $(document).on('submit', '#formData', function (event) {
    event.preventDefault();
     var formData = $('#formData').serialize();
    $.ajax({
        url: url,
       type: "POST",
       data : formData,   
                success: function (result) {
                    console.log(result);                             
                }
           });
        });

    });
</script>
<div class="container" style="margin-top: 30px">
	<div class="row">
			<ol class="breadcrumb nen1">
				  <li style="padding-bottom: 10px"><a href="{{route('home-user')}}" style="color: #000;text-decoration: none;"><span class="glyphicon glyphicon-home"></span> Trang Chủ</a></li>
				  <li class="active">Giỏ Hàng</li>
				  
			</ol>
	</div>
</div>
@if(Cart::getTotalQuantity() > 0)
<div class="container">
	<div class="row" style="margin-top: -20px">
		<div class="col-sm-9" style="border-right:1px solid #ccc;margin-bottom: 20px">
			<form action="" method="GET">
				<table class="table">
					<thead>
						<tr>
							<th width="30%" style="color: #777;" colspan="3">SẢN PHẨM</th>
							<th class="th1">KÍCH THƯỚC</th>
							<th class="th1">ĐƠN GIÁ</th>
							<th class="th1">SỐ LƯỢNG</th>
							<th class="th1">TỔNG CỘNG</th>
						</tr>
					</thead>
					<tbody>
						@include('frontend.cart.item-cart')
					</tbody>	
				</table>
			</form>
			<a href="{{route('list-all-product')}}"  style="background:#fff;color:#fa2000;padding:10px 86px;border: 2px solid #fa2000;font-weight: bold;text-decoration: none;">
				<span class="glyphicon glyphicon-heart"></span> TIẾP TỤC XEM SẢN PHẨM</a>
		</div>
		<div class="col-sm-3">
			<table class="table table-hover" style="color: #777;">
				<thead>
					<tr>
						<th  width="100%">TỔNG SỐ CỘNG</th>
					</tr>
					<tr>
						<td width="14%"><span class="">Tạm tính:</span><span class="pull-right" style="color: #000"><b>
							{{number_format($total,0)}} ₫</b></span>
						</td>
					</tr>	
					<tr>
						<td>Shipping <span class="pull-right">Giao hàng miễn phí</span></td>
					</tr>
					<tr>
						<td width="14%"><span class="">Tổng cộng:</span><span class="pull-right" style="color: #000"><b>{{number_format($total,0)}} ₫</b></span>
							 
						</td>
					</tr>
					<tr>
						<td style="padding-top: 30px"><a href="{{route('show-checkout-user')}}"  style="background:#3CB371;color:#fff;padding:10px 35px;font-weight:bold;text-decoration: none;">TIẾN HÀNH THÀNH TOÁN</a></td>
					</tr>
				</thead>	
			</table>
		</div> 
	</div>
</div>
@elseif(session('success'))
	<div class="container" style="padding-bottom: 9%">							
		<p class="alert alert-success"><strong>ĐẶT HÀNG THÀNH CÔNG</strong>
			<br><span>{{session('success')}}</span>
		</p>
		<br><a href="{{route('list-all-product')}}"  style="background:#fff;color:#fa2000;padding:10px 86px;border: 2px solid #fa2000;font-weight: bold;text-decoration: none;">
				<span class="glyphicon glyphicon-heart"></span> TIẾP TỤC XEM SẢN PHẨM</a>
	</div>
@else
	<div class="container" style="padding-bottom: 10%">
		Bạn chưa có sản phẩm nào trong giỏ hàng!
		<br><br><a href="{{route('list-all-product')}}"  style="background:#fff;color:#fa2000;padding:10px 86px;border: 2px solid #fa2000;font-weight: bold;text-decoration: none;">
				<span class="glyphicon glyphicon-heart"></span> TIẾP TỤC XEM SẢN PHẨM</a>
	</div>
@endif
@stop