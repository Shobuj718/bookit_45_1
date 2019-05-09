<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Preflight {
    
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     
    public function handle($request, Closure $next)
    {
        //apply cors only to api routes
 
 
        // header("Access-Control-Allow-Origin: *");
        // header("Access-Control-Allow-Origin: ".$request->server('HTTP_ORIGIN'));
        
        // header("Access-Control-Allow-Origin: " . env('APP_CORS_HOST', 'http://localhost:8000'));
 
        // ALLOW OPTIONS METHOD
        $headers = [
            'Access-Control-Allow-Methods'=> 'POST, GET, OPTIONS, PUT, DELETE',
            'Access-Control-Allow-Headers'=> 'Content-Type, X-Auth-Token, Origin, Authorization',
            'Access-Control-Allow-Credentials' => 'true',
            'Access-Control-Allow-Origin' => '*',
        ];
 
        // if($request->isMethod("OPTIONS")) {
        //     // The client-side application can set only headers allowed in Access-Control-Allow-Headers
        //     return Response::create('OK', 200, $headers);
        // }
 
        $response = $next($request);
        foreach($headers as $key => $value){
            $response->header($key, $value);
        }
 
        return $response;
    }
    
    // public function handle($request, Closure $next) {
        
    //     if(isset($request->server()['HTTP_ORIGIN'])) {
    //         return $next($request)
    //             ->header('Access-Control-Allow-Origin: ' . $request->server()['HTTP_ORIGIN'])
    //             ->header('Access-Control-Allow-Credentials: true')
    //             ->header('Access-Control-Max-Age: 86400');
    //     }
        
    //     if($request->isMethod('OPTIONS')) {
    //         return $next($request)
    //             ->header('Access-Control-Allow-Credentials: true')
    //             ->header('Access-Control-Allow-Origin: ' . $request->server()['HTTP_ORIGIN'])
    //             ->header('Access-Control-Allow-Headers: Origin, Content-Type, Authorization, X-Auth-Token,x-xsrf-token')
    //             ->header('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE')
    //             ->header('Access-Control-Max-Age: 86400');
    //     }
        
    //     return $next($request);
    // }
    
    // public function handle($request, Closure $next)
    // {

    //     header("Access-Control-Allow-Origin: *");

    //     // ALLOW OPTIONS METHOD
    //     $headers = [
    //         'Access-Control-Allow-Methods'=> 'POST, GET, OPTIONS, PUT, DELETE',
    //         'Access-Control-Allow-Headers'=> 'Content-Type, X-Auth-Token, Origin'
    //     ];
    //     if($request->getMethod() == "OPTIONS") {
    //         // The client-side application can set only headers allowed in Access-Control-Allow-Headers
    //         return Response::make('OK', 200, $headers);
    //     }

    //     $response = $next($request);
    //     foreach($headers as $key => $value)
    //         $response->header($key, $value);
    //     return $response;
    // }
    
    // public function handle($request, Closure $next)
    // {
    //     /* @var $response Response */
    //     $response = $next($request);
        
    //     if (!$request->isMethod('OPTIONS')) {
    //         return $response;
    //     }
        
    //     $allow = $response->headers->get('Allow'); // true list of allowed methods
        
    //     if (!$allow) {
    //         return $response;
    //     }
        
    //     if($request->isMethod('OPTIONS')){
    //       $headers = [
    //             'Access-Control-Allow-Origin' => '*',
    //             'Access-Control-Allow-Credentials' => true,
    //             'Access-Control-Allow-Methods' => $allow,
    //             'Access-Control-Max-Age' => 86400,
    //             'Access-Control-Allow-Headers' => 'X-Requested-With, Origin, X-Csrftoken, Content-Type, Accept',
                
    //         ];
        
    //         return $response->withHeaders($headers); 
    //     }
    //     $headers = [
    //         'Access-Control-Allow-Origin' => '*',
    //         'Access-Control-Allow-Methods' => $allow,
    //         'Access-Control-Max-Age' => 86400,
    //         'Access-Control-Allow-Headers' => 'X-Requested-With, Origin, X-Csrftoken, Content-Type, Accept',
    //         'Access-Control-Allow-Credentials' => true,
    //     ];
        
    //     return $response->withHeaders($headers);
    // }
    
    // public function handle($request, Closure $next)
    // {
    //     //apply cors only to api routes
 
 
    //     header("Access-Control-Allow-Origin: https://staging.thelawapp.com.au");
 
    //     // ALLOW OPTIONS METHOD
    //     $headers = [
    //         'Access-Control-Allow-Methods'=> 'POST, GET, OPTIONS, PUT, DELETE',
    //         'Access-Control-Allow-Headers'=> 'Content-Type, X-Auth-Token, Origin, Authorization',
    //         'Access-Control-Allow-Credentials' => 'true'
    //     ];
 
    //     if($request->isMethod("OPTIONS")) {
    //         // The client-side application can set only headers allowed in Access-Control-Allow-Headers
    //         return Response::create('OK', 200, $headers);
    //     }
 
    //     $response = $next($request);
    //     foreach($headers as $key => $value){
    //         $response->header($key, $value);
    //     }
 
    //     return $response;
    // }
    
    // public function handle($request, Closure $next) {
            //All the domains you want to whitelist
        // $trusted_domains = ["https://staging.thelawapp.com.au"];
        // if (isset($request->server()['HTTP_ORIGIN'])) {
        //     $origin = $request->server()['HTTP_ORIGIN'];

        //     if (in_array($origin, $trusted_domains)) {
        //         header('Access-Control-Allow-Origin: ' . $origin);
        //         header('Access-Control-Allow-Headers: Origin, Content-Type, Authorization, X-Auth-Token,x-xsrf-token');
        //         header('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE');
        //     }
        // }
        
        // return $next($request);
    // }
    
}
