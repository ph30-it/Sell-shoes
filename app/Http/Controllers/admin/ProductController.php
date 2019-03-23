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
        $data['productlist'] = Product::paginate(8);
       
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
    public function store(AddProductRequest $request)
    {
        //dd($request);
        try {
            DB::beginTransaction();
            $data = $request->except('_token','img','size');
            $data['slug'] = str_slug($data['name']);
            $product = Product::create($data);

            foreach ($request->size as $item) {
            Product_size::insert([
            'product_id' => $product->id,
            'size_id' => $item,
             ]);
            }

            if ($request->hasFile('img')) {
                $filename = $request->img->getClientOriginalName();
                $newName = '/images/product/'.md5(microtime(true)).$filename;
                $request->img->move(public_path('/images/product'), $newName);
                Image::create([
                   'name' => $filename,
                   'product_id' => $product->id,
                   'slug' => $newName,
                   'status' => 1,
                ]);        
            }
            DB::commit();
             return redirect()->route('product-admin')->with('status','Thêm sản phẩm thành công!');
        } catch (\Exception $e) {
            return redirect()->route('product-admin')->with('status','Thêm sản phẩm thất bại!');
        }   
        

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
        // return response()->json([], 400);

    }

    public function destroySize($id)
    {
        $size = Product_size::destroy($id);
        if ($size) {
            return back()->with('status','Xóa kích thước thành công!');
        }else{
            return back()->with('status','Xóa kích thước thất bại!');
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
          try {
            DB::beginTransaction();
            $data = $request->except('_token','img','size','_method','submit');
            $data['slug'] = str_slug($data['name']);
            //dd($data);
            Product::where('id',$id)->update($data);

            if ($request->hasFile('img')) {
                $filename = $request->img->getClientOriginalName();
                $newName = '/images/product/'.md5(microtime(true)).$filename;
                $request->img->move(public_path('/images/product'), $newName);
                Image::where('product_id',$id)->update([
                   'name' => $filename,
                   'slug' => $newName,
                ]);        
            }
            DB::commit();
             return redirect()->route('product-admin')->with('status','Sửa sản phẩm thành công!');
        } catch (\Exception $e) {
            return redirect()->route('product-admin')->with('status','Sửa sản phẩm thất bại!');
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
            $product = Product::find($id);
            $product->productSize()->delete();
            $product->delete();
            DB::commit();
            return redirect()->back()->with('status','Xóa sản phẩm thành công!');  
        } catch (\Exception $ex) {
            return redirect()->back()->with('status','Xóa sản phẩm thất bại!');
        }
    }
}
