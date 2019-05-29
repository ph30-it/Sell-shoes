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
							<div class="col col-4" style="margin: -20px 0;">
								@foreach($categories as $category)
								<label class="checkbox"><input type="checkbox" name="categories[]" value="{{$category->id}}" class="filterProduct categoryID" ><i></i>{{$category->name}}({{count($category->products)}})</label>
								@endforeach
						    </div>
						</div>
				</section>
				<section  class="sky-form">              	  
                   	  <h4>Brand</h4>
						<div class="row row1 scroll-pane">
							<div class="col col-4" style="margin: -20px 0;">
								@foreach($brands as $brand)
								<label class="checkbox"><input type="checkbox" name="brands[]" value="{{$brand->id}}" class="filterProduct brandID"><i></i>{{$brand->name}}({{count($brand->products)}})</label>
								@endforeach
						    </div>
						</div>
				</section>
		       <section  class="sky-form">
					<h4>Price</h4>
						<div class="row row1 scroll-pane">
							<div class="col col-4">
								
								<select name="price" id="priceProduct" style="background: #F7F7F7;" >
									<option value="0-100000000">Tất cả</option>
									<option value="0-1000000">Dưới 1,000,000</option>
									<option value="1000000-2000000">1,000,000₫ ~ 2,000,000₫</option>
									<option value="2000000-3000000">2,000,000₫ ~ 3,000,000₫</option>
									<option value="3000000-4000000">3,000,000₫ ~ 4,000,000₫</option>
									<option value="5000000-100000000">Trên 5,000,000₫</option>
								</select>
							</div>
						</div>
		       </section>
		</div>
		<div class="cont" style="width: 77.1%">
		  <div class="mens-toolbar">
              <div class="sort">
               	<div class="sort-by">
		            <label>Sort By</label>
		            <select name="sortBy" id="sortBy">
		            		 <option value="">Sort By</option>
		            		 <option value="asc">Price : Low to High</option>
		                     <option value="desc">Price : High to Low</option> 
		            </select>
		            <a href=""><img src="images/arrow2.gif" alt="" class="v-middle"></a>
               </div>     		        
    		</div>
	    	<div>
	    		@if(isset($search))
	    			<br><h4 style="color:#00CED1;margin-top: -5px">Kết quả tìm được với từ khóa: "{{$search}}"</h4>
	    		@elseif(isset($categoryName))
	    			<br><h4 style="margin-top: -5px">Tất cả sản phẩm danh mục {{$categoryName->name}}</h4>
	    		@elseif(isset($brandName))
	    			<br><h4 style="margin-top: -5px">Tất cả sản phẩm thương hiệu {{$brandName->name}}</h4>
	    		@else
	    			<br><h4 style="margin-top: -5px">Tất cả sản phẩm</h4>
	    		@endif
	    	</div>
     	    <div class="clear"></div>
	       </div>
	       		<div id="getProduct">
					    @include('frontend.product.product-card')
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
<script>
	$(document).ready(function(){
		//filter product by category & brand
		$('.filterProduct').click(function(event) {
			var category_id = [];
			$('.categoryID').each(function() {
				if($(this).is(":checked")){
					category_id.push($(this).val());
				}
			});
			var brand_id = [];
			$('.brandID').each(function() {
				if($(this).is(":checked")){
					brand_id.push($(this).val());
				}
			});
			$.ajax({
							url: "{{route('filter-product-user')}}",
							type: 'GET',
							data: {						
								category_id:category_id,
								brand_id:brand_id,
								//size_id:size_id,
								// price:price,
								// sort_by:sort_by,

											},
							success: function(data) {
								$("#getProduct").html(data);
							},
							error: function($error) {
								alert('Thao tác fail!');
							}
						})
		});
		//filter product by price
		$('#priceProduct').change(function(event) {
			var price = $(this).val();
			//alert(price);
			$.ajax({
							url: "{{route('filter-product-user')}}",
							type: 'GET',
							data: {						
								 price:price,
								// sort_by:sort_by,
											},
							success: function(data) {
								$("#getProduct").html(data);
							},
							error: function($error) {
								alert('Thao tác fail!');
							}
						})
		});
		//sort by price
		$('#sortBy').change(function(event) {
			var sort_by = $(this).val();
			$.ajax({
							url: "{{route('filter-product-user')}}",
							type: 'GET',
							data: {						
								 sort_by:sort_by,
											},
							success: function(data) {
								$("#getProduct").html(data);
							},
							error: function($error) {
								alert('Thao tác fail!');
							}
						})
		});

		//add cart
		$('.addCart').click(function(event) {
				event.preventDefault();	
				var size = document.getElementsByName("size");
				var product_id =  $(this).attr('data-id');	
				var length = size.length;
				for (var i = 0; i < length; i++){
                    if (size[i].checked === true){
                        //alert(size[i].value);
                        var size_id = size[i].value;
                       	break;
                    }
                }
                //alert(size_id);
                if (typeof  size_id == "undefined") {
					alert('Bạn chưa chọn kích thước!');
				}else{
					$.ajax({
							url: "{{route('add-cart-user')}}",
							type: 'GET',
							data: {						
								product_id:product_id,
								size_id:size_id,
											},
							success: function(data) {
								alert('Thêm giỏ hàng thành công!'); 
								location.reload();
							},
							error: function($error) {
								alert('Thêm vào giỏ hàng fail!');
							}
						})
					}
		});		
	});
</script>
@endsection