<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductSize;
use App\Image;
use App\Comment;

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
            },
            'comments' => function($query){
                return $query->orderBy('date','desc');
            }
                ])->orderBy('id','desc')->first();
            $imageDetails =  Image::select('slug')->where('product_id',$id)->where('status',0)->get()->toArray();
            //dd($imageDetails);
            $products_lienquan = Product::where('brand_id',$product->brand_id)->where('status',1)->inRandomOrder()->limit(5)->get();
        return view('frontend.productDetail.single',compact('product','imageDetails','products_lienquan'));
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
