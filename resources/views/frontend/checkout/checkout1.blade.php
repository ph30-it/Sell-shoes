						<form action="{{route('checkout-user')}}" method="POST">
							@csrf()
							<div>
								<table>
									<tr>
										<td><img src="{{asset(Auth::user()->avatar)}}" class="img-circle" alt="" style="width:50px;margin-bottom: 20px;margin-right: 20px;" ></td>
										<td>
											<span>{{Auth::user()->name}} ({{Auth::user()->email}}) </span>
											<br><a href="{{route('logout')}}">Đăng Xuất</a>
										</td>
									</tr>
								</table>
							</div>
							<div class="form-group">
								<label for="">Tên Người Nhận:<span style="color: red;font-size: 15px">*</span></label>
								<input type="text" name="name" placeholder="Họ và tên" class="form-control" value="{{Auth::user()->name}}">
								@if($errors->has('name'))
	    							<p class="" style="color: red">{{$errors->first('name')}}</p>
	    						@endif
							</div>
							<div class="form-group">
								<label for="">Email:<span style="color: red;font-size: 15px">*</span></label>
								<input type="text" name="email" placeholder="Email" class="form-control" value="{{Auth::user()->email}}">
								@if($errors->has('email'))
	    							<p class="" style="color: red">{{$errors->first('email')}}</p>
	    						@endif
							</div>
							<div class="form-group">
								<label for="">Địa chỉ nhận hàng:<span style="color: red;font-size: 15px">*</span></label>
								<input  type="text" name="address" placeholder="Địa chỉ" class="form-control" value="{{old('address')}}">
								@if($errors->has('address'))
	    							<p class="" style="color: red">{{$errors->first('address')}}</p>
	    						@endif
							</div>
							<div class="form-group">
								<label for="">Số điện thoại người nhận:<span style="color: red;font-size: 15px">*</span></label>
								<input  type="tel" name="phone" placeholder="Số điện thoại" class="form-control" value="{{old('phone')}}">
								@if($errors->has('phone'))
	    							<p class="" style="color: red">{{$errors->first('phone')}}</p>
	    						@endif
							</div>
							<div class="form-group">
								<label for="">Hình thức thanh toán:<span style="color: red;font-size: 15px">*</span></label> 
								<input type="radio" name="payment" value="COD"  {{ old('payment')=="COD" ? 'checked='.'"checked"' : '' }}  ><span>Nhận hàng thanh toán(COD)</span>
								<input type="radio" name="payment" value="ATM" {{ old('payment')=="ATM" ? 'checked='.'"checked"' : '' }} ><span>Chuyển khoản(ATM)</span>
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
								<button class="btn btnkout" type="submit">ĐẶT HÀNG</button>
							</div>
						</form>