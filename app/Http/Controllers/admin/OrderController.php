<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;
use App\Order;
use App\OrderDetail;
use App\ProductSize;
use App\Http\Requests\StatusOrderRequest;
use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::with('customer')->orderBy('id','desc')->get();
       //dd($data);
        return view('admin.order.order',compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$order = Order::with('orderDetails')->where('id',$id)->orderBy('id','desc')->first();
        $order = OrderDetail::with('order','product','size')->where('order_id',$id)->orderBy('id','desc')->get();
        $customer = Customer::with('order')->find($id);
        
        return view('admin.order.showdetail',compact('order','customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StatusOrderRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $data = $request->only('status');
            if ($data['status'] == 1) {
                //duyệt đơn hàng trừ số lướng
                $quantityProduct = OrderDetail::select('product_id','size_id','quantity')->where('order_id',$id)->get();
                foreach ($quantityProduct as $item) {
                    $productSize = ProductSize::select('quantity')->where('product_id',$item->product_id)->where('size_id',$item->size_id)->first();
                    $qty['quantity'] = $productSize->quantity - $item->quantity;
                    ProductSize::where('product_id',$item->product_id)->where('size_id',$item->size_id)->update($qty);
                }
            }
            $order = Order::where('id',$id)->update($data);
            DB::commit();
            return redirect()->route('order-admin')->with('status', trans('message.status_order_susscess'));
        } catch (Exception $e) {
            return back()->with('status', trans('message.status_order_fail'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
        DB::beginTransaction();
            $order = Order::find($id);
            $order->orderDetails()->delete();
            $order->delete();
            Customer::find($id)->delete();
            DB::commit();
            return redirect()->back()->with('status', trans('message.order_delete_susscess'));  
        } catch (\Exception $ex) {
            return redirect()->back()->with('status',trans('message.order_delete_fail'));
        }
    }

     public function orderFilterStatus($id){
        if ($id === 'all') {
            $order = Order::with('customer')->orderBy('id','desc')->get()->toArray();
        }else{
            $order = Order::with('customer')->where('status',$id)->orderBy('id','desc')->get()->toArray();
        }
        if (empty($order)) {
            ?> 
               <tr>
                   <td colspan="9">Không có đơn hàng nào!</td>
               </tr>
            <?php
        }else{
            foreach($order as $item){ ?>
            <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['customer']['name']; ?></td>
                <td><?php echo $item['customer']['email']; ?></td>
                <td><?php echo $item['date']; ?></td>
                <td><?php echo $item['customer']['address']; ?></td>
                <td><?php echo $item['customer']['phone']; ?></td>
                <td><?php if (empty($item['customer']['note'])) {
                    echo 'Không có!';
                }else{
                    echo $item['customer']['note'];
                } ?></td>
                <td><?php if($item['status'] == 0) { ?>
                        <span class="btn btn-default" style="padding: 1px 7px">Đơn mới</span>
                    <?php } if($item['status'] == 1) { ?>
                        <span class="btn btn-success" style="padding: 1px 7px">Đã duyệt</span>
                    <?php } if($item['status'] == 2) { ?> 
                        <span class="btn btn-info" style="padding: 1px 7px">Đang giao</span>
                    <?php } if($item['status'] == 3) { ?>
                        <span class="btn btn-primary" style="padding: 1px 7px">Đã giao</span>
                    <?php } if($item['status'] == 4) { ?>
                        <span class="btn btn-danger" style="padding: 1px 7px">Đã hủy</span>
                    <?php } ?>
                </td>
                <td>
                    <a href="<?php echo route('detail-order',$item['id']); ?>" class=""><span class="btn glyphicon glyphicon-search"></span></a><br>
                    <form action="<?php echo route('delete-order',$item['id']); ?>" method="POST">
                       <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                       <input type="hidden" name="_method" value="delete">
                        <button onclick="return confirm('Bạn có chắc chắn muốn xóa?')"  type="submit" style="border: none; background: #fff"><span class="glyphicon glyphicon-trash" style="color: #d9534f;"></span></button>
                    </form>
                </td>
            </tr>
            <?php  
            }

        }
    }

    public function orderSearch(Request $request){
            $result = $request->search;
            $result = str_replace(' ', '%', $result);
            $order = Customer::with('order')
                            ->where('name','like','%'.$result.'%')
                            ->orWhere('email','like','%'.$result.'%')
                            ->orWhere('phone','like','%'.$result.'%')
                            ->orderBy('id','desc')->get()->toArray();
 
        if (empty($order)) {
            ?> 
               <tr>
                   <td colspan="9">Không có đơn hàng nào!</td>
               </tr>
            <?php
        }else{
            foreach($order as $item){ ?>
            <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['name']; ?></td>
                <td><?php echo $item['email']; ?></td>
                <td><?php echo $item['order']['date']; ?></td>
                <td><?php echo $item['address']; ?></td>
                <td><?php echo $item['phone']; ?></td>
                <td><?php if (empty($item['note'])) {
                    echo 'Không có!';
                }else{
                    echo $item['note'];
                } ?></td>
                <td><?php if($item['order']['status'] == 0) { ?>
                        <span class="btn btn-default" style="padding: 1px 7px">Đơn mới</span>
                    <?php } if($item['order']['status'] == 1) { ?>
                        <span class="btn btn-success" style="padding: 1px 7px">Đã duyệt</span>
                    <?php } if($item['order']['status'] == 2) { ?> 
                        <span class="btn btn-info" style="padding: 1px 7px">Đang giao</span>
                    <?php } if($item['order']['status'] == 3) { ?>
                        <span class="btn btn-primary" style="padding: 1px 7px">Đã giao</span>
                    <?php } if($item['order']['status'] == 4) { ?>
                        <span class="btn btn-danger" style="padding: 1px 7px">Đã hủy</span>
                    <?php } ?>
                </td>
                <td>
                    <a href="<?php echo route('detail-order',$item['id']); ?>" class=""><span class="btn glyphicon glyphicon-search"></span></a><br>
                    <form action="<?php echo route('delete-order',$item['id']); ?>" method="POST">
                       <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                       <input type="hidden" name="_method" value="delete">
                        <button onclick="return confirm('Bạn có chắc chắn muốn xóa?')"  type="submit" style="border: none; background: #fff"><span class="glyphicon glyphicon-trash" style="color: #d9534f;"></span></button>
                    </form>
                </td>
            </tr>
            <?php  
            }

        }
    }


}

