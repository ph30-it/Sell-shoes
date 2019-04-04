<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with([
           'sizes' => function($query){
                return $query->orderBy('id','asc');},
            'productSizes'=> function($query){
                return $query->orderBy('id','asc');},
            'category','brand',
            'images' => function($query){
                return $query->where('status',1)->orderBy('updated_at','desc');
            }])->orderBy('id','desc')->paginate(8);

        $products_hot = Product::with([
           'sizes' => function($query){
                return $query->orderBy('id','asc');},
            'productSizes'=> function($query){
                return $query->orderBy('id','asc');},
            'category','brand',
            'images' => function($query){
                return $query->where('status',1)->orderBy('updated_at','desc');
            }])->orderBy('id','desc')->paginate(4);
    
       // dd($products_hot);
        return view('frontend.home.index',compact('products','products_hot'));
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
