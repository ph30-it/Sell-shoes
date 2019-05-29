		<h3 class="m_3">Đánh giá sản phẩm</h3>
     	<div style="margin-bottom: 30px;" class="col-sm-12">
     					<div class="actionBox" style="margin-top: 20px">
					    </div>		
							<div class="row">
								<div class="col-sm-3">
									<div class="rating-block">
										<h2 class="bold padding-bottom-7">{{number_format($rate['avgRate'],1)}}<small>/ 5</small></h2>
										@for($i = 1; $i <= 5; $i++ )											
										  	<span class="glyphicon glyphicon-star" aria-hidden="true" style="color:dodgerblue; font-size: 20px;"></span>
										 @endfor
											<br><p>{{$rate['totalRate']}} lượt đánh giá</p>
										
									</div>
								</div>
								<div class="col-sm-3">
									<div class="pull-left">
										<div class="pull-left" style="width:35px; line-height:1;">
											<div style="height:9px; margin:5px 0;">5 <span class="glyphicon glyphicon-star"  ></span></div>
										</div>
										<div class="pull-left" style="width:180px;">
											<div class="progress" style="height:9px; margin:8px 0;">
											  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{$rate['fiveStar']}}" aria-valuemin="0" aria-valuemax="5" style="width: 1000%">
												<span class="sr-only">80% Complete (danger)</span>
											  </div>
											</div>
										</div>
										<div class="pull-right" style="margin-left:10px;">{{$rate['fiveStar']}}</div>
									</div>
									<div class="pull-left">
										<div class="pull-left" style="width:35px; line-height:1;">
											<div style="height:9px; margin:5px 0;">4 <span class="glyphicon glyphicon-star"></span></div>
										</div>
										<div class="pull-left" style="width:180px;">
											<div class="progress" style="height:9px; margin:8px 0;">
											  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="{{$rate['fourStar']}}" aria-valuemin="0" aria-valuemax="5" style="width: 80%">
												<span class="sr-only">80% Complete (danger)</span>
											  </div>
											</div>
										</div>
										<div class="pull-right" style="margin-left:10px;">{{$rate['fourStar']}}</div>
									</div>
									<div class="pull-left">
										<div class="pull-left" style="width:35px; line-height:1;">
											<div style="height:9px; margin:5px 0;">3 <span class="glyphicon glyphicon-star"></span></div>
										</div>
										<div class="pull-left" style="width:180px;">
											<div class="progress" style="height:9px; margin:8px 0;">
											  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3" aria-valuemin="{{$rate['threeStar']}}" aria-valuemax="5" style="width: 60%">
												<span class="sr-only">80% Complete (danger)</span>
											  </div>
											</div>
										</div>
										<div class="pull-right" style="margin-left:10px;">{{$rate['threeStar']}}</div>
									</div>
									<div class="pull-left">
										<div class="pull-left" style="width:35px; line-height:1;">
											<div style="height:9px; margin:5px 0;">2 <span class="glyphicon glyphicon-star"></span></div>
										</div>
										<div class="pull-left" style="width:180px;">
											<div class="progress" style="height:9px; margin:8px 0;">
											  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="{{$rate['towStar']}}" aria-valuemin="0" aria-valuemax="5" style="width: 40%">
												<span class="sr-only">80% Complete (danger)</span>
											  </div>
											</div>
										</div>
										<div class="pull-right" style="margin-left:10px;">{{$rate['towStar']}}</div>
									</div>
									<div class="pull-left">
										<div class="pull-left" style="width:35px; line-height:1;">
											<div style="height:9px; margin:5px 0;">1 <span class="glyphicon glyphicon-star"></span></div>
										</div>
										<div class="pull-left" style="width:180px;">
											<div class="progress" style="height:9px; margin:8px 0;">
											  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="{{$rate['oneStar']}}" aria-valuemin="0" aria-valuemax="5" style="width: 20%">
												<span class="sr-only">80% Complete (danger)</span>
											  </div>
											</div>
										</div>
										<div class="pull-right" style="margin-left:10px;">{{$rate['oneStar']}}</div>
									</div>
								</div>			
							</div>			
							
							<div class="row">
								<div class="col-sm-7">
									<hr/>
									<div class="review-block">
									@foreach($comments as $comment)
										<form action="{{route('delete-comment-user',$comment->id)}}" method="POST">
							           				@csrf
													@method('DELETE')
											<div class="row">
												<div class="col-sm-3">
													<img src="{{asset($comment->user->avatar)}}" class="img-circle" width="50px;">
													<div class="review-block-name"><a href="#">{{$comment->name}}</a></div>
													<div class="review-block-date">{{ date('d/m/Y H:i:s', strtotime($comment->date)) }}</div>
												</div>
												<div class="col-sm-9">
													<div class="review-block-rate">
														@for($i=1; $i<=5; $i++)
															@if($i <= $comment->rating)
																<span class="glyphicon glyphicon-star" aria-hidden="true" style="color:dodgerblue; font-size: 20px;"></span>
															@else
																<span class="glyphicon glyphicon-star" aria-hidden="true" style="color:#ccc; font-size: 20px;"></span>
															@endif
														@endfor
													</div>
													<div class="review-block-title">
														@if($comment->rating == 1)
															Rất tệ (1 sao)
														@elseif($comment->rating == 2)
															Tệ (2 sao)
														@elseif($comment->rating == 3)
															Trung bình (3 sao)
														@elseif($comment->rating == 4)
															Tốt (4 sao)
														@elseif($comment->rating == 5)
															Xuất sắc (5 sao)
														@else
															Chưa có đánh giá sao
														@endif
													</div>
													<div class="review-block-description">{{$comment->content}}</div>
													@if(Auth::check() && $comment->user_id == Auth::user()->id)
													<button type="submit" style="font-size: 13px;background: #fff;border: none;color: blue;margin-top: 5px;" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa đánh giá</button>
													@endif
												</div>
											</div>

											<hr/>
										</form>
									@endforeach
									</div>
								</div>
							</div>
					    <div class="row" style="background-color:#FAFAFA;border: 1px solid #EFEFEF;">
							<div class="col-sm-7">
						    	<div class="well-sm" >
								@if(Auth::check())
						            <div class="text-left">
						                <a href="#reviews-anchor" class="btn" id="open-review-box" style=" background-color: #ee4d2d; color: #fff; border: none; padding: 10px 17px; border-radius: 3px;margin-right: 5px;">Viết bình luận</a>
						            </div>
						        
						            <div class="row" id="post-review-box" style="display:none;border-radius: 0;">
						                <div class="col-md-12">
						                    <form accept-charset="UTF-8" action="{{route('user-comment-product',$product->id)}}" method="POST" >
						                    	@csrf
						                    	<div class="row">
						                    		<div class="col-sm-2">
						                    			<img src="{{asset(Auth::user()->avatar)}}" class="img-circle" width="70px">
						                    			<div class="review-block-name"><a href="#">{{Auth::user()->name}}</a></div>
						                    		</div>
						                    		<div class="col-sm-10">
						                    			 <input id="ratings-hidden" name="rating" type="hidden">
						                    			  <textarea class="form-control animated" cols="50" name="content" placeholder="Viết bình luận của bạn..." rows="7" style="height: 85px;margin-left: -20px;border-radius: 0;"></textarea> 
						                    			  <div class="review-block-name"><a href="#">Không phải</a> bạn?</div>
						                    			  @if($errors->has('content'))
							    							<span class="" style="color:red;font-size: 13px">{{$errors->first('content')}}</span>
							    						@endif
						                    		</div>
						                    	</div>
						                        <div class="text-right">
						                            <div class="stars starrr" data-rating="0"></div>
						                            <a href="#" class="btn btn-default" id="close-review-box" style="display:none; margin-right: 10px; border: none; padding: 10px 17px; border-radius: 3px;margin-right: 5px;">
						                            <span class="glyphicon glyphicon-remove"></span>Cancel</a>
						                            <button type="submit" style=" background-color: #ee4d2d; color: #fff; border: none; padding: 10px 17px; border-radius: 3px;margin-right: 5px;">Bình luận</button>
						                        </div>
						                    </form>
						                </div>
						            </div>
						            @else
						            	<a href="{{route('login')}}">Đăng nhập</a> ngay để viết đánh giá của bạn!!
						            @endif
						        </div> 
							</div>
						</div>
		</div>
    </div>