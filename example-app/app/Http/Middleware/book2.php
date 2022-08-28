<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class book2
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
        $a=Session()->get('clinic');
        $b=Session()->get('date');
        if(!Session()->has('time') ){
            return redirect('/book2'.$a.'/date'.$b)->with('fail2','Choose time');
        }
        return $next($request);
    }
}
