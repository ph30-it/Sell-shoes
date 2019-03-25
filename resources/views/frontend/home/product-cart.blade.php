						@foreach($products as $product)
				     	<?php 
				     		$brand = App\Brand::select('name')->where('id',$product->brand_id)->first();
				     		$image = App\Image::select('slug')->where('product_id',$product->id)->where('status',1)->first();
				     		$sizes = App\Product::find($product->id)->sizes;
				     	 ?>
				     	<div class="col-sm-3">
				    	<div style="border: 1px solid #ccc; padding: 2%; padding-left: 0; padding-bottom: 0;margin-bottom: 30px">
				    		<div class="view view-fifth">
							  	  <div class="top_box">
								  	<h3 class="m_1">
								  		<a href="{{asset('detail/'.$product->id.'/'.$product->slug.'.html')}}" style="color: #000">{{$product->name}}</a>
								  		
								  	</h3>
								  	<p class="m_2">{{$brand->name}}</p>
							         <div class="grid_img">
									   <div class="css3">
									   	<a href="{{asset('detail/'.$product->id.'/'.$product->slug.'.html')}}"><img src="{{asset($image->slug)}}" alt=""/></a>
									   </div>
								          <div class="mask">
				                       		<div class="info"><a href="{{asset('detail/'.$product->id.'/'.$product->slug.'.html')}}" style="color: #fff;">Quick View</a></div>
						                  </div>
				                    </div>
			                       <div><span style="margin-right: 10px" class="price-del"><del>{{number_format($product->price)}} ₫</del></span><span class="price">{{number_format($product->price - ($product->price*$product->sale/100))}} ₫</span></div>
								   </div>
								    </div>
								   <span class="rating" style="line-height: 10px">
								   		<span style="margin-left: 7px">Chọn một kích thước</span><br>
								   		@foreach($sizes as $size)
								   			<label for="{{'custom_radio'.$product->id.$size->name}}">
								   				<input type="radio" value="{{$size->id}}" name=size id="{{'custom_radio'.$product->id.$size->name}}">
								   			<span>{{$size->name}}</span>
								   		</label>
								   		@endforeach
					    	      </span>
									 <ul class="list">
									  <li>
									  	<img src="images/anh1.png" alt=""/>
									  	<ul class="icon1 sub-icon1 profile_img">
										  <li><a class="active-icon c1" href="#">+ Thêm Vào Giỏ </a>
											<ul class="sub-icon1 list">
												<li><h3>sed diam nonummy</h3><a href=""></a></li>
												<li><p>Lorem ipsum dolor sit amet, consectetuer  <a href="">adipiscing elit, sed diam</a></p></li>
											</ul>
										  </li>
										 </ul>
									   </li>
								     </ul>
						    	    <div class="clear"></div>
						    	</a>
				    	</div>
				     </div>
				     @endforeach