						<form action="{{route('comment-product',$product->id)}}" method="POST" role="form">
							@csrf()
							<div class="form-group">
								<label for="">Tên:</label>
								<input type="text" name="name" class="form-control" id="" placeholder="Họ Tên của bạn">
								@if($errors->has('name'))
    								<span class="" style="color:red;font-size: 13px">{{$errors->first('name')}}</span>
    							@endif
							</div>
							<div class="form-group">
								<label for="">Email:</label>
								<input type="email" name="email" class="form-control" id="" placeholder="Email của bạn">
								@if($errors->has('email'))
    								<span class="" style="color:red;font-size: 13px">{{$errors->first('email')}}</span>
    							@endif
							</div>
							<div class="form-group">
								<label for="textara">Nội dung:</label><br>
								<textarea name="content" cols="86" rows="2" placeholder="Nhập bình luận của bạn..." style="padding: 10px"></textarea>
								@if($errors->has('content'))
    								<span class="" style="color:red;font-size: 13px">{{$errors->first('content')}}</span>
    							@endif
							</div>		
							<button type="submit" class="btn btn-info" style="border-radius: 0;padding: 10px 50px;">Bình Luận</button>
						</form>