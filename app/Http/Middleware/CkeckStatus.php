<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CkeckStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (auth()->check() && ! auth()->user()->is_active){
             auth()->logout();
             
             return redirect('/login')
             ->withErrors( [
                'email' => 'Votre compte est désactivé. Veuillez contacter l\'administrateur',
             ]);
        }     
        return $next($request);
    }
}
