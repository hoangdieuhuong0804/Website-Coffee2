<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Utilities\Constant;

class CheckAdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
// Nếu ta sử dụng Authentication của Laravel, ta sẽ có sẵn 2 middleware là guest và auth.
        //Guest chua dang nhap
        if (Auth::guest()) {
            return redirect()->guest('admin/login');
        }
            //neu da dn nhung sai level : dang xuat va dn lai (auth: da dang nhap)
        if(Auth::user()->level != Constant::user_level_host && Auth::user()->level != Constant::user_level_admin ){
            Auth::logout();

            return redirect()->guest('admin/login');
        }

        return $next($request);
    }
}
