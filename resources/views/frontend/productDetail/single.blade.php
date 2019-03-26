@extends('frontend.master')
@section('title', 'Detail Product')
@section('content')
       <div class="single">
         <div class="wrap">
     	    
		<div class="cont span_2_of_3">
			  <div class="labout span_1_of_a1" style="width: 30%">
				<!-- start product_slider -->
				     <ul id="etalage">
							<li>
								<a href="optionallink.html">
									<img class="etalage_thumb_image" src="{{asset($image->slug)}}" style="width: 400px;"/>
									<img class="etalage_source_image" src="{{asset($image->slug)}}" />
								</a>
							</li>	
							<li>
								<img class="etalage_thumb_image" src="{{asset('images/t2.jpg')}}" />
								<img class="etalage_source_image" src="{{asset('images/t2.jpg')}}" />
							</li>
							<li>
								<img class="etalage_thumb_image" src="{{asset('images/t3.jpg')}}" />
								<img class="etalage_source_image" src="{{asset('images/t3.jpg')}}" />
							</li>
							<li>
								<img class="etalage_thumb_image" src="{{asset('images/t4.jpg')}}" />
								<img class="etalage_source_image" src="{{asset('images/t4.jpg')}}" />
							</li>
							<li>
								<img class="etalage_thumb_image" src="{{asset('images/t5.jpg')}}" />
								<img class="etalage_source_image" src="{{asset('images/t5.jpg')}}" />
							</li>
							<li>
								<img class="etalage_thumb_image" src="{{asset('images/t6.jpg')}}" />
								<img class="etalage_source_image" src="{{asset('images/t6.jpg')}}" />
							</li>
							<li>
								<img class="etalage_thumb_image" src="{{asset('images/t1.jpg')}}" />
								<img class="etalage_source_image" src="{{asset('images/t1.jpg')}}" />
							</li>
						</ul> 
			<!-- end product_slider -->
			</div>
			<div class="cont1 span_2_of_a1" style="width: 60.9%">
				<div style="float: left; width: 75%">
					<h3 class="m_3" style="font-size: 25px">{{$product->name}}</h3>
					<div class="price_single">
								  <span class="reducedfrom">{{number_format($product->price)}}₫</span>
								  <span class="actual">{{number_format($product->price - $product->price*$product->sale/100)}}₫</span><span style="font-size: 13px; color: #999">Đã bao gồm VAT(*)</span>
								</div>
								<h3 class="m_9">Sale off: <span style="border-radius: 15px;padding: 5px;background: #FFAF02;color: #fff">{{$product->sale}}%</span></h3>
					<div class="btn_form" style="margin-top: -30px">
						<form action="" method="GET">
						<div class="options" style="line-height: 15px">
							<h4 class="m_9">Chọn một kích thước(*)</h4>
							<div style="padding: 0px 0px 15px 0px;">
								@foreach($sizes as $size)
						   			<label for="{{'custom_radio'.$product->id.$size->name}}">
						   				<input type="radio" value="{{$size->id}}" name=size id="{{'custom_radio'.$product->id.$size->name}}">
						   				<span  style="padding:7px 9px;">{{$size->name}}</span>
						   			</label>
					   			@endforeach
							</div>
							
						</div>
								@csrf
								<!-- <input type="submit" value="THÊM VÀO GIỎ" title="" style="margin-right: 15px"><input type="submit" value="MUA NGAY" title=""> -->
								<button class="btn btnaddcart btn-success" style="margin-right: 10px;padding: 10px; border-radius: 0"><span class="glyphicon glyphicon-shopping-cart" style="margin-right: 10px"></span>THÊM VÀO GIỎ</button>
								<button type="submit"  class="btn btnaddcart btn-info" style="width: 150px;padding: 10px; border-radius: 0"><span class="glyphicon glyphicon-ok" style="margin-right: 10px"></span>MUA NGAY</button>
					 	</form>
					</div>

					<ul class="add-to-links">
	    			   <li><img src="{{asset('images/wish.png')}}" alt=""/><a href="#">Add to wishlist</a></li>
	    			</ul>
	    			<p class="m_desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
	    			
	                <div class="social_single">	
					   <ul>	
						  <li class="fb"><a href="https://www.facebook.com/anhthikhonge.anhthichnhuthe"><span> </span></a></li>
						  <li class="tw"><a href="#"><span> </span></a></li>
						  <li class="g_plus"><a href="https://mail.google.com"><span> </span></a></li>
						  <li class="rss"><a href="https://www.instagram.com/lleducmanh/"><span> </span></a></li>		
					   </ul>
				    </div>
				</div>
				<div style="width: 25%; float: left;">
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
     
     	<h3 class="m_3">Sản phẩm liên quan</h3>
         <ul id="flexiselDemo3">
			@foreach($products_lienquan as $item)
				<?php $img = App\Image::where('product_id',$item->id)->where('status',1)->first(); 
					  $brand = App\Brand::select('name')->where('id',$item->brand_id)->first(); 
				?>
				<li><img src="{{asset($img->slug)}}" /><div class="grid-flex"><a href="#">{{$brand->name}}</a><p>{{number_format($item->price - $item->price*$item->sale/100)}}₫</p></div></li>
			@endforeach
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
	<script type="text/javascript" src="{{asset('js/jquery.flexisel.js')}}"></script>
	 <div class="toogle">
     	<h3 class="m_3">Mô tả sản phẩm</h3>
     	<p class="m_text">[{{$product->name}}]</p>
     	<p class="m_text">{{$product->description}}</p>
     	<p class="m_text">-----------------------------------------</p>
		<p class="m_text">Hotline: 0356796738 - Mạnh Viết IT</p>
		<p class="m_text">Add: [ Lê Thiện Trị, Hòa Hải, Q.Ngũ Hành Sơn, Tp.Đà Nẵng ]</p>
		<p class="m_text">Facebook: Lê Đức Mạnh, Trần Văn Viết</p>
		<p class="m_text">Instagram: lleducmanh</p>
     </div>					
	 <div class="toogle">
     	<h3 class="m_3">Bình luận sản phẩm</h3>
     	<div style="margin-bottom: 30px;" class="col-sm-8">
						<form action="" method="GET" role="form">
							@csrf()
							<div class="form-group">
								<label for="">Email:</label>
								<input required type="email" name="email" class="form-control" id="" placeholder="Email">
							</div>
							<div class="form-group">
								<label for="">Tên:</label>
								<input required type="text" name="name" class="form-control" id="" placeholder="Họ Tên">
							</div>
							<div class="form-group">
								<label for="textara">Nội dung:</label><br>
								<textarea required name="content" cols="90" rows="7" placeholder="Nhập bình luận của bạn..." style="padding: 10px"></textarea>
							</div>		
							<button type="submit" class="btn btn-info" style="border-radius: 0;padding: 10px 50px;">Gửi</button>
						</form>
					    <div class="actionBox" style="margin-top: 20px">
					        <ul class="commentList">
					            <li>
					                <div class="commenterImage">
					                  <img src="http://placekitten.com/50/50" />
					                </div>
					                <div class="commentText">
					                	<p>Lê Đức Mạnh</p>
					                    <p class="" style="font-size: 13px">Hello this is a test comment.</p> <span class="date sub-text">on March 5th, 2014</span>

					                </div>
					            </li>
					            <li>
					                <div class="commenterImage">
					                  <img src="http://placekitten.com/45/45" />
					                </div>
					                <div class="commentText">
					                	<p>Lê Đức Mạnh</p>
					                    <p class=""  style="font-size: 13px">Hello this is a test comment and this comment is particularly very long and it goes on and on and on.</p> <span class="date sub-text">on March 5th, 2014</span>

					                </div>
					            </li>
					        </ul>
					    </div>
		</div>
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