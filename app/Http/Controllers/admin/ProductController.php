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
           'sizes','productSizes',
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
        $data['product'] = Product::with('sizes')->where('id',$id)->first();
        $data['sizes'] = Size::all();
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
    public function update(EditProductRequest $request, $id)
    {         
          try {
            DB::beginTransaction();
            $data = $request->except('_token','img','size','_method');
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
            $product = Product::find($id);
            $product->productSize()->delete();
            $product->delete();
            DB::commit();
            return redirect()->back()->with('status', trans('message.prod_delete_susscess'));  
        } catch (\Exception $ex) {
            return redirect()->back()->with('status',trans('message.prod_delete_susscess'));
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
                    <td><?php  if($product->featured == 1) { ?>
                            <span class="btn-info">Đặc biệt</span>
                        <?php } else { ?>
                            <span class="btn-default">Bình thường</span>
                        <?php } ?>
                    </td>
                    <td><?php if($product->status == 1)  { ?>
                            <span class="btn-default">Đã hiển thị</span>
                        <?php }else{ ?>
                            <span class="btn-success">Đang ẩn</span>
                        <?php } ?>
                    </td>
                    <td><?php echo $product->created_at; ?></td>
                    <td><?php echo $product->updated_at; ?></td>
                    <td style="line-height: 50px" style="text-align: center;">
                        <a href="<?php echo route('show-edit-product',$product->id); ?>" class="btn glyphicon glyphicon-pencil"></a><br>
                        <form action="<?php echo route('delete-product',$product->id); ?>" method="POST">
                            <!-- @csrf
                            @method('DELETE') -->
                            <button onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="glyphicon glyphicon-trash" style="border: none;background: #fff;color: red;"></button>
                        </form>
                        
                        <a href="<?php echo route('view-product-size',$product->id); ?>" class="btn-success">Size</a><br>
                        <a href="<?php echo route('view-product-image',$product->id); ?>" class="btn-primary">ảnh</a>
                    </td>
                </tr>
            <?php
            }
        }

        
    }
}