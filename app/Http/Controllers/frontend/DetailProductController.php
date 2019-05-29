<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductSize;
use App\Image;
use App\Comment;
use Cart;

class DetailProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $product = Product::with([
           'sizes' => function($query){
                return $query->orderBy('id','asc');},
            'productSizes'=> function($query){
                return $query->orderBy('id','asc');},
            'category','brand',
            'images' => function($query){
                return $query->where('status',1)->orderBy('updated_at','desc');
            }
            ])->where('id',$id)->orderBy('id','desc')->first();
            $imageDetails =  Image::select('slug')->where('product_id',$id)->where('status',0)->get()->toArray();
            //dd($imageDetails);
            $products_lienquan = Product::where('brand_id',$product->brand_id)->where('status',1)->inRandomOrder()->limit(6)->get();
            $comments = Comment::with('user')->where('product_id',$id)->orderBy('date','desc')->paginate(6);
            //rating
            $rate['avgRate'] = Comment::where('product_id',$id)->avg('rating');
            $rate['oneStar'] = Comment::where('product_id',$id)->where('rating',1)->count('rating');
            $rate['towStar'] = Comment::where('product_id',$id)->where('rating',2)->count('rating');
            $rate['threeStar'] = Comment::where('product_id',$id)->where('rating',3)->count('rating');
            $rate['fourStar'] = Comment::where('product_id',$id)->where('rating',4)->count('rating');
            $rate['fiveStar'] = Comment::where('product_id',$id)->where('rating',5)->count('rating');
            $rate['totalRate'] = Comment::where('product_id',$id)->count('rating');
        return view('frontend.productDetail.single',compact('product','imageDetails','products_lienquan','comments','rate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function buyNow(Request $request){
        if ($request->ajax()) {
            $product_id = $request->product_id;
            $size_id = $request->size_id;
            $product = Product::find($product_id);
            $price_sale = $product->price - ($product->price*$product->sale)/100;
            $image = Image::select('slug')->where('product_id',$product_id)->where('status',1)->orderBy('updated_at','desc')->first();
            $cart = Cart::add(array(
                    'id' => $product_id.$size_id,
                    'name' => $product->name,
                    'price' => $price_sale,
                    'quantity' => 1,
                    'attributes' => array('image' => $image->slug,'price_goc'=> $product->price, 'slug'=> $product->slug,'sale'=> $product->sale,'size_id' => $request->size_id, 'product_id' => $product_id)
                ));
        }
    }

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
