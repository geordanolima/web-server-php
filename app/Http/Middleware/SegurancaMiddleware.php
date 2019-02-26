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
        // TRETINHA_DOS_BIXO_DE_PHP_PRO_FABIUS em bycript: $2a$10$vVMu7pBlWKwmlgvroMJD4eCyQC8f9gop4hEDw4/gFW4.4JsG08rNe
        if ($request->headers->get('X-Authorization') === '$2a$10$vVMu7pBlWKwmlgvroMJD4eCyQC8f9gop4hEDw4/gFW4.4JsG08rNe'){
            $response = $next($request);
            return $response;
        }
        // Post-Middleware Action
        //dd($request->headers->has('user-agent'));
        //dd($request->headers->get('user-agent'));
        
        // dd($request->get('token'));
        // Post-Middleware Action
        return response('Sem autorização para esta requisição', 401)
                    ->header('Content-type', 'text/plain');
    }
}
