						@foreach($products as $product)
				     	<?php 
				     		$image = App\Image::select('slug')->where('product_id',$product->id)->where('status',1)->orderBy('updated_at','desc')->first();
				     		$sizes = App\ProductSize::with('size')->where('product_id',$product->id)->orderBy('size_id','asc')->get();
				     		
				     		if(empty($image)){
							 	 $image['slug'] = 'images/image.png';
							 }
				     	 ?>
				     	<div class="col-sm-3">
				    	<div style="border: 1px solid #ccc; padding: 2%; padding-left: 0; padding-bottom: 0;margin-bottom: 30px;height: 100%">
				    		<div class="view view-fifth">
							  	  <div class="top_box">
								  	<h3 class="m_1">
								  		<a href="{{asset('detail/'.$product->id.'/'.$product->slug.'.html')}}" style="color: #000;text-decoration: none;">{{$product->name}}</a>
								  		
								  	</h3>
								  	<p class="m_2">{{$product->brand->name}}</p>
							         <div class="grid_img">
									   <div class="css3">
									   	<a href="{{asset('detail/'.$product->id.'/'.$product->slug.'.html')}}">
									   		@if($image['slug'])
									   			<img src="{{asset($image['slug'])}}" alt=""/>
									   		@else
												<img src="{{asset($image->slug)}}" alt=""/>
									   		@endif
									   	</a>
									   </div>
								          <div class="mask">
				                       		<div class="info"><a href="{{asset('detail/'.$product->id.'/'.$product->slug.'.html')}}" style="color: #fff;text-decoration: none;">Xem chi tiết</a></div>
						                  </div>
				                    </div>
			                       <div><span style="margin-right: 10px" class="price-del"><del>{{number_format($product->price)}} ₫</del></span><span class="price">{{number_format($product->price - ($product->price*$product->sale/100))}} ₫</span></div>
								   </div>
								    </div>
								   <form  id="formData" name="form">
								   	@csrf
								   <span class="rating" style="line-height: 10px">
								   		<span style="margin-left: 7px">Chọn một kích thước</span><br>
								   		@foreach($sizes as $item)
								   			<?php 
								   				$quantity = App\ProductSize::where('product_id',$item->product_id)->sum('quantity');
								   			 ?>		
								   			@if($quantity > 0) <!-- còn hàng -->				   	
									   			@if($item->quantity == 0)
									   				<span class="nav" style="float:left; " style="padding: 0">
													  <li role="presentation" class="disabled" ><a  style="padding: 3.8px 4.5px;border: 1px solid #ccc;margin-top:10px;margin-right: 3px">{{$item->size->name}}</a></li>
													</span>
									   			@else
									   				<span class="nav" style="float: left;">
									   				<li><label for="{{'custom_radio'.$item->id}}" style="margin-right: 4px">
										   				<input type="radio" value="{{$item->size->id}}" name=size id="{{'custom_radio'.$item->id}}" >
										   				<span>{{$item->size->name}}</span>
									   				</label></li></span>
									   			@endif
									   		@else
									   			<span class="nav" style="float:left; " style="padding: 0">
												  <li role="presentation" class="disabled" ><a  style="padding: 3.8px 4.5px;border: 1px solid #ccc;margin-top:10px;margin-right: 3px">{{$item->size->name}}</a></li>
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
											  	<button class="active-icon c1 disabled" disabled="disabled" style="text-decoration: none; background: #000;color:#fff;border:none;padding: 11px 0;">
											  		<span>Tạm Hết Hàng</span>						  
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
								    <!--  @if($errors->has('size'))
								    			    							<span class="" style="color:red;font-size: 13px">{{$errors->first('size')}}</span>
								    			    						@endif -->
								     </form>
						    	    <div class="clear"></div>
						    	</a>
				    	</div>
				     </div>
				     @endforeach