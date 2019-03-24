@extends('frontend.master')
@section('title', 'Shop')
@section('content')
       <div class="">
       	<img src="{{asset('images/collection_image.jpg')}}" alt="">
         <div class="container">
     	    <div class="rsidebar span_1_of_left">
				   <section  class="sky-form">              	  
                   	  <h4>Category</h4>
						<div class="row row1 scroll-pane">
							<div class="col col-4">
								<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Flats (70)</label>
							</div>
							<div class="col col-4">
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Athletic Shoes (48)</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Athletic Shoes (48)</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Heels (38)</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Other (1)</label>
						    </div>
						</div>
				</section>
		        <section  class="sky-form">
					<h4>Brand</h4>
						<div class="row row1 scroll-pane">
							<div class="col col-4">
								<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Adidas by Stella McCartney</label>
							</div>
							<div class="col col-4">
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Asics</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Bloch</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Bloch Kids</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Capezio</label>
								<label class="checkbox"><input type="checkbox" name="checkbox" ><i></i>Capezio Kids</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Nike</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Zumba</label>
							</div>
						</div>
		       </section>
		       <section  class="sky-form">
					<h4>Price</h4>
						<div class="row row1 scroll-pane">
							<div class="col col-4">
								<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>$50.00 and Under (30)</label>
							</div>
							<div class="col col-4">
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>$100.00 and Under (30)</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>$200.00 and Under (30)</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>$300.00 and Under (30)</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>$400.00 and Under (30)</label>
							</div>
						</div>
		       </section>
		       <section  class="sky-form">
					<h4>Size</h4>
						<div class="row row1 scroll-pane">
							<div class="col col-4">
								<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Red</label>
							</div>
							<div class="col col-4">
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Green</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Black</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Yellow</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Orange</label>
							</div>
						</div>
		       </section>
		</div>
		<div class="cont" style="width: 77.1%">
		  <div class="mens-toolbar">
              <div class="sort">
               	<div class="sort-by">
		            <label>Sort By</label>
		            <select>
		                            <option value="">
		                    Popularity               </option>
		                            <option value="">
		                    Price : High to Low               </option>
		                            <option value="">
		                    Price : Low to High               </option>
		            </select>
		            <a href=""><img src="images/arrow2.gif" alt="" class="v-middle"></a>
               </div>     		        
    		</div>
	          <div class="pager">   
	           <div class="limiter visible-desktop">
	            <label>Show</label>
	            <select>
	                            <option value="" selected="selected">
	                    9                </option>
	                            <option value="">
	                    15                </option>
	                            <option value="">
	                    30                </option>
	                        </select> per page        
	             </div>
	       		<ul class="dc_pagination dc_paginationA dc_paginationA06">
				    <li><a href="#" class="previous">Pages</a></li>
				    <li><a href="#">1</a></li>
				    <li><a href="#">2</a></li>
			  	</ul>
		   		<div class="clear"></div>
	    	</div>
	    	<div><h4>Tất cả sản phẩm</h4></div>
     	    <div class="clear"></div>
	       </div>
			  	<div class="row" style="margin-top: 20px">
				     @for($i=1; $i<=9; $i++)
				    
				     	<div class="col-sm-4">
				    	<div style="border: 1px solid #ccc; padding: 2%; padding-left: 0; padding-bottom: 0;margin-bottom: 30px">
				    		<div class="view view-fifth">
							  	  <div class="top_box">
								  	<h3 class="m_1">Lorem ipsum dolor sit amet</h3>
								  	<p class="m_2">Adidas</p>
							         <div class="grid_img">
									   <div class="css3">
									   		<a href="{{route('detail-product-user')}}"><img src="images/giay1.jpg" alt=""/></a>
									   </div>
								          <div class="mask">
				                       		<div class="info">Quick View</div>
						                  </div>
				                    </div>
			                       <div><span class="price">750,000 ₫</span><span style="margin-left: 10px; font-size: 12px" class="price-del"><del>2,550,000 ₫</del></div>
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
										  <li><a class="active-icon c1" href="#" >+Thêm Vào Giỏ</a>
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