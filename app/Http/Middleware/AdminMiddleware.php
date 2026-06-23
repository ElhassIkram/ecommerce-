<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
   public function handle(Request $request, Closure $next)
    {
        // التحقق: هل المستخدم مسجل (auth)؟ وهل هو مدير (isAdmin == 1)؟
        if (auth()->check() && auth()->user()->isAdmin == 1) {
            return $next($request);
        }

        // إذا لم يكن كذلك، نمنعه ونوجهه للصفحة الرئيسية
        return redirect('/')->with('error', 'Vous n\'avez pas l\'autorisation d\'accéder à cette page.');
    }
}
