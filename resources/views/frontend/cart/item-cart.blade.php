								@foreach($items as $item)
								<tr>
									<td><br><br><br><span class="spandelete"><a href="{{route('delete-cart-user',$item->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"  class="glyphicon glyphicon-remove" style="color:red;text-decoration: none;"></a></span></td>
									<td style="color: #777;">
										
										<a href="{{asset('detail/'.$item->id.'/'.$item->attributes->slug.'.html')}}">
											<img src="{{asset($item->attributes->image)}}" alt="" width="350px"></a>
									</td>
									<td><span><br><br>{{$item->name}}</span></td>
									<td style="text-align: center;">
										<br><br><br><span style="background: url(//theme.hstatic.net/1000243581/1000361905/14/bg-variant-checked.png?v=131) no-repeat right bottom #fff; padding:5px 7px; border: 1px solid #ccc;">{{$item->attributes->size}}</span> 
									</td>
									<td class="td1" style="width: 25%">
										<span class="spansp spanprice1" >
											{{ number_format($item->price,0)}} ₫
										</span>
										<span><strike>
											{{ number_format($item->attributes->price_goc ,0)}} ₫
										</strike></span>
									</td>
									<td class="td1" style="padding:0 30px">
										<div class="form-group">
											<br><br><br><input type="number" class="form-control" value="{{$item->quantity}}" onchange="updateCart(this.value, {{$item->id}})">
										</div>	
									</td>
									<td class="td1"><span class="spansp spanprice1">
										{{ number_format($item->price*$item->quantity,0)}}
									₫</span></td>	
								</tr>
								@endforeach