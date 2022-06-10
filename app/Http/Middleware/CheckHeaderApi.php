<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;

use App\Models\Oauth_access_tokensModel;
use Carbon\Carbon;

use Closure;

class CheckHeaderApi
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
        if ($request->header('x-token')) {
            $token = $request->header('x-token');
            $expires_at = Oauth_access_tokensModel::where('id', $token)->pluck('expires_at')->first();
            $now = Carbon::now();
            if (!empty($expires_at)) {
                if (strtotime($now) < strtotime($expires_at)) {
                    return $next($request);
                }else {
                    $resp['metadata']['message'] = 'Token Expired';
                    $resp['metadata']['code'] = 201;
                    return response()->json($resp, 201);
                }
            } else {
                $resp['metadata']['message'] = 'Token Not Found';
                $resp['metadata']['code'] = 201;
                return response()->json($resp, 201);
            }
        }else {
            $resp['metadata']['message'] = 'Header Not Found';
            $resp['metadata']['code'] = 201;
            return response()->json($resp, 201);    
        }
        
    }
}
