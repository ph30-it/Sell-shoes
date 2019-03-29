<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Image;
use App\ProductSize;
use Cart;
class ShoppingCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['total'] = Cart::getTotal();
        $data['items'] = Cart::getContent();
        return view('frontend.cart.shoppingCart',$data);
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
    public function store(Request $request, $id)
    {
        // $a = Cart::get($id);
        // dd($a->attributes->size);
        
        $product = Product::find($id);
        $price_sale = $product->price - ($product->price*$product->sale)/100;
        $image = Image::select('slug')->where('product_id',$id)->where('status',1)->orderBy('updated_at','desc')->first();
        Cart::add(array(
                'id' => $id,
                'name' => $product->name,
                'price' => $price_sale,
                'quantity' => 1,
                'attributes' => array('image' => $image->slug,'price_goc'=> $product->price, 'slug'=> $product->slug,'sale'=> $product->sale,'size' => $request->size)
            ));
        
        /*return redirect('cart/show');*/
        return back();
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
        Cart::remove($id);
        return back();
    }
}
