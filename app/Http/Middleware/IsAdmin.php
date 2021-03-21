<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->user()->is_admin) {
            return redirect()->route('home')
                ->with('attention', 'Você não está autorizado para acessar! Verifique com o administrador');
        }

        return $next($request);
    }
}
