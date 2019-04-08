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
use App\OrderDetail;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;
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
        $productlist = Product::with([
           'sizes' => function($query){
                return $query->orderBy('id','asc');
                    },
            'productSizes',
            'category','brand',
            'images' => function($query){
                return $query->where('status',1)->orderBy('updated_at','desc');
            }])->orderBy('id','desc')->paginate(8);
       // dd($productlist);
        return view('admin.product.product', compact('productlist'));
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
            if (empty($data['sale'])) {
                $data['sale'] = 0;
            }
            $product = Product::create($data);

            foreach ($request->size as $item) {
            ProductSize::create([
            'product_id' => $product->id,
            'size_id' => $item,
             ]);
            }
             //image product detail
            if ($request->hasFile('img_description')) {
                    $imageData = [];
                    foreach (request()->file('img_description') as $item) {
                        $filename = $item->getClientOriginalName();
                        $newName = '/images/product/'.md5(microtime(true)).$filename;
                        $item->move(public_path('/images/product'), $newName);
                        array_push($imageData, [
                                                   'name' => $filename,
                                                   'product_id' => $product->id,
                                                   'slug' => $newName,
                                                   'status' => 0,  
                                                ]);    
                }  
                Image::insert($imageData);
            }
            //image product
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
            return back()->with('status',trans('message.prod_create_fail'));
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
        $product = Product::with([
           'sizes' => function($query){
                return $query->orderBy('id','asc');
                    },
            'productSizes',
            'category','brand',
            'images' => function($query){
                return $query->where('status',1)->orderBy('updated_at','desc');
            }])->where('id',$id)->first();
        $categories = Category::all();
        $brands = Brand::all();
       // dd($product->sizes);  
        $sizes= Size::all();
        return view('admin.product.editproduct',compact('product','categories','brands', 'sizes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProductRequest $request, $id)
    {         
          try {
            DB::beginTransaction();
            $data = $request->except('_token','img','size','_method','img_description');
            $data['slug'] = str_slug($data['name']);
            //dd($data);
            Product::where('id',$id)->update($data);


            //update image product
            if ($request->hasFile('img')) {
                $filename = $request->img->getClientOriginalName();
                $newName = '/images/product/'.md5(microtime(true)).$filename;
                $request->img->move(public_path('/images/product'), $newName);
                Image::where('product_id',$id)->update([
                   'name' => $filename, 
                   'slug' => $newName,
                ]);        
            }

             //update image product detail
            if ($request->hasFile('img_description')) {
                Image::where('product_id',$id)->where('status',0)->delete();

                    $imageData = [];
                    foreach (request()->file('img_description') as $item) {
                        $filename = $item->getClientOriginalName();
                        $newName = '/images/product/'.md5(microtime(true)).$filename;
                        $item->move(public_path('/images/product'), $newName);
                        array_push($imageData, [
                                                   'name' => $filename,
                                                   'product_id' => $id,
                                                   'slug' => $newName,
                                                   'status' => 0,  
                                                ]);    
                }  
                Image::insert($imageData);
            }
            DB::commit();
             return redirect()->route('product-admin')->with('status', trans('message.prod_edit_susscess'));
        } catch (\Exception $e) {
            return back()->with('status',trans('message.prod_edit_fail'));
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
            $product = Product::find($id);;
            $product->productSizes()->delete();
            $product->images()->delete();
            $product->orders()->delete();
            $product->orderDetails()->delete();
            $product->comments()->delete();
            $product->delete();
            DB::commit();
            return redirect()->back()->with('status', trans('message.prod_delete_susscess'));  
        } catch (\Exception $ex) {
            return redirect()->back()->with('status',trans('message.prod_delete_fail'));
        }
    }

    public function searchProduct(Request $request)
    {
        $result = $request->search;
        $result = str_replace(' ', '%', $result);
        $products = Product::with([
           'sizes','productSizes',
            'category','brand',
            'images' => function($query){
                return $query->where('status',1)->orderBy('updated_at','desc');
            }])
            ->where('name','like','%'.$result.'%')
            ->orWhere('price', '<=', $result)
            ->orderBy('id','desc')->limit(8)->get();

            //dd($productlist);

        if(empty($products->toArray()))
        {
            ?>
                <tr>
                    <td colspan="15">Không có kết quả nào!</td>
                </tr>
            <?php
        }else{
            foreach ($products as $product) {
            ?>
                <tr>
                    <td><?php echo $product->id; ?></td>
                    <td><?php echo $product->name; ?></td>
                    <td><?php echo number_format($product->price,0); ?></td>
                    <td>
                        <?php  if(empty($product->sale)) { ?>
                            <span style="border-radius: 15px;padding: 5px;background: #FFAF02;color: #fff">0%</span>
                        <?php } else { ?>
                            <span style="border-radius: 15px;padding: 5px;background:#FFAF02;color:#fff"><?php echo $product->sale; ?> %</span>
                        <?php } ?>
                    </td>
                    <td>
                        <?php 
                             foreach ($product->images as $item) {
                                $images['slug'] = $item->slug;
                             }
                         ?>
                        <?php  foreach($product->sizes as $item) { ?>
                            <span style="background: url(//theme.hstatic.net/1000243581/1000361905/14/bg-variant-checked.png?v=131) no-repeat right bottom #fff; padding:2px; border: 1px solid #ccc;"><?php echo $item->name; ?></span>
                        <?php } ?>
                    </td>
                    <td>
                        <?php $quantity = 0; 
                        foreach ($product->productSizes as $item) { 
                                 $quantity += $item->quantity;       
                        } ?>
                        <?php echo $quantity; ?>
                    </td>
                    <td>
                        <img src="<?php echo asset($images['slug']); ?>" alt="" width="150px">
                    </td>
                    <td>
                        <?php  if(empty($product->description)) { ?>
                            Chưa có mô tả cho sản phẩm này.
                        <?php } else { ?>
                            <?php echo $product->description; ?>
                        <?php } ?>
                    </td>
                    <td><?php echo $product->category->name; ?></td>
                    <td><?php echo $product->brand->name; ?></td>
                    <td><?php if($product->status == 1)  { ?>
                            <span class="btn-default" style="padding: 2px">Đã hiển thị</span>
                        <?php }else{ ?>
                            <span class="btn-success" style="padding: 2px">Đang ẩn</span>
                        <?php } ?>
                    </td>
                    <td style="line-height: 50px" style="text-align: center;">
                        <a href="<?php echo route('show-edit-product',$product->id); ?>" class="btn glyphicon glyphicon-pencil"></a><br>
                        <form action="<?php echo route('delete-product',$product->id); ?>" method="POST">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <input type="hidden" name="_method" value="delete">
                            <button onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="glyphicon glyphicon-trash" style="border: none;background: #fff;color: red;"></button>
                        </form>
                        
                        <a href="<?php echo route('view-product-size',$product->id); ?>" class="btn-success">Size</a><br>
                        
                    </td>
                </tr>
            <?php
            }
        }

        
    }
}