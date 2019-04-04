@foreach(Cart::getContent() as $item)
													<?php $size = App\Size::select('name')->where('id',$item->attributes->size_id)->first(); 
													?>
													<div class="row" style="padding: 10px">
														<div class="col-lg-4">
														<img src="{{asset($item->attributes->image)}}" alt="" style="width: 80px">
														</div>
														<div class="col-lg-8" style="padding-right: 20px;line-height: 15px">
															<span style="font-size: 12px;">{{$item->name}}</span>
															<div class="col-lg-5">
																<br><span>x{{$item->quantity}} </span><span style="background: url(//theme.hstatic.net/1000243581/1000361905/14/bg-variant-checked.png?v=131) no-repeat right bottom #fff; padding:3px 5px; border: 1px solid #ccc;">{{$size->name}}</span> 
															</div>
															<div class="col-lg-7" style="line-height: 10px">
																<br><span style="font-size: 12px;color:#ed4e4e;margin-right: 2px;">{{ number_format($item->price*$item->quantity,0)}} ₫</span>
																<a href="{{route('delete-cart-user',$item->id)}}" class="glyphicon glyphicon-remove" style="color:red;text-decoration:none;"></a>
															</div>
														</div>
													</div>
												@endforeach