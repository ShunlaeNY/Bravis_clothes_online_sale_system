<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth('admin')->user()){
            if(auth('admin')->user()->role_id === 1 || auth('admin')->user()->role_id === 2 )
            {

                    return $next($request);

            }
            else
            {
                return redirect('/admin')->with('error','You don\'t have Admin Access!');
            }
        }
        else
        {
            return redirect('/admin')->with('error','You don\'t have Admin Access!');

        }
        // return $next($request);
        // dd(auth('admin')->user());
    }
}
