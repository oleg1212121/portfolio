<?php

namespace App\Http\Middleware;

use App\Models\Client;
use Closure;

class StatisticMiddleware
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
        $data = parse_user_agent();
        $data['ip'] = $request->ip() ?? null;
        $data['referer'] = $request->header('referer') ?? null;
        Client::create($data);

        return $next($request);
    }
}
