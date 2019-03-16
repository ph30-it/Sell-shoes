<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guest()) {
            return redirect()->intended('login')->with('status','Bạn phải đăng nhập tài khoản admin mới được quyền vào chức năng này!');
        }
        
        if (Auth::check()) {
        
          /* dd(User::find((Auth::user()->id))->role->name);*/
            if ((User::find((Auth::user()->id))->role->name) == 'user') {
               return redirect()->route('alert-form');
            }
            
        }
        return $next($request);
    }
}
