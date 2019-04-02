<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;
use App\Product;
use App\Image;
use App\Http\Requests\EditCommentRequest;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::with('product')->orderBy('id','desc')->paginate(10);
        //dd($comments);
        return view('admin.comment.comment',compact('comments'));
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
        $comment = Comment::with('product')->where('id',$id)->first();
        return view('admin.comment.editcomment',compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditCommentRequest $request, $id)
    {
        $data = $request->only('name','email','content');
        $comment = Comment::where('id',$id)->update($data);
        if ($comment) {
            return redirect()->route('comment-admin')->with('status','Sửa bình luận thành công!');
        }else{
            return back()->with('status','Sửa bình luận thất bại!');
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
        $comment = Comment::destroy('id',$id);
        if ($comment) {
            return back()->with('status','Xóa bình luận thành công!');
        }else{
            return back()->with('status','Xóa bình luận thất bại!');
        }
    }
}
