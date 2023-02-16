<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiAuthKey
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
        $token = $request->header('Api-Token');
        if($token != 'cf9905fe-b502-42c1-9845-ddkg85bv456wry3a2309f2'){
            return response()->json(['message' => 'App key not found'], 401);
        }
        return $next($request);
    }
}
