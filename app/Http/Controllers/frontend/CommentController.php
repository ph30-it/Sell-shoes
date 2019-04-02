<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;
use App\Product;
use App\User;
use Auth;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\UserCommentRequest;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(CommentRequest $request, $id)
    {
        //chưa đăng nhập
        $data = $request->except('_token');
        $data['product_id'] = $id;
        $comment = Comment::create($data);
        if ($comment) {
            return back();
        }else{
            return back()->with('status', 'Bình luận fail');
        }
    }

    public function storeUser(UserCommentRequest $request, $id)
    {
        //user
        $data = $request->only('content');
        $data['product_id'] = $id;
        $data['user_id'] = Auth::user()->id;
        $data['name']  = Auth::user()->name;
        $data['email']  = Auth::user()->email;
        $comment = Comment::create($data);
        if ($comment) {
            return back();
        }else{
            return back()->with('status', 'Bình luận fail');
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
        $comment = Comment::destroy('id',$id);
        if ($comment) {
            return back()->with('status','Xóa bình luận thành công!');
        }else{
            return back()->with('status','Xóa bình luận thất bại!');
        }
    }
}
