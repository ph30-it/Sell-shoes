@extends('frontend.master')
@section('title', 'Detail Product')
@section('content')
       <div class="single">
         <div class="wrap">
     	    
		<div class="cont span_2_of_3">
			  <div class="labout span_1_of_a1">
				<!-- start product_slider -->
				     <ul id="etalage">
							<li>
								<a href="optionallink.html">
									<img class="etalage_thumb_image" src="images/t1.jpg" />
									<img class="etalage_source_image" src="images/t2.jpg" />
								</a>
							</li>
							<li>
								<img class="etalage_thumb_image" src="images/t2.jpg" />
								<img class="etalage_source_image" src="images/t2.jpg" />
							</li>
							<li>
								<img class="etalage_thumb_image" src="images/t3.jpg" />
								<img class="etalage_source_image" src="images/t3.jpg" />
							</li>
							<li>
								<img class="etalage_thumb_image" src="images/t4.jpg" />
								<img class="etalage_source_image" src="images/t4.jpg" />
							</li>
							<li>
								<img class="etalage_thumb_image" src="images/t5.jpg" />
								<img class="etalage_source_image" src="images/t5.jpg" />
							</li>
							<li>
								<img class="etalage_thumb_image" src="images/t6.jpg" />
								<img class="etalage_source_image" src="images/t6.jpg" />
							</li>
							<li>
								<img class="etalage_thumb_image" src="images/t1.jpg" />
								<img class="etalage_source_image" src="images/t1.jpg" />
							</li>
						</ul>
					
					
			<!-- end product_slider -->
			</div>
			<div class="cont1 span_2_of_a1" style="">
				<div style="float: left; width: 80%">
					<h3 class="m_3">Lorem ipsum dolor sit amet</h3>
				
					<div class="price_single">
								  <span class="reducedfrom">$66.00</span>
								  <span class="actual">$12.00</span><a href="#">click for offer</a>
								</div>
					<ul class="options">
						<h4 class="m_9">Select a Size</h4>
						<li><a href="#">6</a></li>
						<li><a href="#">7</a></li>
						<li><a href="#">8</a></li>
						<li><a href="#">9</a></li>
						<div class="clear"></div>
					</ul>
					<div class="btn_form">
					   <form>
						 <input type="submit" value="buy now" title="">
					  </form>
					</div>
					<ul class="add-to-links">
	    			   <li><img src="images/wish.png" alt=""/><a href="#">Add to wishlist</a></li>
	    			</ul>
	    			<p class="m_desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
	    			
	                <div class="social_single">	
					   <ul>	
						  <li class="fb"><a href="#"><span> </span></a></li>
						  <li class="tw"><a href="#"><span> </span></a></li>
						  <li class="g_plus"><a href="#"><span> </span></a></li>
						  <li class="rss"><a href="#"><span> </span></a></li>		
					   </ul>
				    </div>
				</div>
				<div style="width: 20%; float: left;">
					<table class="table tabletag">
							<tr>
								<td colspan="2" style="background:rgba(0,0,0,0.1);">
									<p id="ptag">Sẽ có tại nhà bạn</p>
									<p>từ 1-3 ngày làm việc</p>
								</td>
							</tr>
							<tr>
								<td><br><img src="../../images/giaohang1.png" alt=""></td>
								<td>
									<p><b>Giao hàng nhanh</b>
									<br>Nhận hàng trong ngày ở nội thành</p>
								</td>
							</tr>
							<tr>
								<td><br><img src="../../images/thanhtoan.png" alt=""></td>
								<td>
									<p><b>Thanh toán</b>
									<br>Thanh toán khi nhận hàng trong khu vực nội thành</p>
								</td>
							</tr>
							<tr>
								<td><br><img src="../../images/hotro.png" alt=""></td>
								<td>
									<p><b>Hỗ trợ Online</b>
									<br>0933880767 - 01222980259</p>
								</td>
							</tr>
				
						</table>
					</div>	
			</div>
			<div class="clear"></div>
     
     
         <ul id="flexiselDemo3">
			<li><img src="images/pic11.jpg" /><div class="grid-flex"><a href="#">Bloch</a><p>Rs 850</p></div></li>
			<li><img src="images/pic10.jpg" /><div class="grid-flex"><a href="#">Capzio</a><p>Rs 850</p></div></li>
			<li><img src="images/pic9.jpg" /><div class="grid-flex"><a href="#">Zumba</a><p>Rs 850</p></div></li>
			<li><img src="images/pic8.jpg" /><div class="grid-flex"><a href="#">Bloch</a><p>Rs 850</p></div></li>
			<li><img src="images/pic7.jpg" /><div class="grid-flex"><a href="#">Capzio</a><p>Rs 850</p></div></li>
		 </ul>
	    <script type="text/javascript">
		 $(window).load(function() {
			$("#flexiselDemo1").flexisel();
			$("#flexiselDemo2").flexisel({
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });
		
			$("#flexiselDemo3").flexisel({
				visibleItems: 5,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,    		
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });
		    
		});
	</script>
	<script type="text/javascript" src="js/jquery.flexisel.js"></script>
	 <div class="toogle">
     	<h3 class="m_3">Product Details</h3>
     	<p class="m_text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum.</p>
     </div>					
	 <div class="toogle">
     	<h3 class="m_3">Product Reviews</h3>
     	<p class="m_text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum.</p>
     </div>
     </div>
     <div class="clear"></div>
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