<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use App\Http\Requests\ConfirmPasswordChangeEmailRequest;
use App\Http\Requests\UpdateEmailRequest;
use App\Http\Requests\UpdatePhoneRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdatePasswordRequest;
use Hash;

class ProfileUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.profile.profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //view confrim password
    public function emailConfirmPassword($id)
    {
       return view('frontend.profile.email-confirm-password'); 
    }
    //confirm password
    public function postEmailConfirmPassword(ConfirmPasswordChangeEmailRequest $request,$id)
    {

          $user_data = array(
          'email'  => Auth::user()->email,
          'password' => $request->password,
         );

          if(Auth::attempt($user_data)){
             return redirect()->route('view-update-email-user',$id);
        }else{
            return back()->with('fail', trans('message.confirm_password_fail'));
        }
    }
    //view update email user
    public function viewUpdateEmail()
    {
        return view('frontend.profile.update-email');
    }
    //update email user
    public function updateEmail(UpdateEmailRequest $request,$id)
    {
          $user_data = array(
          'email'  => $request->email,
         );
          $user = User::where('id',$id)->update($user_data);

          if($user){
             return redirect()->route('profile-user')->with('success', trans('message.update_email_success'));
        }else{
            return back()->with('fail', trans('message.update_email_fail'));
        }
    }

     public function phoneConfirmPassword($id)
    {
        return view('frontend.profile.phone-confirm-password');
    }

    public function postPhoneConfirmPassword(ConfirmPasswordChangeEmailRequest $request,$id)
    {

          $user_data = array(
          'email'  => Auth::user()->email,
          'password' => $request->password,
         );

          if(Auth::attempt($user_data)){
             return redirect()->route('view-update-phone-user',$id);
        }else{
            return back()->with('fail', trans('message.confirm_password_fail'));
        }
    }
     //view update phone user
    public function viewUpdatePhone()
    {
        return view('frontend.profile.update-phone');
    }

    //update phone user
    public function updatePhone(UpdatePhoneRequest $request,$id)
    {
          $user_data = array(
          'phone'  => $request->phone,
         );
          $user = User::where('id',$id)->update($user_data);

          if($user){
             return redirect()->route('profile-user')->with('success', trans('message.update_phone_success'));
        }else{
            return back()->with('fail', trans('message.update_phone_fail'));
        }
    }

    public function viewUpdatePassword()
    {
        return view('frontend.profile.update-password');
    }

    public function updatePassword(UpdatePasswordRequest $request,$id)
    {
       $user_data = array(
          'email'  => Auth::user()->email,
          'password' => $request->password,
         );
       
          if(Auth::attempt($user_data)){
             $data['password'] = Hash::make($request->password_new);
             $user = User::where('id',$id)->update($data);
             if ($user) {
                 return redirect()->route('profile-user')->with('success', trans('message.update_password_success'));
             }else{
                 return back()->with('fail', trans('message.update_password_fail'));
             }
        }else{
            return back()->with('error_pass', 'Mật khẩu cũ không chính xác.');
        }
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
    public function update(UpdateProfileRequest $request, $id)
    {
        //dd($request->all());
        $data = $request->only('name','sex','address');
        $data['birthday'] = $request->day.'/'.$request->month.'/'.$request->year;
        //dd($data['birthday']);
        $user = User::where('id',$id)->update($data);
         //update image user
            if ($request->hasFile('image')) {
                $filename = $request->image->getClientOriginalName();
                $newName = '/images/avatar/'.md5(microtime(true)).$filename;
                $request->image->move(public_path('/images/avatar'), $newName);
                $user = User::where('id',$id)->update([
                   'avatar' => $newName,
                ]);        
        }
        if ($user) {
            return back()->with('success','Cập nhật hồ sơ thành công');
        }else{
            return back()->with('fail','Cập nhật hồ sơ thất bại');
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
        //
    }
}
