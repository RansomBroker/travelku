<?php
namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->to('login');
        }

        if(Auth::user()->role != 'users') {
            return redirect()->to('login');
        } else {
            return $next($request);
        }
    }
}