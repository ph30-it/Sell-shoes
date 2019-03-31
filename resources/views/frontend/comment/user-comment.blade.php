						<form action="{{route('user-comment-product',$product->id)}}" method="POST" role="form">
							@csrf()
							<p><span style="color: #4CAF50">{{Auth::user()->name}}</span> ơi, Hãy bình luận gì đó!. <a href="{{route('logout')}}">Không phải</a> bạn?</p>
							<div class="form-group">
								<p><span style="font-weight: bold;">Email:</span><a> {{Auth::user()->email}}</a></p>
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