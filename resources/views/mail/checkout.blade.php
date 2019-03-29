<div>
	<h3 style="color:#FFAF02">Quý khách đã đặt hàng thành công!</h3>
	<p>Hóa đơn của quý khách đã được chuyển đến Địa Chỉ Email có trong phần Thông tin khách hàng của chúng tôi</p>
	<p>Sản Phẩm sẽ được chuyển đến sau 3 đến 4 tính từ thời điểm đặt hàng</p>
	<p>Cảm ơn quý khách đã mua hàng tại website của chúng tôi</p>
</div>
<div>
	<h3 style="color: #FFAF02">Thông tin khách hàng</h3>
	<p>
		<strong>Khách hàng:</strong> {{$name}}
	</p>
	<p>
		<strong>Email:</strong> {{$email}}
	</p>
	<p>
		<strong>Điên thoại:</strong> {{$phone}}
	</p>
	<p>
		<strong>Địa chỉ:</strong> {{$address}}
	</p>	
	<p>
		<strong>Hình thức thanh toán:</strong> {{$payment}}
	</p>
</div>
<div>
	<h3 style="color: #FFAF02">Hóa đơn mua hàng</h3>
	<table border="1" style="border-collapse: collapse;text-align: center; padding: 2px">
		<tr style="">
			<th>Tên sản phẩm</th>
			<th>Kích thước</th>
			<th>Đơn giá</th>
			<th>Số lượng</th>
			<th>Thành tiền</th>
		</tr>
		@foreach($items as $item)
		<tr>
			<td>{{$item->name}}</td>
			<th>{{$item->attributes->size}}</th>
			<td style="color: #ed4e4e">{{number_format($item->price)}} ₫</td>
			<td>{{$item->quantity}}</td>
			<td style="color: #ed4e4e">{{number_format($item->price*$item->quantity)}} ₫</td>
		</tr>
		@endforeach
		<tr>
			<td>Tổng tiền(VNĐ):</td>
			<td colspan="4" align="right" style="color: #ed4e4e">{{number_format($total)}} ₫</td>
		</tr>
	</table>
</div>