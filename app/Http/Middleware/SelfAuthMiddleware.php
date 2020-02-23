<?php

namespace App\Http\Middleware;

use Closure;

class SelfAuthMiddleware
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
        $auth = auth()->id();
        if($request->route()->user->id != $auth){
            return redirect()->route('users.edit', ['user' => $auth]);
        }
        return $next($request);
    }
}
