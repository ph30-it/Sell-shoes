<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use App\User;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = User::paginate(10);
        return view('admin.user.admin',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddUserRequest $request)
    {
        $data = $request->except('_token','submit');
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        if ($user) {
            return redirect()->route('user-admin')->with('status', trans('message.user_create_susscess'));
        }else{
            return redirect()->route('user-admin')->with('status',trans('message.user_create_fail'));
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
        $data['users'] = User::find($id);
        return view('admin.user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, $id)
    {
        //dd($request);
        $data = $request->except('_token','submit','_method');
        $data['password'] = Hash::make($request->password);
        $user = User::where('id',$id)->update($data);
        if ($user) {
            return redirect()->route('user-admin')->with('status',trans('message.user_edit_susscess'));
        }else{
            return redirect()->route('user-admin')->with('status',trans('message.user_edit_fail'));
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
        $user = User::destroy($id);
        if ($user) {
            return redirect()->back()->with('status',trans('message.user_delete_susscess'));
        }else{
            return redirect()->back()->with('status',trans('message.user_delete_fail'));
        }
    }
}
