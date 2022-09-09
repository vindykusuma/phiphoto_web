<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
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
        // if(auth('roles')==="1"){
        //     return $next($request);
        // }else{
        //     auth()->check() {
        //             return redirect('/');


        if (!auth()->check()) {
            return redirect('/');
        }
        if (auth()->user()->roles()->where('title', 'user')->count() > 0) {
            return redirect('/');
        }

        // if(auth()->user()->roles == '1'){
        //     return $next($request);
        // }else{
        //     return redirect('/');
        // }



        return $next($request);
    }
}
