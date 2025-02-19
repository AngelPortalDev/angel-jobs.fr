<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SecurityHeadersMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request); 
        
        
        $response->headers->set('X-Frame-Options', 'DENY'); 
       $response->headers->set('X-XSS-Protection', '1; mode=block');
       $response->headers->set('X-Content-Type-Options', 'nosniff');
       $response->headers->set('X-Permitted-Cross-Domain-Policies', 'none');
       $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains; preload');
       // $response->headers->set('Content-Security-Policy', "default-src 'self'; script-src 'self' https://trusted-cdn.com; frame-ancestors 'none';");
       $response->headers->set('Content-Security-Policy', "default-src 'self'; script-src 'self' 'unsafe-inline' 'unsafe-eval' https://trusted-cdn.com https://cdnjs.cloudflare.com; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://cdnjs.cloudflare.com https://cdn.quilljs.com; font-src 'self' https://fonts.gstatic.com https://cdnjs.cloudflare.com; img-src 'self' data:; connect-src 'self'; frame-ancestors 'none';");
       $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
       $response->headers->set('Permissions-Policy', 'geolocation=(), microphone=()');
       $response->headers->set('Expect-CT', 'max-age=86400, enforce');
       
      // \Log::info('Response Headers:', $response->headers->all());

       return $response; 
    }
}
