@extends('frontend.master')
@section('title', 'Register')
@section('content')
    		   <div class="col_1_of_login span_1_of_login">
				  <div class="Register-title">
	           		<h4 class="title" style="margin-left: 325px;">Registered Customers</h4>
	           		 
					 <div class="comments-area">
						<form action="dang-ki" method="post" style="margin-left: 325px;width: 550px;">
							<input type="hidden" name="_token" value="{{csrf_token()}}" />
							<p>
								<label class="form-group">Email</label>
								<span>*</span>
								<input type="text" value="" name="email" placeholder="Your Email">
								@if($errors->has('email'))
	    							<span style="color: red;font-size: 13px">{{$errors->first('email')}}</span>
	    						@endif
							</p>
							<p>
								<label class="form-group">Name</label>
								<span>*</span>
								<input type="text" value="" name="name" placeholder="Your Name"> 
								@if($errors->has('name'))
	    							<span style="color: red;font-size: 13px">{{$errors->first('name')}}</span>
	    						@endif
							</p>
							<p>
								<label class="form-group">Password</label>
								<span>*</span>
								<input type="password" value="" name="password" placeholder="Your Password">
								@if($errors->has('password'))
	    							<span style="color: red;font-size: 13px">{{$errors->first('password')}}</span>
	    						@endif
							</p>
							<p>
								<label class="form-group">Confirmpassword</label>
								<span>*</span>
								<input type="password" value="" name="confirmpassword" placeholder="Confirmpassword">
								@if($errors->has('confirmpassword'))
	    							<span style="color: red;font-size: 13px">{{$errors->first('confirmpassword')}}</span>
	    						@endif
							</p>
							<button class="grey">Submit</button>
		                    <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
						</form>
					</div>
			      </div>
				</div>
				<div class="clear"></div>
@endsection