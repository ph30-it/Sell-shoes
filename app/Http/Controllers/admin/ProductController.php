<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Size;
use App\Brand;
use App\Image;
use App\ProductSize;
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
        $data['productlist'] = Product::orderBy('id','desc')->paginate(8);
       
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
            ProductSize::create([
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
             return redirect()->route('product-admin')->with('status', trans('message.prod_create_susscess'));
        } catch (\Exception $e) {
            return redirect()->route('product-admin')->with('status',trans('message.prod_create_fail'));
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
        $data['brands'] = Brand::all();
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
             return redirect()->route('product-admin')->with('status', trans('message.prod_edit_susscess'));
        } catch (\Exception $e) {
            return redirect()->route('product-admin')->with('status',trans('message.prod_edit_fail'));
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
            return redirect()->back()->with('status', trans('message.prod_delete_susscess'));  
        } catch (\Exception $ex) {
            return redirect()->back()->with('status',trans('message.prod_delete_susscess'));
        }
    }
    public function action(Request $request){
        if($request->ajax()){
            $query = $request->get('quey');
           /* if ($query ='') {
                $data = DB::table('products')
                ->where('name','like','%'.$query.'%')
                ->orWhere('price','like','%'.$query.'%')
                ->orderBy('id','desc')
                ->get();
            
            }else{
               $data = DB::table('products')
                ->orderBy('id','desc')
                ->get();
            }
            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $row) {
                    $output = '
                        <tr>
                            <td>'.$row->id.'</td>
                            <td>'.$row->name.'</td>
                            <td>'.$row->price.'</td>
                            <td>'.$row->sale.'</td>

                        </tr>
                    ';
                }
            }else{
                $output = '
                    <tr>
                        <td align="center" colspan="15">Không tìm thấy kết quả nào...</td>
                    </tr>
                ';
            }
            $data = array(
                'table_data' => $output,
                'toltal_data' => $toltal_data
            );
            echo json_encode($data);*/
            alert('ok');
        }
    }
}
