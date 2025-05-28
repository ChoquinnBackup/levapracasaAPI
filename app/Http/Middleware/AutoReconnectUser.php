<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AutoReconnectUser
{
    public function handle($request, Closure $next)
    {
        // Se o usuário não está autenticado mas tem um cookie de "remember"
        if (!Auth::check() && Cookie::has('remember_web_' . sha1(static::class))) {
            // Tentar reconectar usando o cookie
            if (Auth::guard('web')->viaRemember()) {
                return $next($request);
            }
            
            // Alternativa: Se você armazena o ID do usuário em um cookie seguro
            if ($userId = $request->cookie('user_id')) {
                if ($user = \App\Models\User::find($userId)) {
                    if ($user instanceof \App\Models\User) {
                        Auth::login($user);
                        return $next($request);
                    }
                }
            }
        }

        return $next($request);
    }
}