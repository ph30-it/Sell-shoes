						<p id="textcheckout1">Bạn đã có tài khoản? <a href="{{route('login')}}">Đăng nhập</a></p>
						<form action="{{route('checkout-user')}}" method="POST">
							@csrf()
							<div class="form-group">
								<label for="">Tên Người Nhận:</label>
								<input required type="text" name="name" placeholder="Họ và tên" class="form-control">
							</div>
							<div class="form-group">
								<label for="">Email:</label>
								<input required type="email" name="email" placeholder="Email" class="form-control">
							</div>
							<div class="form-group">
								<label for="">Địa chỉ nhận hàng:</label>
								<input required type="text" name="address" placeholder="Địa chỉ" class="form-control">
							</div>
							<div class="form-group">
								<label for="">Số điện thoại người nhận:</label>
								<input required type="tel" name="phone" placeholder="Số điện thoại" class="form-control">
							</div>
							<div class="form-group">
								<label for="">Hình thức thanh toán:</label> 
								<input required type="radio" name="payment" value="COD" required><span>Nhận hàng thanh toán(COD)</span>
								<input required type="radio" name="payment" value="ATM" required><span>Chuyển khoản(ATM)</span>
							</div>
							<div class="form-group">
								<label for="">Ghi chú:</label><br>
								<textarea name="note" id="" cols="72" rows="2" style="padding: 10px;"></textarea>
							</div>
							<div class="form-group">
								<a href="{{route('shoppingCart-user')}}">< QUAY LẠI GIỎ HÀNG</a>
								<button class="btn btnkout" type="submit" name="order">ĐẶT HÀNG</button>
							</div>
						</form>