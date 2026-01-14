<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
   public function handle(Request $request, Closure $next, ...$roles): Response
{
    // تحقق من تسجيل الدخول
    if (!$request->user()) {
        return redirect('/login');
    }

    // تحقق من الدور
    if (in_array($request->user()->role, $roles)) {
        return $next($request);
    }

    // في حال غير مصرح
    abort(403, 'غير مصرح لك بالدخول');
}
}
