<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Http\Requests\AddCategoryRequest;
use App\Http\Requests\EditCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['category_list'] = Category::all();
        return view('admin.category.category',$data);
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
    public function store(AddCategoryRequest $request)
    {
        // $category = new Category;
        // $category->name = $request->name;
        // $category->slug = str_slug($request->name);
        // $category->description = $request->description;
        // $category->save();
        try {

            DB::beginTransaction();
            $data = $request->all();
            $data['slug'] = str_slug($data['slug']);
            $cate= Category::create($data);
            DB::commit();
            if ($cate) {
            // session()->flash('status', 'Thêm danh mục thành công!')
            return redirect()->route('category-admin')->with('status','Thêm danh mục thành công!');
                
            }
        } catch (\Exception $ex) {
            
            return redirect()->back()->with('status','Thêm danh mục fail!');
            
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
        $category = Category::find($id);
        return view('admin.category.editcategory',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditCategoryRequest $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = str_slug($request->name);
        $category->description = $request->description;
        $category->save();
        return redirect()->route('category-admin')->with('status','Sửa danh mục thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        // $category= Category:find(1);
        // $category->product()->delete();
        // $category->delete();
        return redirect()->back()->with('status','Xóa danh mục thành công!');
    }
}
