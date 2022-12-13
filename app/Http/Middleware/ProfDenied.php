<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ProfDenied
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
        if(auth()->user() && auth()->user()->permissao != "professor" || auth()->user() && auth()->user()->permissao == "professor" && auth()->user()->estado == 0){
            return redirect('/acessdenied');
        }else{
            return $next($request);
        }
    }
}
