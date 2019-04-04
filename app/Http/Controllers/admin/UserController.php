<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\NewPasswordRequest;
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
        $data['users'] = User::orderBy('id','desc')->paginate(10);
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
        $user = User::create($data);
        if ($user) {
            return redirect()->route('user-admin')->with('status', trans('message.user_create_susscess'));
        }else{
            return redirect()->route('user-admin')->with('status',trans('message.user_create_fail'));
        }
    }

    public function newPassword(NewPasswordRequest $request, $id)
    {
        $data = $request->only('password');
        $data['password'] = Hash::make($request->password);
        $user = User::where('id',$id)->update($data);
        if ($user) {
            return redirect()->route('user-admin')->with('status', trans('message.user_password_susscess'));
        }else{
            return redirect()->route('user-admin')->with('status', trans('message.user_password_fail'));
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showNewPassword($id)
    {
        return view('admin.user.newpass',compact('id'));
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

    public function searchUser(Request $request)
    {
        if($request->ajax())
        {
            $result = $request->search;
            $result = str_replace(' ', '%', $result);
            $users = User::where('name','like','%'.$result.'%')
                        ->orWhere('email','like','%'.$result.'%')
                        ->orderBy('id','desc')->get();
            if (empty($users->toArray())) {
                ?>
                    <tr>
                        <td colspan="4">Không tìm thấy tài khoản nào!</td>
                    </tr>
                <?php
            }else{ 
                foreach($users as $user){
                    ?>
                    <tr>
                        <td><?php echo $user->id; ?></td>
                        <td>
                            <ul class="user-menu" style="margin-top: 0px;margin-right: 40%">
                                <li class="dropdown pull-right">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: #000"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg><?php echo $user->name; ?><span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?php echo route('show-new-password',$user->id); ?>"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Đổi mật khẩu</a></li>
                                        <li><a href="<?php echo route('show-edit-user',$user->id); ?>"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Sửa thông tin</a></li>
                                        <li>
                                            <form action="<?php echo route('delete-user',$user->id); ?>" method="POST">
                                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                                <input type="hidden" name="_method" value="delete">
                                                <button onclick="return confirm('Bạn có chắc chắn muốn xóa?')" style="background: #fff;border: none;"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Xóa tài khoản</button>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </td>
                        <td><?php echo $user->email; ?></td>
                        <td><?php if($user->role_id == 2){ ?>
                                <span class="btn-danger">SuperAdmin</span>
                            <?php }else{ ?>
                                <span class="btn-info">User</span>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php
                }
                
            }

        }
    }
}
