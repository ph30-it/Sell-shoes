@extends('frontend.master')
@section('title', 'Detail Product')
@section('content')
<style>
	* {
  box-sizing: border-box;
}

/* Position the image container (needed to position the left and right arrows) */
.container {
  position: relative;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Add a pointer when hovering over the thumbnail images */
.cursor {
  cursor: pointer;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Container for image text */
.caption-container {
  text-align: center;
  background-color: #222;
  padding: 2px 16px;
  color: white;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Six columns side by side */
.column {
  float: left;
  width: 16.66%;
}

/* Add a transparency effect for thumnbail images */
.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}
</style>
       <div class="single">
         <div class="wrap">
     	    
		<div class="cont span_2_of_3">
			  <div class="col-lg-5" style="padding: 10px">
				<!-- start product_slider -->
				 	<!-- Full-width images with number text -->
				  <div class="mySlides">
				    <div class="numbertext">1 / 6</div>
				      <img src="{{asset($image->slug)}}" style="width:100%">
				  </div>

				  <div class="mySlides">
				    <div class="numbertext">2 / 6</div>
				      <img src="{{asset($image->slug)}}" style="width:100%">
				  </div>

				  <div class="mySlides">
				    <div class="numbertext">3 / 6</div>
				      <img src="{{asset($image->slug)}}" style="width:100%">
				  </div>

				  <div class="mySlides">
				    <div class="numbertext">4 / 6</div>
				      <img src="{{asset($image->slug)}}" style="width:100%">
				  </div>
				  <!-- Next and previous buttons -->
				  

				  <!-- Image text -->
				  <div class="caption-container">
				    <p id="caption"></p>
				  </div>

				  <!-- Thumbnail images -->
				  <div class="row">
				    <div class="column">
				      <img class="demo cursor" src="{{asset($image->slug)}}" style="width:120%" onclick="currentSlide(1)" alt="The Woods">
				    </div>
				    <div class="column"> 
				      <img class="demo cursor" src="{{asset($image->slug)}}" style="width:120%" onclick="currentSlide(2)" alt="Cinque Terre">
				    </div>
				    <div class="column">
				      <img class="demo cursor" src="{{asset($image->slug)}}" style="width:120%" onclick="currentSlide(3)" alt="Mountains and fjords">
				    </div>
				    <div class="column">
				      <img class="demo cursor" src="{{asset($image->slug)}}" style="width:120%" onclick="currentSlide(4)" alt="Northern Lights">
				    </div>
				  </div>
				  <a class="prev" onclick="plusSlides(-1)" style="background: #000">&#10094;</a>
				  	<a class="next" onclick="plusSlides(1)" style="background: #000;">&#10095;</a>
			</div>
			<div class="col-lg-5">
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
								@foreach($product->sizes as $size)
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
				<div class="col-lg-2">
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
     	<div style="margin-bottom: 30px;" class="col-sm-7">
     					<div class="actionBox" style="margin-top: 20px">
					        <ul class="commentList">
								 @foreach($comments as $comment)
						           		<li>
							                <div class="commenterImage">
							                  <img src="http://placekitten.com/50/50" />
							                </div>
							                <div class="commentText">
							                	<p>{{$comment->name}}</p>
							                    <p class="" style="font-size: 13px">{{$comment->content}}</p> <span class="date sub-text">{{$comment->date}}</span>
												@if(Auth::check() && $comment->user_id == Auth::user()->id)
													<a href="" style="margin-left:10px;font-size: 13px">Xóa</a>
							                    @endif
							                </div>
						            	</li>
					           @endforeach
					        </ul>
					    </div>
						@if(Auth::check())
							@include('frontend.comment.user-comment')
						@else
							@include('frontend.comment.comment')
						@endif
		</div>
    </div>
    </div>
    <div class="clear"></div>
	 </div>
     </div>
     <script>
     	var slideIndex = 1;
		showSlides(slideIndex);

		// Next/previous controls
		function plusSlides(n) {
		  showSlides(slideIndex += n);
		}

		// Thumbnail image controls
		function currentSlide(n) {
		  showSlides(slideIndex = n);
		}

		function showSlides(n) {
		  var i;
		  var slides = document.getElementsByClassName("mySlides");
		  var dots = document.getElementsByClassName("demo");
		  var captionText = document.getElementById("caption");
		  if (n > slides.length) {slideIndex = 1}
		  if (n < 1) {slideIndex = slides.length}
		  for (i = 0; i < slides.length; i++) {
		    slides[i].style.display = "none";
		  }
		  for (i = 0; i < dots.length; i++) {
		    dots[i].className = dots[i].className.replace(" active", "");
		  }
		  slides[slideIndex-1].style.display = "block";
		  dots[slideIndex-1].className += " active";
		  captionText.innerHTML = dots[slideIndex-1].alt;
		}
     </script>
@endsection    