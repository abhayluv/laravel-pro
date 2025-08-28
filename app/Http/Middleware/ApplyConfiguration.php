<?php

namespace App\Http\Middleware;

use App\Models\Configuration;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApplyConfiguration
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Only apply to HTML responses
        if ($response->headers->get('Content-Type') && str_contains($response->headers->get('Content-Type'), 'text/html')) {
            $configuration = Configuration::getCurrent();
            
            // Generate CSS from configuration
            $css = $configuration->generateCSS();
            
            // Inject CSS into the response
            $content = $response->getContent();
            
            // Add CSS to head section with higher specificity and after Vite
            $cssInjection = '<style id="dynamic-configuration-css" data-configuration="true">' . $css . '</style>';
            
            // Insert CSS after Vite scripts but before closing head tag
            if (strpos($content, '@vite') !== false) {
                // Insert after Vite
                $content = preg_replace(
                    '/(@vite\(\[.*?\]\))/',
                    '$1' . "\n        " . $cssInjection,
                    $content
                );
            } else {
                // Fallback: insert before closing head tag
                $content = str_replace('</head>', $cssInjection . '</head>', $content);
            }
            
            // Also add a comment for debugging
            $debugComment = '<!-- Dynamic Configuration CSS Applied -->';
            $content = str_replace('</head>', $debugComment . '</head>', $content);
            
            $response->setContent($content);
        }

        return $response;
    }
}
