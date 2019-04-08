						@if($products->isEmpty())
							<p style="margin-left: 20px">Không có sản phẩm nào!</p>
						@else
							@foreach($products as $product)
					     	<div class="col-sm-3">
					    	<div style="border: 1px solid #ccc; padding: 2%; padding-left: 0; padding-bottom: 0;margin-bottom: 30px;height: 100%">
					    		<div class="view view-fifth">
								  	  <div class="top_box" style="position: relative;">
								  	  	<span style="border-radius: 50px;padding: 7px 4px;background:#ff6517;color:#fff;font-size: 12px;position: absolute; top: 0px;right: 0;">{{$product->sale}}%</span>
									  	<h3 class="m_1">
									  		<a href="{{asset('detail/'.$product->id.'/'.$product->slug.'.html')}}" style="color: #000;text-decoration: none;">{{$product->name}}
									  		</a>
									  	</h3>
									  	<p class="m_2">{{$product->brand->name}}</p>
								         <div class="grid_img">
										   <div class="css3">
										   	<a href="{{asset('detail/'.$product->id.'/'.$product->slug.'.html')}}">	
										   		@foreach ($product->images as $item)
													<?php $image['slug'] = $item->slug;	 ?>	 	
												@endforeach		
												<img src="{{asset($image['slug'])}}" alt=""/>
										   	</a>
										   </div>
									          <div class="mask">
					                       		<div class="info"><a href="{{asset('detail/'.$product->id.'/'.$product->slug.'.html')}}" style="color: #fff;text-decoration: none;">Xem chi tiết</a></div>
							                  </div>
					                    </div>
				                       <div><span style="margin-right: 10px" class="price-del"><del>{{number_format($product->price)}} ₫</del></span><span class="price">{{number_format($product->price - ($product->price*$product->sale/100))}} ₫</span></div>
									   </div>
									    </div>
									   
									   	@csrf
									   <span class="rating" style="line-height: 10px">
									   		<span style="margin-left: 7px">Chọn một kích thước</span><br>
									   		<?php $quantity = 0; ?>
											@foreach ($product->productSizes as $productSize) 
												 	<?php $quantity += $productSize->quantity; ?>	
											@endforeach

									   		@foreach($product->productSizes as $productSize)
									   				@if($quantity > 0) <!-- còn hàng -->				   	
											   			@if($productSize->quantity == 0)
											   				<span class="nav" style="float:left; " style="padding: 0">
															  <li role="presentation" class="disabled" ><a  style="padding: 3.8px 4.5px;border: 1px solid #ccc;margin-top:10px;margin-right: 3px">
															  		@foreach($product->sizes as $size)
																		@if($productSize->size_id == $size->id) 
																			{{$size->name}}	
																		@endif
																	@endforeach
															  </a></li>
															</span>
											   			@else
											   				<span class="nav" style="float: left;">
											   				<li><label for="{{'custom_radio'.$productSize->id}}" style="margin-right: 4px">
												   				<input type="radio" value="{{$productSize->size_id}}" name=size id="{{'custom_radio'.$productSize->id}}" class="productSize">
												   				<span>
																	@foreach($product->sizes as $size)
																		@if($productSize->size_id == $size->id) 
																			{{$size->name}}	
																		@endif
																	@endforeach
												   				</span>
											   				</label></li></span>
											   			@endif
											   		@else
											   			<span class="nav" style="float:left; " style="padding: 0">
														  <li role="presentation" class="disabled" ><a  style="padding: 3.8px 4.5px;border: 1px solid #ccc;margin-top:10px;margin-right: 3px">
														  	@foreach($product->sizes as $size)
																@if($productSize->size_id == $size->id) 
																	{{$size->name}}	
																@endif
															@endforeach
														  </a></li>
														</span>
											   		@endif	
									   		@endforeach
						    	      </span>
										 <ul class="list">
										  <li>
										  	@if($quantity > 0)
										  		<ul class="icon1 sub-icon1 profile_img">
												  <li><button class="active-icon c1 addCart" style="text-decoration: none; background: #000;color: #fff; border: none;" data-id="{{$product->id}}">+ Thêm Vào Giỏ </button>
													<ul class="sub-icon1 list">
														<li><h3>{{$product->name}}</h3><a href=""></a></li>
														<li><p>
															@if(empty($product->description))
																Chưa có mô tả nào! <br>
															@else
																{{$product->description}}
															@endif
															<a href="">Mạnh Viết - CIT</a>
															</p>
														</li>
													</ul>
												  </li>
											 </ul>
										  	@else
										  		<ul class="icon1 sub-icon1 profile_img nav">
												  <li role="presentation" class="disabled">
												  	<button class="c1 btn" disabled="disabled" style="text-decoration: none;color:#fff;border:none;padding:11px 0;background:#000">
												  		<span>Tạm Hết Hàng</span>	
												  		<!-- <button class="btn btn-success" style="margin-right: 10px;padding: 10px; border-radius: 0" disabled="disabled"></span>TẠM HẾT HÀNG</button>		 -->			  
												  </button>
													<ul class="sub-icon1 list">
														<li><h3>{{$product->name}}</h3><a href=""></a></li>
														<li><p>
															@if(empty($product->description))
																Chưa có mô tả nào! <br>
															@else
																{{$product->description}}
															@endif
															<a href="">Mạnh Viết - CIT</a>
															</p>
														</li>
													</ul>
												  </li>
											 </ul>
										  	@endif
										   </li>
									     </ul>
									     
							    	    <div class="clear"></div>
							    	</a>
					    	</div>
					     </div>
					     @endforeach
					   @endif