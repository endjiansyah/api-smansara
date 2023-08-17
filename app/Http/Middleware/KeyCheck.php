<?php

namespace App\Http\Middleware;

use Closure;

class KeyCheck
{
    public function handle($request, Closure $next)
    {
        $apiKey = $request->header('apikey');

        // Ganti 'YOUR_API_KEY' dengan nilai api key yang diharapkan
        if ($apiKey !== env('API_KEY')) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}