<?php

namespace App\Http\Middleware;

use Closure;

class SetJsonHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $request->headers->set('Accept', 'application/json');
        $response = $next($request);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}
