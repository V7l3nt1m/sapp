<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminDenied
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
        if(auth()->user() && auth()->user()->permissao != "admin"){
            return redirect('/acessdenied');
        }else{
            return $next($request);
        }
    }
}
