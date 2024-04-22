<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Device;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckApiKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $apiKey = $request->header('X-API-KEY');
    
        if (!$apiKey) {
            return response()->json(['error' => 'API key is missing'], 401);
        }
    
        $device = Device::where('api_key', $apiKey)->first();
    
        if (!$device) {
            return response()->json(['error' => 'Invalid API key'], 401);
        }
    
        $request->attributes->add(['serial_number' => $device->serial_number]);
    
        return $next($request);
    }
}
