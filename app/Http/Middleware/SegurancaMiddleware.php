<?php

namespace App\Http\Middleware;

use Closure;

class SegurancaMiddleware
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
        // Pre-Middleware Action
        // dd($request->headers->get('X-Authorization')); //nos headers HTTP
        if ($request->headers->get('X-Authorization') === 'TRETINHA_DOS_BIXO_DE_PHP_PRO_FABIUS'){
            $response = $next($request);
            return $response;
        }
        // Post-Middleware Action
        //dd($request->headers->has('user-agent'));
        //dd($request->headers->get('user-agent'));
        
        // dd($request->get('token'));
        // Post-Middleware Action
    }
}
