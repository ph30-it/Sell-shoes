						<p id="textcheckout1">Bạn đã có tài khoản? <a href="{{route('login')}}">Đăng nhập</a></p>
						<form action="{{route('checkout-user')}}" method="POST">
							@csrf()
							<div class="form-group">
								<label for="">Tên Người Nhận:</label>
								<input  type="text" name="name" placeholder="Họ và tên" class="form-control" value="{{old('name')}}">
								@if($errors->has('name'))
	    							<p class="" style="color: red">{{$errors->first('name')}}</p>
	    						@endif
							</div>
							<div class="form-group">
								<label for="">Email:</label>
								<input type="text" name="email" placeholder="Email" class="form-control" value="{{old('email')}}">
								@if($errors->has('email'))
	    							<p class="" style="color: red">{{$errors->first('email')}}</p>
	    						@endif
							</div>
							<div class="form-group">
								<label for="">Địa chỉ nhận hàng:</label>
								<input type="text" name="address" placeholder="Địa chỉ" class="form-control" value="{{old('address')}}">
								@if($errors->has('address'))
	    							<p class="" style="color: red">{{$errors->first('address')}}</p>
	    						@endif
							</div>
							<div class="form-group">
								<label for="">Số điện thoại người nhận:</label>
								<input type="tel" name="phone" placeholder="Số điện thoại" class="form-control" value="{{old('phone')}}">
								@if($errors->has('phone'))
	    							<p class="" style="color: red">{{$errors->first('phone')}}</p>
	    						@endif
							</div>
							<div class="form-group">
								<label for="">Hình thức thanh toán:</label> 
								<input  type="radio" name="payment" value="COD" {{ old('payment')=="COD" ? 'checked='.'"checked"' : '' }}><span>Nhận hàng thanh toán(COD)</span>
								<input  type="radio" name="payment" value="ATM" {{ old('payment')=="ATM" ? 'checked='.'"checked"' : '' }}><span>Chuyển khoản(ATM)</span>
								@if($errors->has('payment'))
	    							<p class="" style="color: red">{{$errors->first('payment')}}</p>
	    						@endif
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