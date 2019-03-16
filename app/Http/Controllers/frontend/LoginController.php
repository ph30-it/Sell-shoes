<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Validator;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.login');
    }

    public function postLogin(Request $request)
    {
        //return dd($request);
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6|max:16'
        ],[
            'email.required'=>'Bạn chưa nhập Email',
            'email.email'=>'Email chưa đúng định dạng',
            'password.required'=>'Bạn chưa nhập Password',
            'password.min'=>'Password phải ít nhất 6 ký tự',
            'password.max'=> 'Password không quá 16 ký tự'
        ]);
        $remember = $request->has('remember') ? true : false;

        $user_data = array(
      'email'  => $request->email,
      'password' => $request->password,
     );

        if(Auth::attempt($user_data,$remember)){
            return redirect()->route('home-user');
        }else{
            return redirect()->back()->with('status', 'Sai tài khoản hoặc mật khẩu');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('login')->with('status', 'Bạn đã đăng xuất. Hãy đăng nhập lại để tiếp tục');
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
