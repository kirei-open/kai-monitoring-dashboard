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
    
        // Retrieve the device based on the provided API key
        $device = Device::where('api_key', $apiKey)->first();
    
        if (!$device) {
            return response()->json(['error' => 'Invalid API key'], 401);
        }
    
        // if ($device->id !== expected_device_id) {
        //     return response()->json(['error' => 'Invalid device'], 401);
        // }
    
        $request->merge(['device' => $device]);
    
        return $next($request);
    }
}
