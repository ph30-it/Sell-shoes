<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Size;
use App\Brand;
use App\Image;
use App\Product_size;
use App\Http\Requests\AddProductRequest;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['productlist'] = Product::select()->paginate(8);
       
        return view('admin.product.product',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categorylist'] = Category::all();
        $data['brands'] = Brand::all();
        $data['sizes'] = Size::all();
        return view('admin.product.addproduct',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $product = new Product;
        $product->name = $request->name;
        $product->slug = str_slug($request->name);
        $product->description = $request->description;
        $product->price = $request->price;
        $product->sale = $request->sale;
        $product->featured = $request->featured;
        $product->status = $request->status;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->save();
        // $product= Product::create($data);




        $product_id = DB::table('products')->max('id');

        if ($request->hasFile('img')) {
            $filename = $request->img->getClientOriginalName();
            $newName = '/images/product/'.md5(microtime(true)).$filename;
            $request->img->move(public_path('/images/product'), $newName);

            $images = new Image;
            $images->name = $filename;
            $images->product_id = $product_id;
            $images->slug = $newName;
            $images->status = 1;
            $images->save();

        }

        foreach ($request->size as $item) {
            Product_size::insert([
            'product_id' => $product_id,
            'size_id' => $item,
             ]);
        }
        return redirect()->route('admin-product');

    }
    public function productSize($id)
    {
        $data['product_size'] = Product_size::where('product_id',$id)->get();
        
        return view('admin.product.viewProductSize',$data);
    }

    public function updateQuantity(Request $request){
        $id = $request->id;
        $product_size = Product_size::find($id);
        $product_size->quantity = $request->qty;
        $product_size->save();
        return response()->json([], 400);

    }

    public function destroySize($id)
    {
        Product_size::destroy($id);
        return back()->with('status','Xóa kích thước thành công!');
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
        $data['product'] = Product::find($id);
        $data['sizes'] = Size::all();
        $data['product_size'] = Product::find($id)->sizes;
        $data['categories'] = Category::all();
        $data['images'] = Product::find($id)->images->where('status',1)->first();
  
        return view('admin.product.editproduct',$data);
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
