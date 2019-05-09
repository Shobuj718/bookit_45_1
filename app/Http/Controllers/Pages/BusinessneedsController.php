<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BusinessneedsController extends Controller
{
     public function services(Request $request)
    {
    	$response = [
    		'msg2' => 'ok2',
    		'business3' => $request->business3
    	];
    	return response()->json($response);
    }
}
