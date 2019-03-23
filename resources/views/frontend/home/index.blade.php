@extends('frontend.master')
@section('title', 'Home')
@section('content')
			@include('frontend.home.banner')
             @include('frontend.home.follow')
				   @include('frontend.home.giaohang')
        </div>
		  <div class="content-bottom">
				  <div style="background: #000; color: #fff; padding: 0.5px 10px;">
				  		<div class="container">
				  			<h4>SẢN PHẨM MỚI</h3>
				  			<p style="font-size: 12px;">Hàng luôn được cật nhật thường xuyên</p>
				  		</div>
				  </div>
				   <div class="container" style="margin-top: 20px">
				     @for($i=1; $i<=8; $i++)
				    
				     	<div class="col-sm-3">
				    	<div style="border: 1px solid #ccc; padding: 2%; padding-left: 0; padding-bottom: 0;margin-bottom: 30px">
				    		<div class="view view-fifth">
							  	  <div class="top_box">
								  	<h3 class="m_1">Lorem ipsum dolor sit amet</h3>
								  	<p class="m_2">Adidas</p>
							         <div class="grid_img">
									   <div class="css3"><img src="images/giay1.jpg" alt=""/></div>
								          <div class="mask">
				                       		<div class="info">Quick View</div>
						                  </div>
				                    </div>
			                       <div><span style="margin-right: 10px" class="price-del"><del>750,000 ₫</del></span><span class="price">750,000 ₫</span></div>
								   </div>
								    </div>
								   <span class="rating" style="line-height: 10px">
								   		<span style="margin-left: 15px">Chọn một kích thước</span><br>
								   		<label for="'custom_radio'.$i">
								   			<input type="radio" value="38" name=size id="'custom_radio'.$i">
								   			<span>41</span>
								   		</label>
								   		<label for="'custom_radio1'.$i">
								   			<input type="radio" value="38" name=size id="'custom_radio1'.$i">
								   			<span>42</span>
								   		</label>
								   		<label for="'custom_radio2'.$i">
								   			<input type="radio" value="38" name=size id="'custom_radio2'.$i">
								   			<span>43</span>
								   		</label>
								   		<label for="'custom_radio2'.$i">
								   			<input type="radio" value="38" name=size id="'custom_radio2'.$i">
								   			<span>43</span>
								   		</label>
								   		<label for="'custom_radio2'.$i">
								   			<input type="radio" value="38" name=size id="'custom_radio2'.$i">
								   			<span>43</span>
								   		</label>
							         
							         
					    	      </span>
									 <ul class="list">
									  <li>
									  	<img src="images/anh1.png" alt=""/>
									  	<ul class="icon1 sub-icon1 profile_img">
										  <li><a class="active-icon c1" href="#">+ Add To Card </a>
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
				     @endfor
				    
				  <div class="clear"></div>
			  </div>
			  <div style="background: #000; color: #fff; padding: 0.5px 10px;">
				  		<div class="container">
				  			<h4>SẢN PHẨM HOT</h3>
				  			<p style="font-size: 12px;">Hàng luôn được cật nhật thường xuyên</p>
				  		</div>
				  </div>
				   <div class="container" style="margin-top: 20px">
				     @for($i=1; $i<=4; $i++)
				    
				     	<div class="col-sm-3">
				    	<div style="border: 1px solid #ccc; padding: 2%; padding-left: 0; padding-bottom: 0;margin-bottom: 30px">
				    		<div class="view view-fifth">
							  	  <div class="top_box">
								  	<h3 class="m_1">Lorem ipsum dolor sit amet</h3>
								  	<p class="m_2">Adidas</p>
							         <div class="grid_img">
									   <div class="css3"><img src="images/giay1.jpg" alt=""/></div>
								          <div class="mask">
				                       		<div class="info">Quick View</div>
						                  </div>
				                    </div>
			                       <div><span style="margin-right: 10px" class="price-del"><del>750,000 ₫</del></span><span class="price">750,000 ₫</span></div>
								   </div>
								    </div>
								   <span class="rating" style="line-height: 10px">
								   		<span style="margin-left: 15px">Chọn một kích thước</span><br>
								   		<label for="'custom_radio'.$i">
								   			<input type="radio" value="38" name=size id="'custom_radio'.$i">
								   			<span>41</span>
								   		</label>
								   		<label for="'custom_radio1'.$i">
								   			<input type="radio" value="38" name=size id="'custom_radio1'.$i">
								   			<span>42</span>
								   		</label>
								   		<label for="'custom_radio2'.$i">
								   			<input type="radio" value="38" name=size id="'custom_radio2'.$i">
								   			<span>43</span>
								   		</label>
								   		<label for="'custom_radio2'.$i">
								   			<input type="radio" value="38" name=size id="'custom_radio2'.$i">
								   			<span>43</span>
								   		</label>
								   		<label for="'custom_radio2'.$i">
								   			<input type="radio" value="38" name=size id="'custom_radio2'.$i">
								   			<span>43</span>
								   		</label>
							         
							         
					    	      </span>
									 <ul class="list">
									  <li>
									  	<img src="images/anh1.png" alt=""/>
									  	<ul class="icon1 sub-icon1 profile_img">
										  <li><a class="active-icon c1" href="#">+ Add To Card </a>
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
				     @endfor
				    
				  <div class="clear"></div>
			  </div>
			  </div>
		
					<div  style="background: #000; color: #fff; padding: 0.5px 10px;">
						<div class="container">
							<h4>THƯƠNG HIỆU NỔI TIẾNG</h3>
				  			<p style="font-size: 12px;">Những thương hiệu hàng đầu thế giới</p>
						</div>
					</div>
				<div class="container" style="padding: 30px">
					<div class="col-sm-2">
						<a href="@"><img src="{{asset('images/thuonghieu/adidas.png')}}" width="130px"></a>
					</div>
					<div class="col-sm-2">
						<a href="@"><img src="{{asset('images/thuonghieu/nike.png')}}" width="130px"></a>
					</div>
					<div class="col-sm-2">
						<a href="@"><img src="{{asset('images/thuonghieu/puma.png')}}" width="130px"></a>
					</div>
					<div class="col-sm-2">
						<a href="@"><img src="{{asset('images/thuonghieu/jordam.png')}}" width="130px"></a>
					</div>
					<div class="col-sm-2">
						<a href="@"><img src="{{asset('images/thuonghieu/fila.png')}}" width="130px"></a>
					</div>
					<div class="col-sm-2">
						<a href="@"><img src="{{asset('images/thuonghieu/newbalanece.png')}}" width="130px"></a>
					</div>
				</div>
        <div class="footer">
       	  <div class="footer-top">
       		<div class="wrap">
       			   <div class="col_1_of_footer-top span_1_of_footer-top">
				  	 <ul class="f_list">
				  	 	<li><img src="images/f_icon.png" alt=""/><span class="delivery">Free delivery on all orders over £100*</span></li>
				  	 </ul>
				   </div>
				   <div class="col_1_of_footer-top span_1_of_footer-top">
				  	<ul class="f_list">
				  	 	<li><img src="images/f_icon1.png" alt=""/><span class="delivery">Customer Service :<span class="orange"> (800) 000-2587 (freephone)</span></span></li>
				  	 </ul>
				   </div>
				   <div class="col_1_of_footer-top span_1_of_footer-top">
				  	<ul class="f_list">
				  	 	<li><img src="images/f_icon2.png" alt=""/><span class="delivery">Fast delivery & free returns</span></li>
				  	 </ul>
				   </div>
				  <div class="clear"></div>
			 </div>
       	 </div>
       	 <div class="footer-middle">
       	 	<div class="wrap">
       	 		<div class="section group">
				<div class="col_1_of_middle span_1_of_middle">
					<dl id="sample" class="dropdown">
			        <dt><a href="#"><span>Please Select a Country</span></a></dt>
			        <dd>
			            <ul>
			                <li><a href="#">Australia<img class="flag" src="images/as.png" alt="" /><span class="value">AS</span></a></li>
			                <li><a href="#">Sri Lanka<img class="flag" src="images/srl.png" alt="" /><span class="value">SL</span></a></li>
			                <li><a href="#">Newziland<img class="flag" src="images/nz.png" alt="" /><span class="value">NZ</span></a></li>
			                <li><a href="#">Pakistan<img class="flag" src="images/pk.png" alt="" /><span class="value">Pk</span></a></li>
			                <li><a href="#">United Kingdom<img class="flag" src="images/uk.png" alt="" /><span class="value">UK</span></a></li>
			                <li><a href="#">United States<img class="flag" src="images/us.png" alt="" /><span class="value">US</span></a></li>
			            </ul>
			         </dd>
   				    </dl>
   				 </div>
				<div class="col_1_of_middle span_1_of_middle">
					<ul class="f_list1">
						<li><span class="m_8">Sign up for email and Get 15% off</span>
						<div class="search">	  
							<input type="text" name="s" class="textbox" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
							<input type="submit" value="Subscribe" id="submit" name="submit">
							<div id="response"> </div>
			 			</div><div class="clear"></div>
			 		    </li>
					</ul>
				</div>
				<div class="clear"></div>
			   </div>
       	 	</div>
       	 </div>
@endsection      	