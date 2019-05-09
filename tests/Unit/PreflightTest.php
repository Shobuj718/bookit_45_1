<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Middleware\Preflight;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PreflightTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
     
    /** @test */
    public function cors_headers_are_set() {
        $response = \Mockery::Mock(Response::class)
            ->shouldReceive('header')->with('Access-Control-Allow-Origin', '*')
            ->shouldReceive('header')->with('Access-Control-Allow-Methods', 'HEAD, GET, PUT, PATCH, POST, OPTIONS')
            ->shouldReceive('header')->with('Access-Control-Allow-Credentials', 'true')
            ->shouldReceive('header')->with('Access-Control-Allow-Headers', 'Origin, Content-Type, Authorization, X-Auth-Token,x-xsrf-token')
            ->getMock();
        
        
        $request = Request::create('https://app.miyn.net/api/get-widget?key=123456', 'GET');
        
        $middleware = new Preflight;
        
        $middleware->handle($request, function () use ($response) { 
            return $response; 
        });
    }
}
