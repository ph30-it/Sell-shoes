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
        $data = Customer::with('order')->orderBy('id','desc')->get();
       // dd($data);
        return view('admin.order.order',compact('data'));
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
        $order = Order::with('orderDetails')->where('id',$id)->orderBy('id','desc')->first();
        //dd($order);
        return view('admin.order.showdetail',compact('order'));
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
}
