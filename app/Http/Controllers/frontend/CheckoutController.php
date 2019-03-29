<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;
use App\Http\Requests\CheckoutRequest;
use App\Customer;
use App\Order;
use App\OrderDetail;
use DB;
use Auth;
use Mail;
use App\Mail\CheckoutMail; 

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Cart::getContent();
        $total = Cart::getTotal();
        return view('frontend.checkout.checkout',compact('items','total'));
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
    public function store(CheckoutRequest $request)
    {
        try {
                DB::beginTransaction();
                $data_customer = $request->except('_token','payment');
                if (Auth::check()) {
                    $data_customer['user_id'] = Auth::user()->id;
                }
                $customer = Customer::create($data_customer);

                $data_order = [
                    'customer_id' => $customer->id,
                    'total' => Cart::getTotal(),
                    'payment' => $request->payment,
                ];
                $order = Order::create($data_order);

                foreach (Cart::getContent() as $item) {
                    $data_orderDetail = [
                    'order_id' => $order->id,
                    'product_id' => $item->id,
                    'quantity' => $item->quantity,
                    'price' => $item->attributes->price_goc,
                    'sale' => $item->attributes->sale,
                    'pricesale' => $item->price,
                    ];
                    OrderDetail::create($data_orderDetail);
                }
                $data_mail = $request->except('_token');
                Mail::to($request->email)->send(new CheckoutMail($data_mail, Cart::getContent(), Cart::getTotal()));
                Cart::clear();
                DB::commit();
                return redirect()->route('shoppingCart-user')->with('success','Hóa đơn của bạn đã được chuyển đến địa chi email có trong phần thông tin khách hàng của chúng tôi.Sản phẩm sẽ được chuyển đến sau từ 3-5 ngày tính từ thời điểm đặt hàng. Cảm ơn bạn chọn mua sản phẩm của chúng tôi, chúng tôi sẽ liên lạc lại với bạn trong thời gian sớm nhất! Trân trọng!!');
        } catch (Exception $e) {
            return back()->with('status','Thanh toán không thành công');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
