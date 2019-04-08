<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Brand;
use App\Size;

class ProductController extends Controller
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
                return $query->where('status',1)->orderBy('updated_at','desc');}])
            ->orderBy('id','desc')
            ->paginate(9);
       $categories = Category::with('products')->get();
       $sizes = Size::all();
       $brands = Brand::with('products')->get();

        return view('frontend.product.shop',compact('products','categories','sizes','brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function productByCategory($id)
    {
        $products = Product::with([
           'sizes' => function($query){
                return $query->orderBy('id','asc');},
            'productSizes'=> function($query){
                return $query->orderBy('id','asc');},
            'category','brand',
            'images' => function($query){
                return $query->where('status',1)->orderBy('updated_at','desc');}])
            ->where('category_id',$id)
            ->orderBy('id','desc')
            ->paginate(9);
       $categories = Category::with('products')->get();
       $sizes = Size::all();
       $brands = Brand::with('products')->get();

        return view('frontend.product.shop',compact('products','categories','sizes','brands'));
    }
    public function filterProduct(Request $request)
    {
        if ($request->ajax()) {
            if ($request->price) {
                $price = explode('-', $request->price);
                $price_min = $price[0];
                $price_max = $price[1];

                 $products = Product::with([
                   'sizes' => function($query){
                        return $query->orderBy('id','asc');},
                    'productSizes'=> function($query){
                        return $query->orderBy('id','asc');},
                    'category','brand',
                    'images' => function($query){
                        return $query->where('status',1)->orderBy('updated_at','desc');}])
                    ->where('price','>=',$price_min)
                    ->where('price','<=',$price_max)
                    ->orderBy('id','desc')
                    ->paginate(9);
            }elseif($request->sort_by){
                $products = Product::with([
                   'sizes' => function($query){
                        return $query->orderBy('id','asc');},
                    'productSizes'=> function($query){
                        return $query->orderBy('id','asc');},
                    'category','brand',
                    'images' => function($query){
                        return $query->where('status',1)->orderBy('updated_at','desc');}])
                    ->orderBy('price', $request->sort_by)
                    ->paginate(9);
            }else{
                $category_id = $request->category_id;
                $brand_id = $request->brand_id;

                if ($category_id != "" && $brand_id != "") {
                     $products = Product::with([
                   'sizes' => function($query){
                        return $query->orderBy('id','asc');},
                    'productSizes'=> function($query){
                        return $query->orderBy('id','asc');},
                    'category','brand',
                    'images' => function($query){
                        return $query->where('status',1)->orderBy('updated_at','desc');}])
                    ->whereIn('category_id',$category_id)
                    ->whereIn('brand_id',$brand_id)
                    ->orderBy('id','desc')
                    ->paginate(9);

                }elseif($category_id != ""){
                    $products = Product::with([
                   'sizes' => function($query){
                        return $query->orderBy('id','asc');},
                    'productSizes'=> function($query){
                        return $query->orderBy('id','asc');},
                    'category','brand',
                    'images' => function($query){
                        return $query->where('status',1)->orderBy('updated_at','desc');}])
                    ->whereIn('category_id',$category_id)
                    //->whereIn('brand_id',$brand_id)
                    ->orderBy('id','desc')
                    ->paginate(9);
                }elseif($brand_id != ""){
                    $products = Product::with([
                   'sizes' => function($query){
                        return $query->orderBy('id','asc');},
                    'productSizes'=> function($query){
                        return $query->orderBy('id','asc');},
                    'category','brand',
                    'images' => function($query){
                        return $query->where('status',1)->orderBy('updated_at','desc');}])
                    //->whereIn('category_id',$category_id)
                    ->whereIn('brand_id',$brand_id)
                    ->orderBy('id','desc')
                    ->paginate(9);
                } 
                else{
                     $products = Product::with([
                   'sizes' => function($query){
                        return $query->orderBy('id','asc');},
                    'productSizes'=> function($query){
                        return $query->orderBy('id','asc');},
                    'category','brand',
                    'images' => function($query){
                        return $query->where('status',1)->orderBy('updated_at','desc');}])
                    ->orderBy('id','desc')
                    ->paginate(9);
                }
            }
            
        }
            //response()->json($products);
        
            if($products->isEmpty()) { ?>
                        <p style="margin-left: 20px">Không có sản phẩm nào!</p>
                    <?php }else{ ?>
                    <div class="row" style="margin-top: 20px"> <?php
                        foreach($products as $product){ ?>
                        <div class="col-sm-4">
                        <div style="border: 1px solid #ccc; padding: 2%; padding-left: 0; padding-bottom: 0;margin-bottom: 30px;height: 100%">
                            <div class="view view-fifth">
                                  <div class="top_box">
                                    <h3 class="m_1">
                                        <a href=" <?php echo asset('detail/'.$product->id.'/'.$product->slug.'.html'); ?>" style="color: #000;text-decoration: none;"><?php echo $product->name; ?></a>
                                    </h3>
                                    <p class="m_2"><?php echo $product->brand->name; ?></p>
                                     <div class="grid_img">
                                       <div class="css3">
                                        <a href=" <?php echo asset('detail/'.$product->id.'/'.$product->slug.'.html'); ?>"> 
                                            <?php foreach ($product->images as $item) {
                                                 $image['slug'] = $item->slug;      
                                            } ?>  
                                            <img src=" <?php echo asset($image['slug']); ?>" alt=""/>
                                        </a>
                                       </div>
                                          <div class="mask">
                                            <div class="info"><a href=" <?php echo asset('detail/'.$product->id.'/'.$product->slug.'.html'); ?>" style="color: #fff;text-decoration: none;">Xem chi tiết</a></div>
                                          </div>
                                    </div>
                                   <div><span style="margin-right: 10px" class="price-del"><del> <?php echo number_format($product->price); ?> ₫</del></span><span class="price"> <?php echo number_format($product->price - ($product->price*$product->sale/100)); ?> ₫</span></div>
                                   </div>
                                    </div>
                                   <form  id="formData" name="form">
                                    <input type="hidden" name="_token" value=" <?php echo csrf_token(); ?>">
                                   <span class="rating" style="line-height: 10px">
                                        <span style="margin-left: 7px">Chọn một kích thước</span><br>
                                        <?php $quantity = 0; ?>
                                        <?php  foreach ($product->productSizes as $productSize){
                                                $quantity += $productSize->quantity;  
                                        }
                                                foreach($product->productSizes as $productSize){
                                                if($quantity > 0) {                    
                                                        if($productSize->quantity == 0) { ?>
                                                            <span class="nav" style="float:left; " style="padding: 0">
                                                              <li role="presentation" class="disabled" ><a  style="padding: 3.8px 4.5px;border: 1px solid #ccc;margin-top:10px;margin-right: 3px">
                                                                    <?php  foreach($product->sizes as $size)
                                                                        if($productSize->size_id == $size->id){
                                                                            echo $size->name; 
                                                                        }
                                                                        ?>
                                                                    
                                                              </a></li>
                                                            </span>
                                
                                                        <?php }
                                                        else{?>
                                                            <span class="nav" style="float: left;">
                                                            <li><label for=" <?php echo 'custom_radio'.$productSize->id; ?>" style="margin-right: 4px">
                                                                <input type="radio" value=" <?php echo $productSize->size_id; ?>" name=size id="<?php echo 'custom_radio'.$productSize->id; ?>" >
                                                                <span>
                                                                    <?php  foreach($product->sizes as $size){
                                                                        if($productSize->size_id == $size->id){
                                                                            echo $size->name; 
                                                                            }
                                                                        }

                                                                     ?>
                                                                </span>
                                                            </label></li></span>
                                                        <?php  }

                                                }else{ ?>
                                                    <span class="nav" style="float:left; " style="padding: 0">
                                                      <li role="presentation" class="disabled" ><a  style="padding: 3.8px 4.5px;border: 1px solid #ccc;margin-top:10px;margin-right: 3px">
                                                        <?php foreach($product->sizes as $size){
                                                            if($productSize->size_id == $size->id){
                                                                echo $size->name;
                                                            }                                                         
                                                        } ?>
                                                      </a></li>
                                                    </span>
                                                <?php } 
                                            } ?>  
                                        
                                  </span>
                                     <ul class="list">
                                      <li>
                                        <?php  if($quantity > 0) { ?>
                                            <ul class="icon1 sub-icon1 profile_img">
                                              <li><button class="active-icon c1 addCart" style="text-decoration: none; background: #000;color: #fff; border: none;" data-id=" <?php echo $product->id; ?>">+ Thêm Vào Giỏ </button>
                                                <ul class="sub-icon1 list">
                                                    <li><h3><?php echo $product->name; ?></h3><a href=""></a></li>
                                                    <li><p>
                                                        <?php if(empty($product->description)) { ?>
                                                            Chưa có mô tả nào! <br>
                                                        <?php }else{ ?>
                                                            <?php echo $product->description; ?>
                                                        <?php } ?>
                                                        <a href="">Mạnh Viết - CIT</a>
                                                        </p>
                                                    </li>
                                                </ul>
                                              </li>
                                         </ul>
                                        <?php }else{ ?>
                                            <ul class="icon1 sub-icon1 profile_img nav">
                                              <li role="presentation" class="disabled">
                                                <button class="active-icon c1 disabled" disabled="disabled" style="text-decoration: none; background: #000;color:#fff;border:none;padding: 11px 0;">
                                                    <span>Tạm Hết Hàng</span>                         
                                              </button>
                                                <ul class="sub-icon1 list">
                                                    <li><h3><?php echo $product->name;; ?></h3><a href=""></a></li>
                                                    <li><p>
                                                        <?php if(empty($product->description)) { ?>
                                                            Chưa có mô tả nào! <br>
                                                        <?php }else{ ?>
                                                            <?php echo $product->description; } ?>
                                                        
                                                        <a href="">Mạnh Viết - CIT</a>
                                                        </p>
                                                    </li>
                                                </ul>
                                              </li>
                                         </ul>
                                        <?php } ?>
                                       </li>
                                     </ul>
                                     </form>
                                    <div class="clear"></div>
                                </a>
                        </div>
                     </div>
                     <?php } 
                   } ?>
                   </div>
            <div style="margin-left: 45%;">
                <?php echo $products->links(); ?>
            </div>
    <?php
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
