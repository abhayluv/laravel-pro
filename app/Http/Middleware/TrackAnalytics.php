<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Analytics;
use Symfony\Component\HttpFoundation\Response;

class TrackAnalytics
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Only track GET requests and exclude certain paths
        if ($request->isMethod('GET') && 
            !$request->is('analytics/*') && 
            !$request->is('_debugbar/*') &&
            !$request->is('api/*')) {
            
            try {
                // Get page title from the response if possible
                $pageTitle = null;
                if ($response->headers->get('content-type') && 
                    str_contains($response->headers->get('content-type'), 'text/html')) {
                    // Try to extract title from HTML content
                    $content = $response->getContent();
                    if (preg_match('/<title>(.*?)<\/title>/i', $content, $matches)) {
                        $pageTitle = $matches[1];
                    }
                }

                // Track the pageview
                Analytics::trackPageview($request, $pageTitle);
            } catch (\Exception $e) {
                // Log error but don't break the application
                \Log::error('Analytics tracking failed: ' . $e->getMessage());
            }
        }

        return $response;
    }
}
